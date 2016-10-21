<?php

namespace App;

use App\Role;
use App\Right;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Contact;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'prefix', 'firstname', 'middlename', 'lastname', 'suffix', 'currentRole',
        'company', 'title', 'note', 'location', 'activated', 'terminated', 'loginpermitted',
        'forcepwchange', 'password'
    ];
    public static $rules = [
        'username' => 'required|unique:users|min:6|max:45',
        'firstname' => 'required',
        'lastname' => 'required',
        'currentRole' => 'required'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    // a user can have multiple contacts, but
    // only one contact for a specific role.
    public function contactForRole($roleId)
    {
        // get the contacts for this user
        $c = $this->contacts;
        foreach ($c as $contact)
        {
            // look for a contact with a matching role_id
            // there should be only one or none.
            if ($contact->role_id == $roleId)
            {
                return $contact;
            }
        }

        return null;
    }

    // groupManagers will return all the groups
    // this user is a manager of.
    public function groupManagers()
    {
        return $this->belongsToMany(Group::class, 'group_manager');
    }

    // groupMemberShip will return a list of groups this
    // user is a member of.
    public function groupMemberShip()
    {
        return $this->belongsToMany(Group::class, 'group_user');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withPivot('contact_id');
    }

    public function hasRole($roleName)
    {
        return $this->roles()->pluck('name')->contains($roleName);
    }

    public function contactIdForRole($roleId)
    {
        $assignedRole = $this->roles()->where('id', '=', $roleId)->get();

        return $assignedRole[0]->pivot->contact_id;
    }

    public function rights()
    {
        return $this->belongsToMany(Right::class);
    }

    public function hasRight($right)
    {
        return $this->rights->pluck('name')->contains($right);
    }

    private function getIdInArray($array, $term) // $array == 1 => admin, 2 => manager,  3 => member etc.
    {
        foreach ($array as $key => $value)
        {
            if ($value == $term)  // index => 'name', index => 'name' . . . 
            {
                return $key;
            }
        }

        throw new UnexpectedValueException;
    }

    // called from AuthController/authenticated()
    public function makeMember($role)
    {
        $assigned_rights = array();
        $rights = Right::all()->pluck('name', 'id');

        switch ($role) {
            case 'super-admin':
            case 'admin':
                // any one can create a user account by self regisering as a guest
                $assigned_rights[] = $this->getIdInArray($rights, 'create-user');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-user');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-group');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-group');
            // fall through
            case 'manager':
                $assigned_rights[] = $this->getIdInArray($rights, 'update-group');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-contact');
                // contact info is deleted if a user role is deleted
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-contact');
            // fall through                
            case 'musician':
            case 'sub':
            case 'alumnus':
            case 'composer':
            case 'eventcontact':
            case 'groupie':
            case 'publisher':
            case 'supplier':
            case 'venuecontact':
                // everyone needs read-user/update-user rights in order to update their account and change their current role                
                $assigned_rights[] = $this->getIdInArray($rights, 'read-user');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-user');
                // everyone needs read-contact/update-contact rights in order to update their contact info                   
                $assigned_rights[] = $this->getIdInArray($rights, 'read-contact');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-contact');
            // fall through                   
            case 'guest':
                $assigned_rights[] = $this->getIdInArray($rights, 'read-group');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-tempo');
                break;
            default:
                throw new \Exception("The member role '" . $role . "' does not exist");
        }

        $this->rights()->sync($assigned_rights);
    }

    /**
     * Return model validation rules for an update
     * Add exception to :unique validations where necessary
     * That means: enforce unique if a unique field changed.
     * But relax unique if a unique field did not change
     *
     * @return array;
     */
    public function getUpdateRules($rules)
    {
        $updateRules = [];
        foreach ($rules as $field => $rule)
        {
            $newRule = [];
            // Split rule up into parts
            $ruleParts = explode('|', $rule);
            // Check each part for unique
            foreach ($ruleParts as $part)
            {
                if (strpos($part, 'unique:') === 0)
                {
                    // Check if field was unchanged
                    if (!$this->isDirty($field))
                    {
                        // Field did not change, make exception for this model
                        // Following line of code does not appear to work.
                        $part = $part . ',' . $field . ',' . $this->getAttribute($field) . ',' . $field;

                        // leave this segment out (replaces above line of code)
                        // continue;
                    }
                }
                // All other go directly back to the newRule Array
                $newRule[] = $part;
            }
            // Add newRule to updateRules
            $updateRules[$field] = join('|', $newRule);
        }
        return $updateRules;
    }

}