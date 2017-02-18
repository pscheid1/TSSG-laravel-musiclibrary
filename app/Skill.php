<?php

namespace App;

use App\Traits\SortableTrait;

class Skill extends BaseModel
{

    use SortableTrait;

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
