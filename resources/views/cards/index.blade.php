@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('cards/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Карты</h3>

      @include('layouts.errors')

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
            <th class="text-center">Действия</th>
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
              <a href="/cards/{{ $card->id }}" data-toggle="card-popover"
                data-content="<img src='{{ $card->imagePath() }}' class='img-fluid' alt='{{ $card->name }}'>"
                >{{ $card->name }}</a>
            </td>
            <td>{{ $card->lives }}</td>
            <td>{{ $card->movement }}</td>
            <td>{{ $card->fullType() }}</td>
            <td>
              {{ $card->cost }} 
              @foreach($card->liquids as $liquid)
                <img src="{{ $liquid->imagePath() }}" alt="{{ $liquid->name }}" title="{{ $liquid->name }}" class="img-fluid">
              @endforeach
            </td>
            <td><img src="{{ $card->rarity->imagePath() }}" alt="{{ $card->rarity->name }}" title="{{ $card->rarity->name }}" class="img-fluid"></td>
            <td>{{ $card->edition->name }}</td>
            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Посмотреть" title="Посмотреть" href="{{ url('cards/' . $card->id) }}"><i class="fa fa-btn fa-eye"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('cards/' . $card->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('cards/' . $card->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
