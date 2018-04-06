@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('cards/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Карты</h3>

      @include('layouts.errors')

      @include('cards._show_as_table')

    </div>
  </div>
</div>

@endsection
