@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-6 justify-content-center">

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('subtypes')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Назад к списку</a>

			<h3 class="text-center mt-3">Добавить подтип</h3>

			<form action="{{ url('subtypes')}}" method="POST" class="form-horizontal">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Название</label>
					<input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" value="{{ old('name') }}">
					@if ($errors->has('name'))
					<div class="invalid-feedback">{{ $errors->first('name') }}</div>
					@else
					<small id="nameHelpBlock" class="form-text text-muted">Максимум 50 символов.</small>
					@endif
				</div>	

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-outline-secondary">
						<i class="fa fa-btn fa-plus"></i> Добавить
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

@endsection
