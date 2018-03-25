@extends('layouts.main')

@section('content')

<div class="container">


	@include('layouts.errors')


	<!-- Расширенный поиск НАЧАЛО -->
	<div class="row border border-secondary rounded">
		<div class="col-md-12 ">

			<h5 id="extended-search-header" class="text-center">Расширенный поиск</h4>

				<form action="{{ url('search') }}" method="GET">

					<div class="row" id="extended-search">

						<div class="col-md-4">

							<div class="form-group">
								<label for="name">Название</label>
								<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="search" value="{{ old('name') }}">
								@if ($errors->has('name'))
								<div class="invalid-feedback">{{ $errors->first('name') }}</div>
								@endif
							</div>

							<div class="row">
								<div class="col-8">
									<div class="form-group">
										<label for="edition_id">Выпуск</label>
										<select name="edition_id" class="form-control {{ $errors->has('edition_id') ? ' is-invalid' : '' }}" id="edition_id">
											<option selected></option>
											@foreach($editions as $edition)
											<option value="{{ $edition->id }}" @if( $edition->id == old('edition_id') ) selected="selected" @endif>{{ $edition->name }}</option>
											@endforeach
										</select>
										@if ($errors->has('edition_id'))
										<div class="invalid-feedback">{{ $errors->first('edition_id') }}</div>
										@endif
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="number">Номер</label>
										<input type="text" name="number" class="form-control" id="number" value="{{ old('number') }}">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="rarity_id">Редкость</label>
								<select name="rarity_id" class="form-control" id="rarity_id">
									<option selected></option>
									@foreach($rarities as $rarity)
									<option value="{{ $rarity->id }}" @if( $rarity->id == old('rarity_id') ) selected="selected" @endif>{{ $rarity->name }}</option>
									@endforeach
								</select>
							</div>




							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Стоимость</span>
								</div>
								<select name="cost-condition" class="form-control" id="cost-condition">
									<option selected> = </option>
									<option value=""> > </option>
									<option value=""> >= </option>
									<option value=""> < </option>
									<option value=""> <= </option>
								</select>
								<input type="text" name="cost" class="form-control" id="cost" value="{{ old('cost') }}">
							</div>

							<div class="input-group mb-3">
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

							<div class="input-group mb-3">
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

							<div class="input-group mb-3">
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

							<div class="input-group mb-3">
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

							<div class="input-group mb-3">
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
						<label for="supertype">Супертипы</label>
						<select multiple name="supertype[]" class="form-control {{ $errors->has('supertype') ? ' is-invalid' : '' }}" id="supertype" size="2">
							@foreach($supertypes as $supertype)
							<option value="{{ $supertype->id }}" @if( in_array($supertype->id, (old('supertype')) ? old('supertype') : []) ) selected="selected" @endif>{{ $supertype->name }}</option>
							@endforeach
						</select>
						<small id="liquidHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
					</div>

					<div class="form-group">
						<label for="type">Типы</label>
						<select multiple name="type[]" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" id="type" size="2">
							@foreach($types as $type)
							<option value="{{ $type->id }}" @if( in_array($type->id, (old('type')) ? old('type') : []) ) selected="selected" @endif>{{ $type->name }}</option>
							@endforeach
						</select>
						<small id="liquidHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
					</div>

					<div class="form-group">
						<label for="subtype">Подтипы</label>
						<select multiple name="subtype[]" class="form-control {{ $errors->has('subtype') ? ' is-invalid' : '' }}" id="subtype" size="3">
							@foreach($subtypes as $subtype)
							<option value="{{ $subtype->id }}" @if( in_array($subtype->id, (old('subtype')) ? old('subtype') : []) ) selected="selected" @endif>{{ $subtype->name }}</option>
							@endforeach
						</select>
						<small id="liquidHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
					</div>

						</div>

						<div class="col-md-4">

							<div class="form-group">
								<label for="element">Стихии</label>
								<select multiple name="element[]" class="form-control {{ $errors->has('element') ? ' is-invalid' : '' }}" id="element" size="3">
									@foreach($elements as $element)
									<option value="{{ $element->id }}" @if( in_array($element->id, (old('element')) ? old('element') : []) ) selected="selected" @endif>{{ $element->name }}</option>
									@endforeach
								</select>
								@if ($errors->has('element'))
								<div class="invalid-feedback">{{ $errors->first('element') }}</div>
								@else
								<small id="elementHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
								@endif
							</div>

							<div class="form-group">
								<label for="liquid">Жидкости</label>
								<select multiple name="liquid[]" class="form-control {{ $errors->has('liquid') ? ' is-invalid' : '' }}" id="liquid" size="3">
									@foreach($liquids as $liquid)
									<option value="{{ $liquid->id }}" @if( in_array($liquid->id, (old('liquid')) ? old('liquid') : []) ) selected="selected" @endif>{{ $liquid->name }}</option>
									@endforeach
								</select>
								<small id="liquidHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
							</div>

							<div class="form-group">
								<label for="artist">Художник</label>
								<select multiple name="artist[]" class="form-control {{ $errors->has('artist') ? ' is-invalid' : '' }}" id="artist" size="3">
									@foreach($artists as $artist)
									<option value="{{ $artist->id }}" @if( in_array($artist->id, (old('artist')) ? old('artist') : []) ) selected="selected" @endif>{{ $artist->name }}</option>
									@endforeach
								</select>
								<small id="artistHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
							</div>

							<div class="form-group">
								<label for="text">Текст карты</label>
								<input type="text" name="text" class="form-control" id="search" value="{{ old('text') }}">
							</div>

							<div class="form-group">
								<label for="flavor">Художественный текст</label>
								<input type="text" name="flavor" class="form-control" id="search" value="{{ old('flavor') }}">
							</div>

						</div>

						<div class="col-md-12 text-center mb-3">
							<button type="submit" class="btn btn-outline-secondary">
								<i class="fa fa-btn fa-search"></i> Искать
							</button>
							<button class="btn btn-outline-secondary" type="button" onclick="clearForm(this.form);">
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
								<a href="/cards/{{ $card->id }}" data-toggle="card-popover"
									data-content="<img src='/images/{{ $card->image }}' class='img-fluid' alt='{{ $card->name }}'>"
									>{{ $card->name }}</a>
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
		</div>

		@endsection
