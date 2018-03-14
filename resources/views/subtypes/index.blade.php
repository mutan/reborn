@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('subtypes/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Подтипы</h3>

      @include('layouts.errors')

      <table class="table table-sm">
        <thead>
          <tr>
            <th class="text-muted">id</th>
            <th>Название</th>
            <th class="text-center">Действия</th>
          </tr>
        </thead>
        <tbody>
          @foreach($subtypes as $subtype)
          <tr>
            <td class="text-muted">{{ $subtype->id }}</td>
            <td>{{ $subtype->name }}</td>
            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('subtypes/' . $subtype->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('subtypes/' . $subtype->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
