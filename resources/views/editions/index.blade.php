@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('editions/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Выпуски</h3>

      @include('layouts.errors')

      <table class="table table-sm">
        <thead>
          <tr>
            <th class="text-muted">id</th>
            <th>Название</th>
            <th>Код</th>
            <th>Кол-во карт</th>
            <th class="text-center">Действия</th>
          </tr>
        </thead>
        <tbody>
          @foreach($editions as $edition)
          <tr>
            <td class="text-muted">{{ $edition->id }}</td>
            <td>{{ $edition->name }}</td>
            <td>{{ $edition->code }}</td>
            <td>{{ $edition->quantity }}</td>
            <td class="text-center">
              <!-- <a class="btn btn-sm btn-outline-secondary" alt="Посмотреть" title="Посмотреть" href="{{ url('editions/' . $edition->id) }}"><i class="fa fa-btn fa-eye"></i></a> -->
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
