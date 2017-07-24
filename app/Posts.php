<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
     protected $primaryKey = 'p_id';
    protected $fillable = [
        'p_title','p_alias', 'p_description', 'p_content','p_image','p_link_video','p_link_youtube','p_createuser','p_modifyuser','p_order','p_state',
    ];

}
