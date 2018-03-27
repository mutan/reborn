<div class="row">
	<div class="col-12">

		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Номер</th>
					<th>Стихия</th>
					<th>Название</th>
					<th>Типы</th>
					<th>Стоимость</th>
					<th>Редкость</th>
					<th>Выпуск</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cards as $card)
				<tr>
					<td>{{ $card->number }}</td>
					<td></td>
					<td>
						<a href="/cards/{{ $card->id }}" data-toggle="card-popover"	data-content="<img src='{{ $card->imagelink() }}' class='img-fluid' alt='{{ $card->name }}'>">{{ $card->name }}</a>
					</td>
					<td>{{ $card->fulltype() }}</td>
					<td>{{ $card->cost }}</td>
					<td>{{ $card->rarity->name }}</td>
					<td>{{ $card->edition->name }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>