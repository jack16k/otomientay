<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaoVatPost extends Model
{
    protected $table = "items";
    protected $primaryKey = 'items_id';
    protected $fillable = [
        'hx_id','lx_id','tp_id','items_title','items_alias','items_image','items_description','items_price','items_createuser','items_modifyuser','p_state'
    ];
    protected $dateFormat = 'U';
    public function scopeActive($query)
    {
        return $query->where('p_state',1);
    }
}