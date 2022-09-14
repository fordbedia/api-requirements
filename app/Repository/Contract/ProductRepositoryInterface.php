<?php

namespace App\Repository\Contract;

use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function initializeQuery(): Collection;

    public function filter(): self;

    public function show(): Collection;
}
