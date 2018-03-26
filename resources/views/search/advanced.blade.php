@extends('layouts.main')

@section('content')

<div class="container"><!-- container START -->


	@include('layouts.errors')


	<!-- Расширенный поиск НАЧАЛО -->
	<div class="row border border-secondary rounded">
		<div class="col-md-12 ">

			<h5 id="extended-search-header" class="text-center">Расширенный поиск</h5>

			<form action="{{ url('search/advanced') }}" method="GET">

				<div class="row" id="extended-search">

					<div class="col-md-4">

						<div class="form-group">
							<label for="name">Название</label>
							<input type="text" name="name" class="form-control form-control-sm" id="name" value="{{ old('name') }}">
						</div>

						<div class="row">
							<div class="col-8">
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
								<div class="form-group">
									<label for="number">Номер</label>
									<input type="text" name="number" class="form-control form-control-sm" id="number" value="{{ old('number') }}">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="rarity_id">Редкость</label>
							<select name="rarity_id" class="form-control form-control-sm" id="rarity_id">
								<option selected></option>
								@foreach($rarities as $rarity)
								<option value="{{ $rarity->id }}" @if( $rarity->id == old('rarity_id') ) selected="selected" @endif>{{ $rarity->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Стоимость</span>
							</div>
							<select name="cost-condition" class="form-control" id="cost-condition">
								<option> = </option>
								<option> > </option>
								<option> >= </option>
								<option> < </option>
								<option> <= </option>
							</select>
							<input type="text" name="cost" class="form-control" id="cost" value="{{ old('cost') }}">
						</div>

						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Жизни</span>
							</div>
							<select name="lives-condition" class="form-control" id="lives-condition">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<input type="text" name="lives" class="form-control" id="lives" value="{{ old('lives') }}">
						</div>

						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Движение</span>
							</div>
							<select name="movement-condition" class="form-control" id="movement-condition">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<input type="text" name="movement" class="form-control" id="movement" value="{{ old('movement') }}">
						</div>

						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Слабый ОУ</span>
							</div>
							<select name="power-weak-condition" class="form-control" id="power-weak-condition">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<input type="text" name="power-weak" class="form-control" id="power-weak" value="{{ old('power-weak') }}">
						</div>

						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Средний ОУ</span>
							</div>
							<select name="power-medium-condition" class="form-control" id="power-medium-condition">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<input type="text" name="power-medium" class="form-control" id="power-medium" value="{{ old('power-medium') }}">
						</div>

						<div class="input-group input-group-sm mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">Сильный ОУ</span>
							</div>
							<select name="power-strong-condition" class="form-control" id="power-strong-condition">
								<option selected> = </option>
								<option value=""> > </option>
								<option value=""> >= </option>
								<option value=""> < </option>
								<option value=""> <= </option>
							</select>
							<input type="text" name="power-strong" class="form-control" id="power-strong" value="{{ old('power-strong') }}">
						</div>

					</div>

					<div class="col-md-4">

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

						<div class="form-group">
							<label for="types">Типы</label>
							<select multiple name="types[]" class="form-control form-control-sm" id="types" size="2">
								@foreach($types as $type)
								<option value="{{ $type->id }}" @if( in_array($type->id, (old('types')) ? old('types') : []) ) selected="selected" @endif>{{ $type->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<div class="form-group">
							<label for="subtypes">Подтипы</label>
							<select multiple name="subtypes[]" class="form-control form-control-sm" id="subtypes" size="4">
								@foreach($subtypes as $subtype)
								<option value="{{ $subtype->id }}" @if( in_array($subtype->id, (old('subtypes')) ? old('subtypes') : []) ) selected="selected" @endif>{{ $subtype->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

					</div>

					<div class="col-md-4">

						<div class="form-group">
							<label for="elements">Стихии</label>
							<select multiple name="elements[]" class="form-control form-control-sm" id="element" size="3">
								@foreach($elements as $element)
								<option value="{{ $element->id }}" @if( in_array($element->id, (old('elements')) ? old('elements') : []) ) selected="selected" @endif>{{ $element->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<div class="form-group">
							<label for="liquids">Жидкости</label>
							<select multiple name="liquids[]" class="form-control form-control-sm" id="liquids" size="3">
								@foreach($liquids as $liquid)
								<option value="{{ $liquid->id }}" @if( in_array($liquid->id, (old('liquids')) ? old('liquids') : []) ) selected="selected" @endif>{{ $liquid->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<div class="form-group">
							<label for="artists">Художник</label>
							<select multiple name="artists[]" class="form-control form-control-sm" id="artists" size="3">
								@foreach($artists as $artist)
								<option value="{{ $artist->id }}" @if( in_array($artist->id, (old('artists')) ? old('artists') : []) ) selected="selected" @endif>{{ $artist->name }}</option>
								@endforeach
							</select>
							<small class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
						</div>

						<div class="form-group">
							<label for="text">Текст карты</label>
							<input type="text" name="text" class="form-control form-control-sm" id="search" value="{{ old('text') }}">
						</div>

						<div class="form-group">
							<label for="flavor">Художественный текст</label>
							<input type="text" name="flavor" class="form-control form-control-sm" id="search" value="{{ old('flavor') }}">
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

	<div class="row justify-content-center">
		<div class="col-12 justify-content-center">

			<h3 class="text-center mt-3">Результаты поиска</h3>
			<hr>
			@if(! isset($cards) )      
			<p>Ничего не найдено.</p>
			@else
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>Номер</th>
						<th>Название</th>
						<th>Типы</th>
						<th>Стоимость</th>
						<th>Редкость</th>
						<th>Выпуск</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cards as $card)
					<tr>
						<td>{{ $card->number }}</td>
						<td>
							<a href="/cards/{{ $card->id }}" data-toggle="card-popover"	data-content="<img src='/images/{{ $card->image }}' class='img-fluid' alt='{{ $card->name }}'>">{{ $card->name }}</a>
						</td>
						<td>{{ $card->fulltype() }}</td>
						<td>{{ $card->cost }}</td>
						<td>{{ $card->rarity->name }}</td>
						<td>{{ $card->edition->name }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif

		</div>
	</div>


</div><!-- container END -->

@endsection
