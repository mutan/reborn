@extends('layouts.main')

@section('content')

<div class="container">

	<div class="row justify-content-center">
		<div class="col-12 justify-content-center">

			<h3 class="text-center mt-3">Результаты поиска</h3>
			<hr>

			@if( ! isset($cards) || 0 == count($cards) )

				<p class="text-center">Ничего не найдено. Уточните условия поиска.</p>

			@else

				<p class="text-center">Найдено карт: {{ $cards->total() }}</p>
				<div class="row">
					@foreach($cards as $card)
					<div class="col-sm-6 col-md-4 col-lg-3">
						<a href="/cards/{{ $card->id }}">
							<img src="{{ $card->imagePath() }}" class="img-fluid" alt="{{ $card->name }}">
						</a>
						<p class="text-center">{{ $card->edition->name }}</p>
					</div>
					@endforeach
				</div>
				{{ $cards->links() }}

			@endif

		</div>
	</div>

</div>

@endsection
