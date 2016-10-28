<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends BaseModel
{
    protected $fillable = ['instrument', 'mgrskill', 'skill',  'updateuserid'];
    protected static $rules = [
        'user_id' => 'required',
        'instrument' => 'required'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    // specific instrument assigned to user
    public function instrument()
    {
        return $this->belongsTo(Instrument::class, 'name');
    }
    
    // skill level for a specific instrument assigned by band leader or admin
    public function mgrskill()
    {
        return $this->belongsTo(Skill::class, 'mgrskill');
    }

    // self assigned skill level for a specific instrument
    public function skill()
    {
        return $this->belongsTo(skills::class, 'skill');
    }

    

}
