@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('decks')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Назад к списку</a>

			<h3 class="text-center mt-3">Добавить колоду</h3>
			<hr>

			<p>Сначала добавляется «пустая» колода, то есть только формат, название и описание. Потом в списке колод добавляются карты.</p>

			@include('layouts.errors')

			<form action="{{ url('decks')}}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="format_id">Формат</label>
					<select name="format_id" class="form-control {{ $errors->has('format_id') ? ' is-invalid' : '' }}" id="format_id" required>
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
					<button type="submit" class="btn btn-block btn-outline-secondary">
						<i class="fa fa-btn fa-save"></i> Сохранить
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

@endsection
