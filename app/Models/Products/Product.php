<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = ['sku', 'name'];

    /**
     * Price
     *
     * @return Illuminate\Database\Eloquent\Concerns\HasRelationships::hasOne
     */
    public function price()
    {
        return $this->hasOne(Price::class, 'productid');
    }

    /**
     * @var category
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cid', 'cid');
    }
}
