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

}
