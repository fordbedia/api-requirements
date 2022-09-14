<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResources;
use App\Repository\Contract\ProductRepositoryInterface;

class ProductController extends Controller
{
    public function index(Request $request, ProductRepositoryInterface $product)
    {
        $init = $product->filter();

        return new ProductResources($init->show());
    }
}
