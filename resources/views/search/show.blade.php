@extends('layouts.main')

@section('content')

<div class="container"><!-- container START -->

	<div class="row justify-content-center">
		<div class="col-12 justify-content-center">

			<h3 class="text-center mt-3">Результаты поиска</h3>

			@if( ! isset($cards) || 0 == count($cards) )

				<p class="text-center">Ничего не найдено.</p>

			@else
			
				<p class="text-center">Найдено {{ $cards->total() }} карт.</p>

				@includeIf('search._' .  $view)

				{{ $cards->links() }}

			@endif

		</div>
	</div>


</div><!-- container END -->

@endsection
