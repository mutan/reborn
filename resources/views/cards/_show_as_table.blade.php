<div class="row">
	<div class="col-12">

      <table class="table table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>№</th>
            <th>Стихии</th>
            <th>Название</th>
            <th class="text-center"><img src="/icons/lives-16x16.png" alt="Жизни" title="Жизни"></th>
            <th class="text-center"><img src="/icons/movement-16x16.png" alt="Движение" title="Движение"></th>
            <th>Типы</th>
            <th>Стоимость</th>
            <th>Редкость</th>
            <th>Выпуск</th>
            @can('access-cards')
              <th class="text-center">Действия</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($cards as $card)
          <tr>
            <td>{{ $card->number }}</td>
            <td class="text-center">
              @foreach($card->elements as $element)
                <img src="{{ $element->imagePath() }}" alt="{{ $element->name }}" title="{{ $element->name }}" class="img-fluid">
              @endforeach
            </td>
            <td>
              <a href="/cards/{{ $card->id }}" data-toggle="card-popover"
                data-content="<img src='{{ $card->imagePath() }}' class='img-fluid' alt='{{ $card->name }}'>"
                >{{ $card->name }}</a>
            </td>
            <td class="text-center">{{ $card->lives }}</td>
            <td class="text-center">
              @switch($card->movement)
                  @case('F')
                    <img src="/icons/flying.png" class="img-fluid" alt="Полет" title="Полет">
                    @break
                  @case('N')
                    –
                    @break
                  @default
                    {{ $card->movement }}
              @endswitch
            </td>
            <td>{{ $card->fullType() }}</td>
            <td class="text-center">
              {{ $card->cost }} 
              @foreach($card->liquids as $liquid)
                <img src="{{ $liquid->imagePath() }}" alt="{{ $liquid->name }}" title="{{ $liquid->name }}" class="img-fluid">
              @endforeach
            </td>
            <td class="text-center"><img src="{{ $card->rarity->imagePath() }}" alt="{{ $card->rarity->name }}" title="{{ $card->rarity->name }}" class="img-fluid"></td>
            <td>{{ $card->edition->name }}</td>
            @can('access-cards')
            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Посмотреть" title="Посмотреть" href="{{ url('cards/' . $card->id) }}"><i class="fa fa-btn fa-eye"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('cards/' . $card->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('cards/' . $card->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>

	</div>
</div>