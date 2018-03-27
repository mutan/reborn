<div class="row">
	<div class="col-12">

		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>№</th>
					<th>Стихии</th>
					<th>Название</th>
					<th><img src="/icons/lives-16x16.png" alt="Жизни" title="Жизни"></th>
					<th><img src="/icons/movement-16x16.png" alt="Движение" title="Движение"></th>
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
					<td>
						@foreach($card->elements as $element)
							<img src="{{ $element->imagePath() }}" alt="{{ $element->name }}" title="{{ $element->name }}" class="img-fluid">
						@endforeach
					</td>
					<td>
						<a href="/cards/{{ $card->id }}" data-toggle="card-popover"	data-content="<img src='{{ $card->imagePath() }}' class='img-fluid' alt='{{ $card->name }}'>">{{ $card->name }}</a>
					</td>
					<td>{{ $card->lives }}</td>
					<td>{{ $card->movement }}</td>
					<td>{{ $card->fullType() }}</td>
					<td>{{ $card->cost }}</td>
					<td>{{ $card->rarity->name }}</td>
					<td>{{ $card->edition->name }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>
</div>