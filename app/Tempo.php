<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tempo extends BaseModel
{
    protected $fillable = ['DESCRIPTION', 'UPDATEUSERID'];
    
        protected static $rules = [
        'DESCRIPTION' => 'required|unique:Tempos|min:1|max:120'
    ];
    
    public function musiclibrary()
    {
        return $this->hasMany(Musiclibrary::class, 'TEMPOID');
    }
}
