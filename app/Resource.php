<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Resource extends BaseModel
{
    protected $fillable = ['user_id', 'instrument_id', 'mgrskill', 'skill', 'solo', 'updateuserid'];
    public static $rules = [
        'user_id' => 'required',
        'instrument_id' => 'required',
        'mgrskill' => 'required',
        'skill' => 'required',
        'solo' => 'required'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    // specific instrument assigned to user
    public function instrument()
    {
        return $this->belongsTo(Instrument::class, 'id');
    }
    
    // skill level for a specific instrument assigned by band leader or admin
    public function mgrskill()
    {
        return $this->belongsTo(Skill::class, 'resmgrskill');
    }

    // self assigned skill level for a specific instrument
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'resusrskill');
    }

    

}
