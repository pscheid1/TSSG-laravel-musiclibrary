<?php

namespace App;

use App\Role;
use App\userType;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'firstname', 'lastname', 'email', 'location', 'password', 'activated', 'terminated',
    ];
    protected static $rules = [
        'username' => 'required|unique:users|min:1|max:45',
        'email' => 'required|unique:users|email'
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

    public function userType()
    {
        return $this->hasOne(UserType::class);
    }
    
    public function isMember() // this was from a demo.  Need to change to for something useful
    {
        // if user is a member, s/he will have one or more roles assigned
        return ($this->roles()->count() > 0);
    }

    public function hasRole($role)
    {
        return $this->roles->pluck('name')->contains($role);
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

    public function makeMember($title)
    {
        $assigned_roles = array();

        $roles = Role::all()->pluck('name', 'id');   //Role::all() == 1 => admin, 2 => manager,  3 => member etc.. . . 

        switch ($title) {
            case 'super-admin':
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'create-user');
                $assigned_roles[] = $this->getIdInArray($roles, 'update-user');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete-user');
                $assigned_roles[] = $this->getIdInArray($roles, 'create-role');
                $assigned_roles[] = $this->getIdInArray($roles, 'read-role');
                $assigned_roles[] = $this->getIdInArray($roles, 'update-role');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete-role');
            // fall through
            case 'manager':
                //$assigned_roles[] = $this->getIdInArray($roles, 'create-style');
                $assigned_roles[] = $this->getIdInArray($roles, 'read-style');
                $assigned_roles[] = $this->getIdInArray($roles, 'update-style');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete-style');
                $assigned_roles[] = $this->getIdInArray($roles, 'create-tempo');
                $assigned_roles[] = $this->getIdInArray($roles, 'read-tempo');
                $assigned_roles[] = $this->getIdInArray($roles, 'update-tempo');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete-tempo');
                $assigned_roles[] = $this->getIdInArray($roles, 'read-user');
                $assigned_roles[] = $this->getIdInArray($roles, 'create-song');
                $assigned_roles[] = $this->getIdInArray($roles, 'update-song');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete-song');
            // fall through
            case 'member':
            case 'guest':
                $assigned_roles[] = $this->getIdInArray($roles, 'read-song');
                break;
            default:
                throw new \Exception('The member role does not exist');
        }

        $this->roles()->sync($assigned_roles);
    }

}
