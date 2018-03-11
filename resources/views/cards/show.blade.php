@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('cards')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Список карт</a>

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('cards/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Карта: {{ $card->name }}</h3>

      @include('layouts.errors')

      <div class="row">

        <div class="col-4">
          <img src="{{ $card->image }}" class="img-fluid" alt="Responsive image">
        </div>

        <div class="col-4">
          <p>Название: {{ $card->name }}</p>

          <dt class="col-sm-4">Название</dt>
          <dd class="col-sm-8"></dd>
          <dt class="col-sm-4">Изображение</dt>
          <dd class="col-sm-8">{{ $card->image }}</dd>
          <dt class="col-sm-4">Выпуск</dt>
          <dd class="col-sm-8">{{ $card->edition->name }}</dd>
        </div>

      </div>




    </div>
  </div>
</div>

@endsection
