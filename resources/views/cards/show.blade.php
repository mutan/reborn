@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 justify-content-center">

      <a class="btn btn-sm btn-outline-secondary" href="{{ url('cards')}}" role="button"><i class="fa fa-btn fa-arrow-left"></i> Список карт</a>

      <a class="btn btn-sm btn-outline-secondary" alt="Редактировать" title="Редактировать" href="{{ url('cards/' . $card->id . '/edit') }}" role="button"><i class="fa fa-btn fa-edit"></i> Редактировать</a>

      <h3 class="text-center mt-3">Карта: {{ $card->name }}</h3>

      @include('layouts.errors')

      <div class="row">

        <div class="col-4">{{ $card->image }}
          <img src="{{ $card->image }}" class="img-fluid" alt="Responsive image">
        </div>

        <div class="col-4">
          <p><b>Название:</b> {{ $card->name }}</p>
          <p><b>Выпуск:</b> {{ $card->edition->name }}</p>
          <p><b>Редкость:</b> {{ $card->rarity->name }}</p>
          <p><b>Жидкости:</b>
            @foreach ($card->liquids as $liquid) 
              {{ $liquid->name }}
            @endforeach
          </p>
          <p><b>Стихии:</b>
            @foreach ($card->elements as $element) 
              {{ $element->name }}
            @endforeach
          </p>
          <p><b>Супертипы:</b>
            @foreach ($card->supertypes as $supertype) 
              {{ $supertype->name }}
            @endforeach
          </p>
          <p><b>Типы:</b>
            @foreach ($card->types as $type) 
              {{ $type->name }}
            @endforeach
          </p>
          <p><b>Подипы:</b>
            @foreach ($card->subtypes as $subtype) 
              {{ $subtype->name }}
            @endforeach
          </p>
          <p><b>Художники:</b>
            @foreach ($card->artists as $artist) 
              {{ $artist->name }}
            @endforeach
          </p>
          <p><b>Стоимость:</b> {{ $card->cost }}</p>
        </div>

        <div class="col-4">
          <p><b>Номер:</b> {{ $card->number }}</p>
          <p><b>Жизни:</b> {{ $card->lives }}</p>
          <p><b>Движение:</b> {{ $card->movement }}</p>
          <p><b>Слабый ОУ:</b> {{ $card->power_weak }}</p>
          <p><b>Средний ОУ:</b> {{ $card->power_medium }}</p>
          <p><b>Сильный ОУ:</b> {{ $card->power_strong }}</p>

          <p><b>Текст:</b> {{ $card->text }}</p>
          <p><b>Художественный текст:</b> {{ $card->flavor }}</p>
          <p><b>Эррата:</b> {{ $card->erratas }}</p>
          <p><b>Комментарии:</b> {{ $card->comments }}</p>
        </div>

      </div>




    </div>
  </div>
</div>

@endsection
