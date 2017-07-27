<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table = "hangxe";
    protected $primaryKey = 'hx_id';
    protected $fillable = [
        'hx_name','hx_alias','hx_image','hx_state',
    ];
    protected $dateFormat = 'U';
    public function scopeActive($query)
    {
        return $query->where('hx_state',1);
    }
}