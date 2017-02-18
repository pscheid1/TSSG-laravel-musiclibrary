<?php

namespace App;

use App\Traits\SortableTrait;

class Group extends BaseModel
{

    use SortableTrait;

    protected $fillable = ['name', 'type', 'status', 'groupleader', 'address1', 'address2', 'city', 'state', 'zipcode', 'phone1', 'phone2', 'email', 'weburl', 'updateuserid'];
    protected static $rules = [
        'name' => 'required|unique:groups',
        'type' => 'required',
        'status' => 'required',
        //'groupleader' => 'required',
        'phone1' => 'required',
        'email' => 'required|email'
    ];

    public function managers()
    {
        return $this->belongsToMany(User::class, 'group_manager');
    }

    // users belonging to this group
    public function members()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    public function type()
    {
        return $this->belongsTo(Style::class);
    }

}
