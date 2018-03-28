@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('editions/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Выпуски</h3>

      @include('layouts.errors')

      <table class="table table-sm">
        <thead>
          <tr>
            <th>Название</th>
            <th><i class="fa fa-btn fa-image"></i></th>
            <th>Код</th>
            <th>Кол-во карт</th>
            <th>Описание</th>
            <th class="text-center">Действия</th>
          </tr>
        </thead>
        <tbody>
          @foreach($editions as $edition)
          <tr>
            <td>{{ $edition->name }}</td>
            <td><img src="{{ $edition->imagePath() }}" alt="{{ $edition->name }}" title="{{ $edition->name }}" class="image-fluid"></td>
            <td>{{ $edition->code }}</td>
            <td>{{ $edition->quantity }}</td>
            <td style="min-width: 50%">{!! $edition->description !!}</td>
            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('editions/' . $edition->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('editions/' . $edition->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
