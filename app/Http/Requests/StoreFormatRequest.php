<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFormatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $format_id = $this->route('format') ? $this->route('format')->id : null;

        return [
            'name' => [
                'required', 'max:100', Rule::unique('formats')->ignore($format_id)
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Не может быть пустым',
            'name.max' => 'Не может быть длиннее 100 символов',
            'name.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
        ];
    }
}
