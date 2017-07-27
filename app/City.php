<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "thanhpho";
    protected $primaryKey = 'tp_id';
    protected $fillable = [
        'tp_name','tp_alias',
    ];
    protected $dateFormat = 'U';
}