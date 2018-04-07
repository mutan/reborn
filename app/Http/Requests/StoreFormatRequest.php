<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFormatRequest extends FormRequest
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
        $format_id = $this->route('format') ? $this->route('format')->id : null;

        return [
            'name' => [
                'required', 'max:100', Rule::unique('formats')->ignore($format_id)
            ],
            'banned' => [
                /*'regex:/,\S/',*/
/*                Rule::exists('cards')->where(function ($query) {
                    $query->where('account_id', 1);
                }),*/
            ],
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
            'name.max' => 'Не может быть длиннее 100 символов',
            'name.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
            'banned.regex' => 'Не должно быть пробелов после запятой',
            'banned.exists' => 'В базе карт нет карт с названием «:input»',
        ];
    }
}
