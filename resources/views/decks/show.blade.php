@extends('layouts.main')

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <h4>{{ $deck->name }}</h4>
        <p>Формат: {{ $deck->format->name }}</p>

        <div class="row">

          <div class="col-md-4">

          </div>

          <div class="col-md-4">

          </div>

          <div class="col-md-4">

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

          </div>

        </div>



      </div>
    </div>
  </div>

@endsection
