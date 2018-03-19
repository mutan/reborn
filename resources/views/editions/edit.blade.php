@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6 justify-content-center">

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('editions')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Назад к списку</a>

			<h3 class="text-center mt-3">Редактировать выпуск</h3>
			<hr>

			<form action="{{ url('editions/' . $edition->id) }}" method="POST" class="form-horizontal">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Название</label>
					<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ $edition->name }}">
					@if ($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@endif
				</div>

				<div class="form-row">

					<div class="form-group col-sm-6">
						<label for="code">Код</label>
						<input type="text" name="code" class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}" id="code" value="{{ $edition->code }}">
						@if ($errors->has('code'))
						<div class="invalid-feedback">{{ $errors->first('code') }}</div>
						@else
						<small id="codeHelpBlock" class="form-text text-muted">Максимум 5 символов.</small>
						@endif
					</div>

					<div class="form-group col-sm-6">
						<label for="quantity">Кол-во</label>
						<input type="number" name="quantity" class="form-control {{ $errors->has('quantity') ? ' is-invalid' : '' }}" id="quantity" value="{{ $edition->quantity }}">
						@if ($errors->has('quantity'))
						<div class="invalid-feedback">{{ $errors->first('quantity') }}</div>
						@else
						<small id="quantityHelpBlock" class="form-text text-muted">Только цифры.</small>
						@endif
					</div>

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
