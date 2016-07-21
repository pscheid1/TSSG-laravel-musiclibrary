<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends BaseModel
{

    protected $fillable = ['DESCRIPTION', 'UPDATEUSERID'];
    
    protected static $rules = [
        'DESCRIPTION' => 'required|unique:Styles|min:1|max:120'
    ];

    public function musiclibrary()
    {
        $this->hasMany(Musiclibrary::class, 'STYLEID');
    }
    
}
