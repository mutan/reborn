@extends('layouts.main')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        @include('layouts.errors')

        <h4>{{ $deck->name }}</h4>
        <p>Формат: {{ $deck->format->name }}</p>

        <div class="row">

          <div class="col-md-4">

            <p><strong>Существа</strong></p>
            <p><strong>Артефакты</strong></p>

            @foreach($deck->cards as $card)
              {{ $card->pivot->quantity }}
              <a href="/cards/{{ $card->id }}" data-toggle="card-popover" data-content="<img src='{{ $card->imagePath() }}' class='img-fluid' alt='{{ $card->name }}'>">
                {{ $card->name }}
              </a>
              @can('removeCard', $deck)
                <a title="Удалить" href="{{ url('decks/' . $deck->id . '/remove-card/' . $card->id) }}" data-method="put" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-times" style="color: red; font-size:85php%;"></i></a>
              @endcan
              <br>
            @endforeach

          </div>

          <div class="col-md-4">

          </div>

          <div class="col-md-4">

            @can('addCard', $deck)
            <h5>Добавить карту</h5>
            <hr>
            <form action="{{ url('decks/' . $deck->id . '/add-card') }}" method="POST">
              {{ csrf_field() }}
              <div class="input-group input-group-sm">
                <input id="search-for-deck" name="name" type="text" class="form-control col-8 border border-dark" placeholder="Начните вводить название">
                <select name="quantity" class="form-control col-2 border border-dark" id="quantity">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary border border-dark" type="submit">
                    <i class="fa fa-btn fa-plus"></i> Добавить
                  </button>
                </div>
              </div>
            </form>
            @endcan

          </div>

        </div>


      </div>
    </div>
  </div>

@endsection
