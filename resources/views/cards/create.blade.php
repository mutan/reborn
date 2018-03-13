@extends('layouts.main')

@section('content')

<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 justify-content-center">

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('cards')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Назад к списку</a>

			<h3 class="text-center mt-3">Добавить карту</h3>

			<form action="{{ url('cards')}}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-row">

					<div class="form-group col-md-4">
						<label for="name">Название</label>
						<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}">
						@if ($errors->has('name'))
						<div class="invalid-feedback">{{ $errors->first('name') }}</div>
						@else
						<small id="nameHelpBlock" class="form-text text-muted">Максимум 50 символов.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="image">Изображение</label>
						<input type="text" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" value="{{ old('image') }}">
						@if ($errors->has('image'))
						<div class="invalid-feedback">{{ $errors->first('image') }}</div>
						@else
						<small id="imageHelpBlock" class="form-text text-muted">Название файла.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="edition_id">Выпуск</label>
						<select name="edition_id" class="form-control {{ $errors->has('edition_id') ? ' is-invalid' : '' }}" id="edition_id">
							<option selected></option>
							@foreach($editions as $edition)
							<option value="{{ $edition->id }}" @if( $edition->id == old('edition_id') ) selected="selected" @endif>{{ $edition->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('edition_id'))
						<div class="invalid-feedback">{{ $errors->first('edition_id') }}</div>
						@else
						<small id="edition_idHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="rarity_id">Редкость</label>
						<select name="rarity_id" class="form-control {{ $errors->has('rarity_id') ? ' is-invalid' : '' }}" id="rarity_id">
							<option selected></option>
							@foreach($rarities as $rarity)
							<option value="{{ $rarity->id }}" @if( $rarity->id == old('rarity_id') ) selected="selected" @endif>{{ $rarity->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('rarity_id'))
						<div class="invalid-feedback">{{ $errors->first('rarity_id') }}</div>
						@else
						<small id="rarity_idHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="artist">Художник</label>
						<select multiple name="artist[]" class="form-control {{ $errors->has('artist') ? ' is-invalid' : '' }}" id="artist">
							@foreach($artists as $artist)
							<option value="{{ $artist->id }}" @if( in_array($artist->id, (old('artist')) ? old('artist') : []) ) selected="selected" @endif>{{ $artist->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('artist'))
						<div class="invalid-feedback">{{ $errors->first('artist') }}</div>
						@else
						<small id="artistHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="liquid">Жидкости</label>
						<select multiple name="liquid[]" class="form-control {{ $errors->has('liquid') ? ' is-invalid' : '' }}" id="liquid">
							@foreach($liquids as $liquid)
							<option value="{{ $liquid->id }}" @if( in_array($liquid->id, (old('liquid')) ? old('liquid') : []) ) selected="selected" @endif>{{ $liquid->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('liquid'))
						<div class="invalid-feedback">{{ $errors->first('liquid') }}</div>
						@else
						<small id="liquidHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="element">Стихии</label>
						<select multiple name="element[]" class="form-control {{ $errors->has('element') ? ' is-invalid' : '' }}" id="element">
							@foreach($elements as $element)
							<option value="{{ $element->id }}" @if( in_array($element->id, (old('element')) ? old('element') : []) ) selected="selected" @endif>{{ $element->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('element'))
						<div class="invalid-feedback">{{ $errors->first('element') }}</div>
						@else
						<small id="elementHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="supertype">Супертипы</label>
						<select multiple name="supertype[]" class="form-control {{ $errors->has('supertype') ? ' is-invalid' : '' }}" id="supertype" size="2">
							@foreach($supertypes as $supertype)
							<option value="{{ $supertype->id }}" @if( in_array($supertype->id, (old('supertype')) ? old('supertype') : []) ) selected="selected" @endif>{{ $supertype->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('supertype'))
						<div class="invalid-feedback">{{ $errors->first('supertype') }}</div>
						@else
						<small id="supertypeHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="type">Типы</label>
						<select multiple name="type[]" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" id="type" size="2">
							@foreach($types as $type)
							<option value="{{ $type->id }}" @if( in_array($type->id, (old('type')) ? old('type') : []) ) selected="selected" @endif>{{ $type->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('type'))
						<div class="invalid-feedback">{{ $errors->first('type') }}</div>
						@else
						<small id="typeHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="subtype">Подтипы</label>
						<select multiple name="subtype[]" class="form-control {{ $errors->has('subtype') ? ' is-invalid' : '' }}" id="subtype">
							@foreach($subtypes as $subtype)
							<option value="{{ $subtype->id }}" @if( in_array($subtype->id, (old('subtype')) ? old('subtype') : []) ) selected="selected" @endif>{{ $subtype->name }}</option>
							@endforeach
						</select>
						@if ($errors->has('type'))
						<div class="invalid-feedback">{{ $errors->first('type') }}</div>
						@else
						<small id="subtypeHelpBlock" class="form-text text-muted">Выберите из списка.</small>
						@endif
					</div>

				</div>

				<div class="form-row">

					<div class="form-group col-md-2">
						<label for="cost">Стоимость</label>
						<input type="text" name="cost" class="form-control {{ $errors->has('cost') ? ' is-invalid' : '' }}" id="cost" value="{{ old('cost') }}">
						@if ($errors->has('cost'))
						<div class="invalid-feedback">{{ $errors->first('cost') }}</div>
						@else
						<small id="costHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

					<div class="form-group col-md-2">
						<label for="number">Номер</label>
						<input type="text" name="number" class="form-control {{ $errors->has('number') ? ' is-invalid' : '' }}" id="number" value="{{ old('number') }}">
						@if ($errors->has('number'))
						<div class="invalid-feedback">{{ $errors->first('number') }}</div>
						@else
						<small id="numberHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

					<div class="form-group col-md-2">
						<label for="lives">Жизни</label>
						<input type="text" name="lives" class="form-control {{ $errors->has('lives') ? ' is-invalid' : '' }}" id="lives" value="{{ old('lives') }}">
						@if ($errors->has('lives'))
						<div class="invalid-feedback">{{ $errors->first('lives') }}</div>
						@else
						<small id="livesHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

					<div class="form-group col-md-2">
						<label for="movement">Движение</label>
						<input type="text" name="movement" class="form-control {{ $errors->has('movement') ? ' is-invalid' : '' }}" id="movement" value="{{ old('movement') }}">
						@if ($errors->has('movement'))
						<div class="invalid-feedback">{{ $errors->first('movement') }}</div>
						@else
						<small id="movementHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

					<div class="form-group col-md-2">
						<label for="power_weak">Слабый ОУ</label>
						<input type="text" name="power_weak" class="form-control {{ $errors->has('power_weak') ? ' is-invalid' : '' }}" id="power_weak" value="{{ old('power_weak') }}">
						@if ($errors->has('power_weak'))
						<div class="invalid-feedback">{{ $errors->first('power_weak') }}</div>
						@else
						<small id="power_weakHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

					<div class="form-group col-md-2">
						<label for="power_medium">Средний ОУ</label>
						<input type="text" name="power_medium" class="form-control {{ $errors->has('power_medium') ? ' is-invalid' : '' }}" id="power_medium" value="{{ old('power_medium') }}">
						@if ($errors->has('power_medium'))
						<div class="invalid-feedback">{{ $errors->first('power_medium') }}</div>
						@else
						<small id="power_mediumHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

					<div class="form-group col-md-2">
						<label for="power_strong">Сильный ОУ</label>
						<input type="text" name="power_strong" class="form-control {{ $errors->has('power_strong') ? ' is-invalid' : '' }}" id="power_strong" value="{{ old('power_strong') }}">
						@if ($errors->has('power_strong'))
						<div class="invalid-feedback">{{ $errors->first('power_strong') }}</div>
						@else
						<small id="power_strongHelpBlock" class="form-text text-muted">Число.</small>
						@endif
					</div>

				</div>

				<div class="form-row">

					<div class="form-group col-md-4">
						<label for="text">Текст</label>
						<textarea type="text" name="text" class="form-control {{ $errors->has('text') ? ' is-invalid' : '' }}" id="text" rows="3">{{ old('text') }}</textarea>
						@if ($errors->has('text'))
						<div class="invalid-feedback">{{ $errors->first('text') }}</div>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="flavor">Художественный текст</label>
						<textarea type="text" name="flavor" class="form-control {{ $errors->has('flavor') ? ' is-invalid' : '' }}" id="flavor" rows="3">{{ old('flavor') }}</textarea>
						@if ($errors->has('flavor'))
						<div class="invalid-feedback">{{ $errors->first('flavor') }}</div>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="text">Эрраты</label>
						<textarea type="erratas" name="erratas" class="form-control {{ $errors->has('erratas') ? ' is-invalid' : '' }}" id="erratas" rows="3">{{ old('erratas') }}</textarea>
						@if ($errors->has('erratas'))
						<div class="invalid-feedback">{{ $errors->first('erratas') }}</div>
						@endif
					</div>

					<div class="form-group col-md-4">
						<label for="comments">Комментарии</label>
						<textarea type="comments" name="comments" class="form-control {{ $errors->has('comments') ? ' is-invalid' : '' }}" id="comments" rows="3">{{ old('comments') }}</textarea>
						@if ($errors->has('comments'))
						<div class="invalid-feedback">{{ $errors->first('comments') }}</div>
						@endif
					</div>
					
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-outline-secondary">
						<i class="fa fa-btn fa-plus"></i> Сохранить
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

@endsection
