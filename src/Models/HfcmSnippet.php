<?php

namespace Abhij89\Hfcm\Models;

use Illuminate\Database\Eloquent\Model;

class HfcmSnippet extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'header',
        'footer',
        'body'
    ];

    public function getTable()
    {
        return config('hfcm.table_name');
    }

    public static function getRandomRow()
    {
        return self::inRandomOrder()->first();
    }

    public static function getHeader()
    {
        return self::getRandomRow()->header;
    }

    public static function getFooter()
    {
        return self::getRandomRow()->footer;
    }

    public static function getBody()
    {
        return self::getRandomRow()->body;
    }

}
