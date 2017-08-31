<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdsCategory extends Model
{
    protected $table = "selling_ads_category";
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'c_name','c_parent','c_state'
    ];
    protected $dateFormat = 'U';
    public function scopeActive($query)
    {
        return $query->where('c_state',1);
    }
}