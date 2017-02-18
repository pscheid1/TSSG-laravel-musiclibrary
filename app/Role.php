<?php

namespace App;

use App\User;
use App\Traits\SortableTrait;

class Role extends BaseModel
{

    use SortableTrait;

    protected $fillable = [ 'name', 'displayname'];
    protected static $rules = [
        'name' => 'required|unique:roles|min:1|max:64',
        'displayname' => 'required|unique:roles|min:1|max:128'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('contact_id');
    }

}
