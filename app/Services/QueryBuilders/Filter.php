<?php

namespace App\Services\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    public function apply(Builder $builder, $value);
}
