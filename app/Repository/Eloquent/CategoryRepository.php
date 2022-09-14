<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\Eloquent\Traits\FilterPrice;
use App\Repository\Contract\ProductRepositoryInterface;

class CategoryRepository extends BaseEloquent implements ProductRepositoryInterface
{
    use FilterPrice;

    /**
     * @var int
     */
    const INSURANCE_DISCOUNT = 30;

    /**
     * @var string
     */
    const SKU_DISCOUNT_VALUE = '000003';

    /**
     * @var int
     */
    const SKU_DISCOUNT = 15;

    protected $model;

    protected $data;

    protected $obj;

    /**
     * @param Model $model
     * @param array $data
     */
    public function __construct(Model $model, $data = null)
    {
        $this->model = $model;
        $this->data = $data;

        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function initializeQuery(): Collection
    {
        return $this->model
            ->whereHas('category', fn ($q) => $q->where('name', $this->data['category']))
            ->with(['category', 'price'])
                ->get();
    }

    /**
     * var getData
     *
     * @return void
     */
    public function show(): Collection
    {
        return $this->obj;
    }
}
