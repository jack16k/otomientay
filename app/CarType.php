<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    protected $table = "loaixe";
    protected $primaryKey = 'lx_id';
    protected $fillable = [
        'hx_id','lx_name','lx_alias','lx_state'
    ];
    protected $dateFormat = 'U';
    public function scopeActive($query)
    {
        return $query->where('lx_state',1);
    }
}