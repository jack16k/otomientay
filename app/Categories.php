<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'c_name','c_alias', 'c_avatar', 'c_description', 'c_parent_id','c_order','c_state',
    ];
}
