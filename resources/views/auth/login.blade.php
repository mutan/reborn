@extends('layouts.main')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-8 col-xl-6">

			<h2 class="text-center">Вход</h2>
			<hr>

			<form method="POST" action="{{ route('login') }}">
				@csrf

				<div class="form-group row">
					<label for="email" class="col-sm-4 col-form-label text-md-right">E-mail</label>
					<div class="col-md-8">
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
						@if ($errors->has('email'))
						<span class="invalid-feedback">{{ $errors->first('email') }}</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
					<div class="col-md-8">
						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
						@if ($errors->has('password'))
						<span class="invalid-feedback">{{ $errors->first('password') }}</span>
						@endif
					</div>
				</div>

				<div class="form-group row">
					<div class="col-md-8 offset-md-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-8 offset-md-4">
						<button type="submit" class="btn btn-outline-primary">
							Войти
						</button>
					</div>
				</div>

				<div class="form-group row mb-0">
					<div class="col-md-8 offset-md-4">
						<hr>
						<a class="mr-3" href="{{ route('password.request') }}">Забыли пароль?</a> 
						<a class="" href="{{ route('register') }}">Регистрация</a>
					</div>
				</div>

			</form>



		</div>
	</div>
	@endsection
