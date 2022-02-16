<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $table = 'goods';
    protected $fillable = [
        'goods_name',
        'price',
        'mininum_stock',
        'expired_date',
        'category_id',
        'unit',
    ];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
