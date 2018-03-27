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
            <th>Номер</th>
            <th>Название</th>
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
              <a href="/cards/{{ $card->id }}" data-toggle="card-popover"
                data-content="<img src='/images/{{ $card->image }}' class='img-fluid' alt='{{ $card->name }}'>"
                >{{ $card->name }}</a>
            </td>
            <td>{{ $card->fullType() }}</td>
            <td>{{ $card->cost }}</td>
            <td>{{ $card->rarity->name }}</td>
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
