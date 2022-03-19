<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditDisplayRequest extends FormRequest
{
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
            'name'       => 'required|string|min:3|unique:displays,name,' . $this->route('display')->id,
            'company_id' => 'required|exists:companies,id',
            'latitude'   => 'required|numeric',
            'longitude'  => 'required|numeric',
            'type'       => 'required|in:outdoor,indoor',
            'price'      => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->wantsJson() || $this->ajax()) {
            throw new HttpResponseException(response()->json([
                'errors' => $validator->errors(),
                'status' => false,
            ], 422));
        }

        parent::failedValidation($validator);
    }
}
