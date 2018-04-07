@extends('layouts.main')

@section('tinyMCE')
@include('layouts.tinymce')
@endsection

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-6">

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('formats')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Назад к списку</a>

			<h3 class="text-center mt-3">Добавить формат турниров</h3>
			<hr>

			<form action="{{ url('formats')}}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Название</label>
					<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}">
					@if ($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@else
					<small id="nameHelpBlock" class="form-text text-muted">Например: «Стандарт (КТМ + ПГВ)»</small>
					@endif
				</div>

				<div class="form-group">
					<label for="edition">Выпуски</label>
					<select multiple name="edition[]" class="form-control {{ $errors->has('edition') ? ' is-invalid' : '' }}" id="edition">
						@foreach($editions as $edition)
						<option value="{{ $edition->id }}" @if( in_array($edition->id, (old('edition')) ? old('edition') : []) ) selected="selected" @endif>
							{{ $edition->name }} ({{ $edition->code }})
						</option>
						@endforeach
					</select>
					@if ($errors->has('edition'))
					<div class="invalid-feedback">{{ $errors->first('edition') }}</div>
					@else
					<small id="editionHelpBlock" class="form-text text-muted">Можно выбрать несколько с зажатым Ctrl</small>
					@endif
				</div>

				<div class="form-group">
					<label for="banned">Забаненные карты</label>
					<textarea type="text" name="banned" class="form-control {{ $errors->has('banned') ? ' is-invalid' : '' }}" id="banned" rows="2">{{ old('banned') }}</textarea>
					@if ($errors->has('banned'))
					<div class="invalid-feedback">{{ $errors->first('banned') }}</div>
					@else
					<small id="bannedHelpBlock" class="form-text text-muted">Точные названия карт, разделенные запятой БЕЗ ПРОБЕЛОВ</small>
					@endif
				</div>

				<div class="form-group">
					<label for="description">Описание</label>
					<textarea type="text" name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" rows="3">{{ old('description') }}</textarea>
					@if ($errors->has('description'))
					<div class="invalid-feedback">{{ $errors->first('description') }}</div>
					@else
					<small id="descriptionHelpBlock" class="form-text text-muted">Одинарный перенос – Shift+Enter</small>
					@endif
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-outline-secondary">
						<i class="fa fa-btn fa-save"></i> Добавить
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

@endsection
