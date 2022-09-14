<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';

    use HasFactory;

    protected $fillable = ['original', 'final', 'discount_percentage', 'currency'];
}
