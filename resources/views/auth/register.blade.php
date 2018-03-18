@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<h2 class="text-center">Регистрация</h2>
			<hr>

			<form method="POST" action="{{ route('register') }}">
				@csrf

				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

					<div class="col-md-6">
						<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

						@if ($errors->has('name'))
						<span class="invalid-feedback">{{ $errors->first('name') }}</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

					<div class="col-md-6">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

						@if ($errors->has('email'))
						<span class="invalid-feedback">{{ $errors->first('email') }}</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

					<div class="col-md-6">
						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

						@if ($errors->has('password'))
						<span class="invalid-feedback">{{ $errors->first('password') }}</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Пароль еще раз</label>

					<div class="col-md-6">
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-outline-primary">
							Зарегистрироваться
						</button>
					</div>
				</div>
			</form>

		</div>
	</div>
	@endsection
