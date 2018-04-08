@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">

			<h3 class="text-center mt-3">Добавить колоду</h3>
			<hr>

			@include('layouts.errors')

			<form action="{{ url('decks')}}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Название</label>
					<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}">
					@if ($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="description">Описание</label>
					<textarea type="text" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
					<div class="invalid-feedback">{{ $errors->first('description') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="format_id">Формат</label>
					<select name="format_id" class="form-control {{ $errors->has('format_id') ? ' is-invalid' : '' }}" id="format_id">
						<option selected></option>
						@foreach($formats as $format)
						<option value="{{ $format->id }}" @if( $format->id == old('format_id') ) selected="selected" @endif>{{ $format->name }}</option>
						@endforeach
					</select>
					@if ($errors->has('format_id'))
					<div class="invalid-feedback">{{ $errors->first('format_id') }}</div>
					@endif
				</div>

				<div class="form-group">
					<label for="cards">Карты</label>
					<textarea type="text" name="cards" class="form-control {{ $errors->has('cards') ? ' is-invalid' : '' }}" id="cards" rows="3">{{ old('cards') }}</textarea>
					@if ($errors->has('cards'))
					<div class="invalid-feedback">{{ $errors->first('cards') }}</div>
					@else
					<small id="cardsHelpBlock" class="form-text text-muted">Список карт в формате «[Количество] [Точное название]».<br>Количество должно быть от 1 до 3.<br>Например:<br>1 Титан Огня<br>3 Бертар</small>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-outline-secondary">
						<i class="fa fa-btn fa-save"></i> Сохранить
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

@endsection
