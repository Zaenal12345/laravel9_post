<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $fillable = ['stock', 'goods_id'];

    public function goods(){
        return $this->belongsTo(Good::class, 'goods_id');
    }
}
