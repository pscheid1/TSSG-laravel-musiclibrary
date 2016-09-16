<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{

    protected $fillable = [ 'updateuserid'];
    
    protected static $rules = [
       // 'name' => 'required|unique:roles|min:1|max:64'
   ];

    public function users()
    {
        return $this->belongsToMany('User::class')->withPivot('contact_id');;
    }
}
