<?php

namespace App\Models;

use App\Models\Size;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';

    protected $guarded = [];


    public function size()
    {
        return $this->belongsTo(Size::class , 'size_id','id');
    }
}