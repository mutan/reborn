@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 justify-content-center">

      @can('moderate-cards')
      <a class="btn btn-sm btn-outline-secondary" href="{{ url(route('cards.index'))}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Список карт</a>

      <a class="btn btn-sm btn-outline-secondary" title="Редактировать" href="{{ url(route('cards.edit', ['card' => $card->id]))  }}" role="button"><i class="fa fa-btn fa-edit"></i> Редактировать</a>

      <a class="btn btn-sm btn-outline-secondary" title="Удалить" href="{{ url(route('cards.destroy', ['card' => $card->id])) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i> Удалить</a>
      @endcan

      <h3 class="text-center mt-3">Карта: {{ $card->name }}</h3>
      <hr>

      @include('layouts.errors')

      <div class="row">

        <div class="col-md-4">
            <img src="{{ $card->imagePath() }}" class="img-fluid" alt="{{ $card->name }}" title="{{ $card->name }}">

              <p class="text-center mt-3">Легальность в форматах</p>
                @foreach($formats as $format)

                    @if( $card->isLegal($format) )
                      <span class="text-success">{{ $format->name }} – карта легальна</span><br>
                    @else
                      <span class="text-danger">{{ $format->name }} – карта нелегальна</span><br>
                    @endif

                @endforeach




        </div>

        <div class="col-md-8">

         <table class="table table-responsive table-sm">
          <tr>
            <th>Название</th>
            <td>{{ $card->name }}</td>
          </tr>
          <tr>
            <th>Выпуск</th>
            <td><img src="{{ $card->edition->imagePath() }}" alt="{{ $card->edition->name }}" title="{{ $card->edition->name }}"> {{ $card->edition->name }}</td>
          </tr>
          <tr>
            <th>Редкость</th>
            <td><img src="{{ $card->rarity->imagePath() }}" alt="{{ $card->rarity->name }}" title="{{ $card->rarity->name }}"> {{ $card->rarity->name }}</td>
          </tr>
            <th>Стихии</th>
            <td>
              @foreach ($card->elements as $element) 
                <img src="{{ $element->imagePath() }}" alt="{{ $element->name }}" title="{{ $element->name }}"> {{ $element->name }}
              @endforeach
            </td>
          </tr>
          </tr>
            <th>Стоимость</th>
            <td>
              {{ $card->cost }}
              @foreach ($card->liquids as $liquid) 
                <img src="{{ $liquid->imagePath() }}" alt="{{ $liquid->name }}" title="{{ $liquid->name }}" class="img-fluid">
              @endforeach
            </td>
          </tr>
          <tr>
            <th>Типы</th>
            <td>{{ $card->fullType() }}</td>
          </tr>
          <tr>
            <th>Обычный удар</th>
            <td>
              <img src="/icons/power.png" alt="Обычный удар" title="Обычный удар"> {{ $card->fullPower() }}
              <img src="/icons/lives-16x16.png" alt="Жизни" title="Жизни"> {{ $card->lives }} 
              <img src="/icons/movement-16x16.png" alt="Движение" title="Движение">
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
          </tr>
          <tr>
            <th>Текст</th>
            <td>{!! $card->text !!}</td>
          </tr>
          <tr>
            <th>Художественный текст</th>
            <td>{!! $card->flavor !!}</td>
          </tr>
          <tr>
            <th>Номер</th>
            <td>{{ $card->number }}</td>
          </tr>
          <tr>
            <th>Художники</th>
            <td>
              @foreach ($card->artists as $artist) 
                {{ $artist->name }}
              @endforeach
            </td>
          </tr>
          <tr>
            <th>Эрраты</th>
            <td>{{ $card->erratas }}</td>
          </tr>
          <tr>
            <th>Комментарии по правилам</th>
            <td>{{ $card->comments }}</td>
          </tr>
        </table>

        </div>

      </div>

    </div>
  </div>
</div>

@endsection
