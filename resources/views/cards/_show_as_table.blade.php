<div class="row">
	<div class="col-12">

      <table class="table table-bordered table-striped table-sm">
        <thead>
          <tr>
            <th>№</th>
            <th class="text-center" title="Стихия">C</th>
            <th>Название</th>
            <th class="text-center"><img src="/icons/lives-16x16.png" alt="Жизни" title="Жизни"></th>
            <th class="text-center"><img src="/icons/movement-16x16.png" alt="Движение" title="Движение"></th>
            <th>Типы</th>
            <th class="text-center" title="Стоимость">Ст</th>
            <th class="text-center" title="Редкость">Р</th>
            <th>Выпуск</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cards as $card)
          <tr>
            <td>{{ $card->number }}</td>
            <td class="text-center">
              @foreach($card->elements as $element)
                <img src="{{ $element->imagePath() }}" alt="Стихия: {{ $element->name }}" title="Стихия: {{ $element->name }}" class="img-fluid">
              @endforeach
            </td>
            <td>
              <a href="/cards/{{ $card->id }}" data-toggle="card-popover"
                data-content="<img src='{{ $card->imagePath() }}' class='img-fluid' alt='{{ $card->name }}'>"
                >{{ $card->name }}</a>
            </td>
            <td class="text-center">{{ $card->lives }}</td>
            <td class="text-center">
              @if($card)

              @endif



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
                <img src="{{ $liquid->imagePath() }}" alt="Стоимость: {{ $card->cost }} {{ $liquid->name }} жидкость" title="Стоимость: {{ $card->cost }} {{ $liquid->name }}  жидкость" class="img-fluid">
              @endforeach
            </td>
            <td class="text-center"><img src="{{ $card->rarity->imagePath() }}" alt="Редкость: {{ $card->rarity->name }}" title="Редкость: {{ $card->rarity->name }}" class="img-fluid"></td>
            <td>{{ $card->edition->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

	</div>
</div>