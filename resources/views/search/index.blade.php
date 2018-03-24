@extends('layouts.main')

@section('content')

<div class="container">


  @include('layouts.errors')

  <!-- Расширенный поиск НАЧАЛО -->
  <div class="row border border-secondary rounded">
    <div class="col-md-12 ">

      <div class="row">
        <div class="col-md-12 text-center">
          <h5 id="extended-search-header">Расширенный поиск</h4>
        </div>
      </div>

      <div class="row" id="extended-search">
        <div class="col-md-12">

          <form action="{{ url('search') }}" method="GET">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="search" value="{{ old('name') }}">
                @if ($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                @endif
              </div>

              <div class="form-group col-md-6">
                <label for="edition_id">Выпуск</label>
                <select name="edition_id" class="form-control {{ $errors->has('edition_id') ? ' is-invalid' : '' }}" id="edition_id">
                  <option selected></option>
                  @foreach($editions as $edition)
                  <option value="{{ $edition->id }}" @if( $edition->id == old('edition_id') ) selected="selected" @endif>{{ $edition->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('edition_id'))
                <div class="invalid-feedback">{{ $errors->first('edition_id') }}</div>
                @endif
              </div>
            </div>

            <div class="form-row justify-content-center">
              <div class="form-group text-center">
                <button type="submit" class="btn btn-outline-secondary">
                  <i class="fa fa-btn fa-search"></i> Искать
                </button>

                <button class="btn btn-default" type="button" onclick="clearForm(this.form);"><span class="glyphicon glyphicon-refresh"></span> Очистить</button>
</div><button class="btn btn-default" type="button" onclick="clearForm(this.form);"><span class="glyphicon glyphicon-refresh"></span> Очистить</button>
</div>
              </div>
            </div>

          </form>

        </div>
      </div>

    </div>
  </div>
  <!-- Расширенный поиск КОНЕЦ -->




<div class="row justify-content-center">
  <div class="col-12 justify-content-center">

    <h3 class="text-center mt-3">Результаты поиска</h3>
    <hr>
    @if(! isset($cards) )      
      <p>Ничего не найдено.</p>
    @else
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Номер</th>
            <th>Название</th>
            <th>Типы</th>
            <th>Стоимость</th>
            <th>Редкость</th>
            <th>Выпуск</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cards as $card)
          <tr>
            <td>{{ $card->number }}</td>
            <td>
              <a href="/cards/{{ $card->id }}" data-toggle="card-popover"
                data-content="<img src='/images/{{ $card->image }}' class='img-fluid' alt='{{ $card->name }}'>"
                >{{ $card->name }}</a>
              </td>
              <td>{{ $card->fulltype() }}</td>
              <td>{{ $card->cost }}</td>
              <td>{{ $card->rarity->name }}</td>
              <td>{{ $card->edition->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif

    </div>
  </div>
</div>

@endsection
