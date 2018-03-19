@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('cards/create')}}" role="button"><i class="fa fa-btn fa-plus"></i> Добавить</a>

      <h3 class="text-center mt-3">Карты</h3>

      @include('layouts.errors')

      <table class="table table-sm">
        <thead>
          <tr>
            <th class="text-muted">id</th>
            <th>Изобр.</th>
            <th>Название</th>
            <th class="text-center">Действия</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cards as $card)
          <tr>
            <td class="text-muted">{{ $card->id }}</td>
            <td class="col-1" ><img src="/images/{{ $card->image }}" width="100px" class="img-fluid img-thumbnail" alt="{{ $card->name }}"></td>
            <td>



     <div>
          <a class="card_image" href="#" data-image="/images/{{ $card->image }}">{{ $card->name }}</td></a>
      </div>

  <p>In order to test screenshot preview roll over the <a href="http://www.cssglobe.com" class="screenshot" rel="/images/01-001.jpg">Css Globe</a> link.</p>
  <p>If you want to see screenshot with caption, roll over this <a href="http://www.cssglobe.com" class="screenshot" rel="/images/{{ $card->image }}" title="Web Standards Magazine">Css Globe</a> link.</p>



            <td class="text-center">
              <a class="btn btn-sm btn-outline-secondary" alt="Посмотреть" title="Посмотреть" href="{{ url('cards/' . $card->id) }}"><i class="fa fa-btn fa-eye"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('cards/' . $card->id . '/edit') }}"><i class="fa fa-btn fa-edit"></i></a>
              <a class="btn btn-sm btn-outline-secondary" alt="Удалить" title="Удалить" href="{{ url('cards/' . $card->id) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Действительно удалить?"><i class="fa fa-btn fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection
