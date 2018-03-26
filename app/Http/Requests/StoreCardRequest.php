<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
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
			'name' => ['required', 'max:50'],
			'edition_id' => ['required'],
			'rarity_id' => ['required'],
			'cost' => ['required', 'integer'],
			'number' => ['required', 'integer'],
			'lives' => ['integer', 'nullable'],
			'movement' => ['integer', 'nullable'],
			'power_weak' => ['integer', 'nullable'],
			'power_medium' => ['integer', 'nullable'],
			'power_strong' => ['integer', 'nullable'],
			'liquid' => ['required'],
			'element' => ['required'],
			'supertype' => [],
			'type' => ['required'],
			'subtype' => ['required'],
			'artist' => ['required'],
		];
	}

	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		$required_ru = 'Это поле должно быть заполнено.';
		$integer_ru = 'В этом поле могут быть только цифры.';

		return [
			'name.required' => $required_ru,
			'name.max'  => 'Не может быть длиннее 50 символов',
			'edition_id.required'  => $required_ru,
			'rarity_id.required'  => $required_ru,
			'cost.required'  => $required_ru,
			'cost.integer'  => $integer_ru,
			'number.required'  => $required_ru,
			'number.integer'  => $integer_ru,
			'lives.integer'  => $integer_ru,
			'movement.integer'  => $integer_ru,
			'power_weak.integer'  => $integer_ru,
			'power_medium.integer'  => $integer_ru,
			'power_strong.integer'  => $integer_ru,
			'liquid.required'  => $required_ru,
			'element.required'  => $required_ru,
			'type.required'  => $required_ru,
			'subtype.required'  => $required_ru,
			'artist.required'  => $required_ru,
		];
	}
}
