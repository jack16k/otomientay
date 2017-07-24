<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesPosts extends Model
{
    //
    protected $primaryKey = 'cp_id';
    protected $fillable = [
        'p_id','c_id',
    ];
}
