<?php

namespace App\Actions\Database;

use App\Actions\Action;
use App\Enums\ValidationType;
use App\Validators\BaseValidator;
use App\Validators\Contracts\Validator;
use BadMethodCallException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SaveModelAction implements Action
{

    private ?Model $model;
    private ?BaseValidator $validator;
    private array $data = [];
    private array $validatedData = [];
    private bool $hasValidated = false;

    public function setModel(Model $model): SaveModelAction
    {
        $this->model = $model;

        return $this;
    }

    public function setData(array $data, bool $userRelated = true): SaveModelAction
    {
        if ($userRelated) {
            $data['user_id'] = Auth::id();
        }

        $this->data = $data;
        return $this;
    }

    public function setValidator(BaseValidator $validator): SaveModelAction
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * @throws ValidationException
     */
    public function validateData(ValidationType $type): SaveModelAction
    {
        if (!$this->validator instanceof Validator) {
            throw new BadMethodCallException("Validator não definido");
        }

        $this->validatedData = $this->validator->validate($this->data, $type);
        $this->hasValidated = true;

        return $this;
    }

    public function execute(): void
    {
        if (!$this->hasValidated) {
            throw new BadMethodCallException('Dados válidos estão vazios');
        }

        $this->model->fill($this->validatedData);
        $this->model->save();
    }

}
