<?php

namespace App\Http\Controllers;

use App\Actions\Database\SaveModelAction;
use App\Enums\ValidationType;
use App\Validators\BaseValidator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

abstract class Controller
{
    protected SaveModelAction $saveModelAction;
    protected BaseValidator $validator;
    protected string $indexRoute;

    public function baseStore(Model $model, array $data): RedirectResponse
    {
        try {
            $this->saveModelAction
                ->setModel($model)
                ->setData($data)
                ->setValidator($this->validator)
                ->validateData(ValidationType::CREATE)
                ->execute();

            if (!$this->indexRoute) {
                return redirect()->back();
            }

            return redirect()->route($this->indexRoute);
        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->errors())
                ->withInput();
        }
    }

    public function baseUpdate(Model $model, array $data): RedirectResponse
    {
        if ($model->user_id !== auth()->id()) {
            abort(403);
        }

        try {
            $this->saveModelAction
                ->setModel($model)
                ->setData($data)
                ->setValidator($this->validator)
                ->validateData(ValidationType::UPDATE)
                ->execute();

            if (!$this->indexRoute) {
                return redirect()->back();
            }

            return redirect()->route($this->indexRoute);
        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->errors())
                ->withInput();
        }
    }
}
