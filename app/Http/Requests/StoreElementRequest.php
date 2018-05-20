<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreElementRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $element_id = $this->route('element') ? $this->route('element')->id : null;

        return [
            'name' => ['required', 'max:50', Rule::unique('elements')->ignore($element_id)],
            'image' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не может быть пустым',
            'name.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
            'name.max'  => 'Не может быть длиннее 50 символов',
            'image.required'  => 'Не может быть пустым',
        ];
    }
}
