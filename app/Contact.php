<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends BaseModel
{

    protected $fillable = [
        'address1', 'address2', 'city', 'state', 'zipcode', 'phone1', 'phone2', 'email', 'weburl'
    ];
    
    protected static $rules = [
        'phone1' => 'required',
        'email' => 'required|email'
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role_id');
    }

}
