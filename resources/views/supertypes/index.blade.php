@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-6 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('supertypes/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Супертипы</h3>

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
          @foreach($supertypes as $supertype)
          <tr>
            <td class="text-muted">{{ $supertype->id }}</td>
            <td>{{ $supertype->name }}</td>
            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('supertypes/' . $supertype->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('supertypes/' . $supertype->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
