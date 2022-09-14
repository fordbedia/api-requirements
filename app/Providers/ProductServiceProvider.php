<?php

namespace App\Providers;

use App\Models\Products\Product;
use App\Models\Products\Category;
use Illuminate\Support\ServiceProvider;
use App\Repository\Eloquent\PriceRepository;
use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Contract\ProductRepositoryInterface;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ProductRepositoryInterface::class, function ($app) {
            if (request()->has('category')) {
                return new CategoryRepository(new Product, request()->all());
            }
            return new PriceRepository(new Product, request()->all());
        });
    }
}
