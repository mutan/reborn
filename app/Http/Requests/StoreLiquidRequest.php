<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLiquidRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $liquid_id = $this->route('liquid') ? $this->route('liquid')->id : null;

        return [
            'name' => [
                'required', 'max:50', Rule::unique('liquids')->ignore($liquid_id)
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не может быть пустым',
            'name.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
            'name.max'  => 'Не может быть длиннее 50 символов',
        ];
    }
}
