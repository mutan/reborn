<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEditionRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$edition_id = $this->route('edition') ? $this->route('edition')->id : null;

		return [
			'name' => [
				'required', 'max:50', Rule::unique('editions')->ignore($edition_id)
			],
			'code' => [
				'required', 'max:5', Rule::unique('editions')->ignore($edition_id)
			],
			'quantity' => ['required', 'numeric'],
			'number' => ['required', 'numeric']
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Не может быть пустым',
			'name.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
			'name.max'  => 'Не может быть длиннее 50 символов',
			'code.required' => 'Не может быть пустым',
			'code.unique' => 'Такое название уже есть в базе данных. Название должно быть уникальным.',
			'code.max'  => 'Не может быть длиннее 5 символов',
			'quantity.required' => 'Не может быть пустым',
			'quantity.numeric' => 'Может содержать только цифры',
      'number.required' => 'Не может быть пустым',
      'number.numeric' => 'Может содержать только цифры'
		];
	}
}
