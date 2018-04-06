@extends('layouts.main')

@section('content')

<div class="container"><!-- container START -->

	<div class="row justify-content-center">
		<div class="col-12 justify-content-center">

			<h3 class="text-center mt-3">Результаты поиска</h3>

			@if( ! isset($cards) || 0 == count($cards) )

				<p class="text-center">Ничего не найдено. Уточните условия поиска.</p>

			@else

				<p class="text-center">Найдено карт: {{ $cards->total() }}</p>

				@includeIf('cards.' . $view)

				{{ $cards->links() }}

			@endif

		</div>
	</div>


</div><!-- container END -->

@endsection
