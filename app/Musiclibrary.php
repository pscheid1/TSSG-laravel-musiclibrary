<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musiclibrary extends BaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'CATALOGNUM', 'TITLE', 'DESCRIPTION', 'STYLEID', 'COPYRIGHT', 'COMPOSER', 'ARRANGER', 'LYRICIST',
        'PUBLISHER', 'PUBYEAR', 'PERFGRADE', 'TRANSCRIPTION', 'TEMPOID', 'STDPLAYTIME', 'EXTPLAYTIME',
        'VOCAL', 'VOCALISTS', 'VOICES', 'INSTRUMENTATION', 'VCFI', 'COMMARRANGEMENT', 'PERFCOMMENTS',
        'UPDATEUSERID',
    ];
    protected static $rules = [
        'CATALOGNUM' => 'required|unique:musiclibraries|min:1|max:5',
        'TITLE' => 'required|min:1|max:80',
        'DESCRIPTION' => 'required',
        'STYLEID' => 'required',
        'TEMPOID' => 'required'
    ];

    public function STYLEID()
    {
        return $this->belongsTo(Style::class);
    }

    public function TEMPOID()
    {
        return $this->belongsTo(Tempo::class);
    }

}
