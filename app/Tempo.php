<?php

namespace App;

use App\Traits\SortableTrait;

class Tempo extends BaseModel
{

    use SortableTrait;

    protected $fillable = ['DESCRIPTION', 'UPDATEUSERID'];
    protected static $rules = [
        'DESCRIPTION' => 'required|unique:Tempos|min:1|max:120'
    ];

    public function musiclibrary()
    {
        return $this->hasMany(Musiclibrary::class, 'TEMPOID');
    }

}
