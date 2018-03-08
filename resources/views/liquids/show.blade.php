@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-6 justify-content-center">

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('liquid')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Назад к списку</a>

			<a class="btn btn-sm btn-outline-secondary" href="{{ url('liquid/' . $liquid->id . '/edit') }}" role="button"><i class="fa fa-btn fa-edit"></i> Редактировать</a>




			<h3 class="text-center">Посмотреть жидкость</h3>

			<h3>{{ $liquid->title }}</h3>

			<p><strong>Название выпуска:</strong> {{ $liquid->title }}</p>


			

		</div>
	</div>
</div>

@endsection
