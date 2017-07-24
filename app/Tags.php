<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $primaryKey = 'tag_id';
    protected $fillable = [
        'tag_title',
    ];
}
