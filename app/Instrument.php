<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Instrument extends BaseModel
{
    protected $fillable = ['name', 'updateuserid'];
    protected static $rules = [
        'name' => 'required|unique:instruments'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class, 'instrument_id');
    }

}
