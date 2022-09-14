<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResources extends JsonResource
{
    public static $wrap = 'products';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = [];
        // return parent::toArray($request);
        foreach($this->resource as $product) {
            array_push($products, [
                'sku' => $product->sku,
                'name' => $product->name,
                'category' => $product->category->name,
                'price' => new PriceResources($product->price)
            ]);
        }

        return $products;

    }
}
