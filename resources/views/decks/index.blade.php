@extends('layouts.main')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">

			<h3 class="text-center mt-3">Колоды</h3>
			<hr>

			<table class="table table-bordered table-sm">
				<thead>
					<tr>
						<th>Формат</th>
						<th>Название</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach($decks as $deck)
							<td>{{ $deck->format->name }}</td>
							<td>{{ $deck->name }}</td>
							<td class="text-center">
								<a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('decks/' . $deck->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
								<a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('decks/' . $deck->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
								<a class="btn btn-sm btn-outline-secondary" alt="Карты" title="Карты" href="{{ url('decks/' . $deck->id) }}">Карты</a>
							</td>
						@endforeach
					</tr>
				</tbody>
			</table>



		</div>
	</div>
</div>

@endsection
