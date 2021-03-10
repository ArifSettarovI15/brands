<?php

namespace App\Modules\Brands\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * @response($formatErrors)
 */
class StorePostRequest extends FormRequest
{
    protected $currentValidator;

    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vendor_name' => 'required|string|max:150',
            'vendor_url' => 'required|unique:shop_vendors,vendor_url,'.$this->id.',vendor_id|max:150',
            'vendor_letter' => 'required|string|max:1',
        ];
    }
    public function messages()
    {
        return [
            'vendor_name.required' =>'Название бренда обязательно для заполнения',
            'vendor_url.required' =>'Ссылка бренда обязательна для заполнения',
            'vendor_url.unique' =>'Такая ссылка уже используется',
            'vendor_url.max' =>'Длина названия бренда до 150 символов',
            'vendor_name.max' =>'Длина ссылки бренда до 150 символов',
            'vendor_letter.required' =>'Символ бренда обязателен для заполнения',
            'vendor_letter.max' =>'Символ бренда должен состоять из одной буквы'
        ];
    }

    /***
     * @param Validator $validator
     * @throw \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $this->currentValidator = $validator;
        throw new ValidationException($validator, $this->response($validator));

    }

    public function response(Validator $validator){
        $errors =  $validator->getMessageBag()->toArray();

        if ($this->expectsJson()) {
            $errors = array_values($errors);
            return response()->json($errors);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
