<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'cid';

    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * @var product
     *
     * @return void
     */
    public function product()
    {
        return $this->hasMany(Product::class, 'cid', 'cid');
    }
}
