<?php

namespace App\Repository\Eloquent\Traits;

use Illuminate\Support\Facades\Request;

trait FilterPrice {
    /**
     * @var int
     */
    protected $insuranceDiscount = 30;

    /**
     * @var string
     */
    protected $skuDiscountValue = '000003';

    /**
     * @var int
     */
    protected $skuDiscount = 15;

    public function filter(): self
    {
        $this->obj = $this->initializeQuery()
            ->map(function ($p) {
                // For Insurance
                if ($p->category->slug === 'insurance') {
                    $p->price->final = $p->price->original - ($p->price->original * ($this->insuranceDiscount/100));
                    $p->price->discount_percentage = $this->insuranceDiscount . '%';
                }
                // For 000003 SKU
                if ($p->sku === $this->skuDiscountValue) {
                    $p->price->final = $p->price->original - ($p->price->original * ($this->skuDiscount/100));
                    $p->price->discount_percentage = $this->skuDiscount.'%';
                }

                return $p;
            });
        return $this;
    }
}
