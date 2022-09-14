<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Repository\Eloquent\Traits\FilterPrice;
use App\Repository\Contract\ProductRepositoryInterface;

class PriceRepository extends BaseEloquent implements ProductRepositoryInterface {

    use FilterPrice;

    protected $model;

    protected $data;

    protected $obj;

    protected array $range = [];

    public function __construct(Model $model, $data = null)
    {
        $this->model = $model;
        $this->data = $data;

        $this->parseRange($data['price']);

        parent::__construct($model);
    }

    public function initializeQuery(): Collection
    {
        return $this->model
            ->whereHas('price', fn ($q) => $q->whereBetween('final', $this->range))
            ->with(['category', 'price'])
                ->get();
    }

    public function show(): Collection
    {
        return $this->obj;
    }

    protected function parseRange(string $range)
    {
        $this->range = explode(',', $range);
    }
}
