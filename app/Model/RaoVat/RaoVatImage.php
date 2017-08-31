<?php
namespace App\Model\RaoVat;

use Illuminate\Database\Eloquent\Model;

class RaoVatImage extends Model{
    protected $table = "Photo";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name','isValid',
    ];
    protected $dateFormat = 'U';
    public function scopeActive($query)
    {
        return $query->where('isValid',1);
    }
}