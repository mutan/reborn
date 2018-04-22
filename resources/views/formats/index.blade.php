@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-12">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('formats/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Форматы турниров</h3>

      @include('layouts.errors')

      <table class="table table-bordered table-sm">
        <thead>
          <tr>
            <th>Название</th>
            <th>Выпуски</th>
            <th>Описание</th>
            <th class="text-center">Действия</th>
          </tr>
        </thead>
        <tbody>
          @foreach($formats as $format)
          <tr>
            <td>{{ $format->name }}</td>
            <td>
              @foreach($format->editions as $edition)
                <img src="{{ $edition->imagePath() }}" alt="{{ $edition->name }}" title="{{ $edition->name }}" class="image-fluid"> {{ $edition->name }}<br>
              @endforeach
            </td>
            <td style="min-width: 50%">{!! $format->description !!}</td>
            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('formats/' . $format->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('formats/' . $format->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
