<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Contact extends BaseModel
{

    protected $fillable = [
        'role_id', 'user_id', 'address1', 'address2', 'city', 'state', 'zipcode', 'phone1', 'phone2', 'email', 'weburl'
    ];
    
    protected static $rules = [
         'phone1' => 'required',
        'email' => 'required|email'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
