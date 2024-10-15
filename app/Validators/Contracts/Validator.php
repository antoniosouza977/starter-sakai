<?php

namespace App\Validators\Contracts;

use App\Enums\ValidationType;

interface Validator
{
    public function validate(array $data, ValidationType $type): array;

    public function createRules(): array;

    public function updateRules(): array;

}
