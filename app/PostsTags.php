<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostsTags extends Model
{
    //
    protected $primaryKey = 'post_tag_id';
    protected $fillable = [
        'p_id','tag_id',
    ];
}
