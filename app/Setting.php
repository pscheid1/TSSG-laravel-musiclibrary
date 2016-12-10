<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Setting extends BaseModel
{
    protected $fillable = ['bannerPics'];
    
    protected static $rules = [
        'bannerPics' => 'required||min:0|max:2'
    ];
    
   protected static $bannerpics = null;

   public static  function getBannerPics()
    {
       
       if (static::$bannerpics === null)
       {
            static::$bannerpics = Setting::find(1)->bannerPics;
       }
       
       return static::$bannerpics;
    }
    
}
