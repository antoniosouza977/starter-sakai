<?php

namespace App\Services\QueryBuilders;

interface Builder
{
    public function doQuery(array $filters, bool $paginate = true);
}
