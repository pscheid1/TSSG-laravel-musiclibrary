<?php

namespace App;

use App\Traits\SortableTrait;

class Instrument extends BaseModel
{

    use SortableTrait;

    protected $fillable = ['name', 'updateuserid'];
    protected static $rules = [
        'name' => 'required|unique:instruments'
    ];

    public function resources()
    {
        return $this->hasMany(Resource::class, 'instrument_id');
    }

}
