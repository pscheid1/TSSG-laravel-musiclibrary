<?php

namespace App;

use App\Role;
use App\Right;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'prefix', 'firstname', 'middlename', 'lastname', 'sufix', 'currentRole',
        'email', 'url', 'address1', 'address2', 'city', 'state', 'zipcode', 'phone1', 'phone2',
        'companyname', 'title', 'note', 'location', 'activated', 'terminated', 'usercanlogin',
        'forcepwchange', 'password',
    ];
    public static $rules = [
        'username' => 'required|unique:users|min:6|max:45',
        'email' => 'required|email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($roleName)
    {
        return $this->roles()->pluck('name')->contains($roleName);
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
            case 'manager':
                $assigned_rights[] = $this->getIdInArray($rights, 'create-user');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-user');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-role');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'create-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'delete-song');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-role');
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
                $assigned_rights[] = $this->getIdInArray($rights, 'read-style');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-tempo');
                $assigned_rights[] = $this->getIdInArray($rights, 'read-user');
                $assigned_rights[] = $this->getIdInArray($rights, 'update-user');
            // fall through                   
            case 'guest':
                $assigned_rights[] = $this->getIdInArray($rights, 'read-song');
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
