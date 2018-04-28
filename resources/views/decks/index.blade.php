@extends('layouts.main')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        @can('create', App\Deck::class)
        <a class="btn btn-sm btn-outline-secondary" href="{{ url('decks/create')}}" role="button"><i
              class="fa fa-btn fa-plus"></i> Добавить</a>
        @endcan

        <h3 class="text-center mt-3">Колоды</h3>
        <hr>

        <table class="table table-bordered table-sm">
          <thead>
          <tr>
            <th>Название</th>
            <th>Формат</th>
            <th>Турнир</th>
            @can('moderate-decks')
              <th>Действия</th>
            @endcan
          </tr>
          </thead>
          <tbody>
          <tr>
            @foreach($decks as $deck)
              <td>{{ $deck->name }}</td>
              <td>{{ $deck->format->name }}</td>
              <td>–</td>
              @can('moderate-decks')
                <td class="text-center">
                  <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать"
                     href="{{ url('decks/' . $deck->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
                  <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить"
                     href="{{ url('decks/' . $deck->id) }}" data-method="delete" data-token="{{csrf_token()}}"
                     data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
                  <a class="btn btn-sm btn-outline-secondary" alt="Карты" title="Карты"
                     href="{{ url('decks/' . $deck->id) }}">Карты</a>
                </td>
              @endcan
            @endforeach
          </tr>
          </tbody>
        </table>


      </div>
    </div>
  </div>

@endsection
