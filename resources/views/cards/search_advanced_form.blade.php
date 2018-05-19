@extends('layouts.main')

@section('content')

<div class="container"><!-- container START -->

	<!-- Расширенный поиск НАЧАЛО -->
	<div class="row">
		<div class="col-md-12 ">

			<h3 class="text-center mt-2">Расширенный поиск</h3>

			<p class="">Выбираются карты, удовлетворяющие каждому выбранному условию. Например, если отметить супертип «Уникальный» и тип «Артефакт», будут найдены все карты, одновременно являющиеся уникальными и артефактами.</p>

			<hr>

			<form action="{{ url(route('search.show')) }}" method="GET">

				<div class="row" id="extended-search">

					<div class="col-md-4">

						<!-- name -->
						<div class="form-group">
							<label for="name">Название</label>
							<input type="text" name="name" class="form-control form-control-sm" id="name" value="{{ old('name') }}">
						</div>

						<div class="row">
							<div class="col-8">
								<!-- edition_id -->
								<div class="form-group">
									<label for="edition_id">Выпуск</label>
									<select name="edition_id" class="form-control form-control-sm" id="edition_id">
										<option selected></option>
										@foreach($editions as $edition)
										<option value="{{ $edition->id }}" @if( $edition->id == old('edition_id') ) selected="selected" @endif>{{ $edition->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-4">
								<!-- number -->
								<div class="form-group">
									<label for="number">Номер</label>
									<input type="text" name="number" class="form-control form-control-sm" id="number" value="{{ old('number') }}">
								</div>
							</div>
						</div>

						<!-- rarity_id -->
						<div class="form-group">
							<label for="rarity_id">Редкость</label>
							<select name="rarity_id" class="form-control form-control-sm" id="rarity_id">
								<option selected></option>
								@foreach($rarities as $rarity)
								<option value="{{ $rarity->id }}" @if( $rarity->id == old('rarity_id') ) selected="selected" @endif>{{ $rarity->name }}</option>
								@endforeach
							</select>
						</div>

						<!-- cost -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Стоимость</span>
							</div>
							<select name="cost-op" class="form-control" id="cost-op">
								<option> = </option>
								<option> > </option>
								<option> >= </option>
								<option> < </option>
								<option> <= </option>
							</select>
							<select name="cost" class="form-control form-control-sm" id="cost">
								<option></option>
								@foreach($cost as $item)
									<option value="{{ $item }}" @if( $item === old('cost') ) selected="selected" @endif>{{ $item }}</option>
								@endforeach
							</select>
						</div>

						<!-- lives -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Жизни</span>
							</div>
							<select name="lives-op" class="form-control" id="lives-op">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<select name="lives" class="form-control form-control-sm" id="lives">
								<option></option>
								@foreach($lives as $item)
									<option value="{{ $item }}" @if( $item === old('lives') ) selected="selected" @endif>{{ $item }}</option>
								@endforeach
							</select>
						</div>

						<!-- movement -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Движение</span>
							</div>
							<select name="movement-op" class="form-control" id="movement-op">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<select name="movement" class="form-control form-control-sm" id="movement">
								<option></option>
								@foreach($movement as $item)
									<option value="{{ $item }}" @if( $item === old('movement') ) selected="selected" @endif>
										@switch($item)
										@case('F')
											Полет
											@break
										@case('N')
											Нет
											@break
										@default
											{{ $item }}
										@endswitch
									</option>
								@endforeach
							</select>
						</div>

						<!-- power_weak -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Слабый ОУ</span>
							</div>
							<select name="power_weak-op" class="form-control" id="power_weak-op">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<select name="power_weak" class="form-control form-control-sm" id="power_weak">
								<option></option>
								@foreach($power_weak as $item)
									<option value="{{ $item }}" @if( $item === old('power_weak') ) selected="selected" @endif>{{ $item }}</option>
								@endforeach
							</select>
						</div>

						<!-- power_medium -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Средний ОУ</span>
							</div>
							<select name="power_medium-op" class="form-control" id="power_medium-op">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<select name="power_medium" class="form-control form-control-sm" id="power_medium">
								<option></option>
								@foreach($power_medium as $item)
									<option value="{{ $item }}" @if( $item === old('power_medium') ) selected="selected" @endif>{{ $item }}</option>
								@endforeach
							</select>
						</div>

						<!-- power_strong -->
						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Сильный ОУ</span>
							</div>
							<select name="power_strong-op" class="form-control" id="power_strong-op">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<select name="power_strong" class="form-control form-control-sm" id="power_strong">
								<option></option>
								@foreach($power_strong as $item)
									<option value="{{ $item }}" @if( $item === old('power_strong') ) selected="selected" @endif>{{ $item }}</option>
								@endforeach
							</select>
						</div>

					</div>

					<div class="col-md-4">

						<!-- text -->
						<div class="form-group">
							<label for="text">Текст карты</label>
							<input type="text" name="text" class="form-control form-control-sm" id="search" value="{{ old('text') }}">
						</div>

						<!-- supertypes -->
						<div class="form-group">
							<label for="supertypes">Супертипы</label>
							<select multiple name="supertypes[]" class="form-control form-control-sm" id="supertypes" size="3">
								<option value="0" @if( in_array("0", (old('supertypes')) ? old('supertypes') : []) ) selected="selected" @endif>Нет</option>
								@foreach($supertypes as $supertype)
								<option value="{{ $supertype->id }}" @if( in_array($supertype->id, (old('supertypes')) ? old('supertypes') : []) ) selected="selected" @endif>{{ $supertype->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<!-- types -->
						<div class="form-group">
							<label for="types">Типы</label>
							<select multiple name="types[]" class="form-control form-control-sm" id="types" size="2">
								@foreach($types as $type)
								<option value="{{ $type->id }}" @if( in_array($type->id, (old('types')) ? old('types') : []) ) selected="selected" @endif>{{ $type->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<!-- subtypes -->
						<div class="form-group">
							<label for="subtypes">Подтипы</label>
							<select multiple name="subtypes[]" class="form-control form-control-sm" id="subtypes" size="6">
								@foreach($subtypes as $subtype)
								<option value="{{ $subtype->id }}" @if( in_array($subtype->id, (old('subtypes')) ? old('subtypes') : []) ) selected="selected" @endif>{{ $subtype->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

					</div>

					<div class="col-md-4">

						<!-- flavor -->
						<div class="form-group">
							<label for="flavor">Художественный текст</label>
							<input type="text" name="flavor" class="form-control form-control-sm" id="search" value="{{ old('flavor') }}">
						</div>

						<!-- elements -->
						<div class="form-group">
							<label for="elements">Стихии</label>
							<select multiple name="elements[]" class="form-control form-control-sm" id="element" size="4">
								@foreach($elements as $element)
								<option value="{{ $element->id }}" @if( in_array($element->id, (old('elements')) ? old('elements') : []) ) selected="selected" @endif>{{ $element->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<!-- liquids -->
						<div class="form-group">
							<label for="liquids">Жидкости</label>
							<select multiple name="liquids[]" class="form-control form-control-sm" id="liquids" size="4">
								@foreach($liquids as $liquid)
								<option value="{{ $liquid->id }}" @if( in_array($liquid->id, (old('liquids')) ? old('liquids') : []) ) selected="selected" @endif>{{ $liquid->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<!-- artists -->
						<div class="form-group">
							<label for="artists">Художник</label>
							<select multiple name="artists[]" class="form-control form-control-sm" id="artists" size="3">
								@foreach($artists as $artist)
								<option value="{{ $artist->id }}" @if( in_array($artist->id, (old('artists')) ? old('artists') : []) ) selected="selected" @endif>{{ $artist->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

					</div>

					<div class="offset-md-4 col-md-4 text-center mb-3">

						<!-- view -->
						<div class="form-group">
							<label for="view">Показать результат в виде</label>
							<select name="view" class="form-control form-control-sm" id="view" required>
								<option value="_show_as_images" selected>Иллюстрации</option>
								<option value="_show_as_table">Таблица</option>
							</select>
						</div>

					</div>

					<div class="col-md-12 text-center mb-3">

						<button type="submit" class="btn btn-sm btn-outline-secondary">
							<i class="fa fa-btn fa-search"></i> Искать
						</button>
						<button class="btn btn-sm btn-outline-secondary" type="button" onclick="clearForm(this.form);">
							<i class="fa fa-btn fa-refresh"></i> Очистить
						</button>

					</div>

				</div>

			</form>

		</div>
	</div>
	<!-- Расширенный поиск КОНЕЦ -->

</div><!-- container END -->

@endsection
