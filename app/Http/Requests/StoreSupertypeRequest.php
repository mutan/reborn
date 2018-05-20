<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSupertypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $supertype_id = $this->route('supertype') ? $this->route('supertype')->id : null;

        return [
            'name' => [
                'required', 'max:50', Rule::unique('supertypes')->ignore($supertype_id)
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
