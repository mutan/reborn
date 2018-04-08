@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">

			<h3 class="text-center mt-3">Колоды</h3>
			<hr>

			<table class="table table-bordered table-striped table-sm">
				<thead>
					<tr>
						<th>Название</th>
					</tr>
				</thead>
				<tbody>
					@foreach($decks as $deck)
						<tr>
							<td>{{ $deck->name }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>



		</div>
	</div>
</div>

@endsection
