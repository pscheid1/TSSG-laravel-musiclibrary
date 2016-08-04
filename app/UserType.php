<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usertype extends BaseModel
{

    protected $fillable = [ 'updateuserid'];
    
    protected static $rules = [
        'name' => 'required|unique:userTypes|min:1|max:48'
    ];

    public function user()
    {
        $this->belongsTo('User::class', 'userType');
    }
}
