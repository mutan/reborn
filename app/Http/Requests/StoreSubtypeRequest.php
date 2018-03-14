<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubtypeRequest extends FormRequest
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
        $subtype_id = $this->route('subtype') ? $this->route('subtype')->id : null;

        return [
            'name' => [
                'required', 'max:50', Rule::unique('subtypes')->ignore($subtype_id)
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Не может быть пустым',
            'name.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
            'name.max'  => 'Не может быть длиннее 50 символов',
        ];
    }
}
