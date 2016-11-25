<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends BaseModel
{
    protected $fillable = ['name', 'updateuserid'];
    protected static $rules = [
        'name' => 'required|unique:skills'
    ];

    public function resmgrskill()
    {
        return $this->hasMany(Resource::class, 'mgrskill');
    }

    public function resusrskill()
    {
        return $this->hasMany(Resource::class, 'skill');
    }

}
