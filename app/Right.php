<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Right extends BaseModel
{
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }
}
