<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/favicon.ico">

  <title>Reborn Cards Database</title>

  <!-- tinyMCE Scripts -->
  @yield('tinyMCE')

  <!-- Custom styles for this template -->
  <link href="/css/app.min.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Reborn Cards Database</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form action="{{ url('search') }}" method="GET" class="form-inline my-2 my-md-0">
          <div class="input-group">
            <input id="search" name="name" class="form-control" type="text" placeholder="Поиск карт" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-btn fa-search"></i></button>
            </div>
          </div>
        </form>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Колоды</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Карты</a>
          </li>
        </ul>

        <!-- Правый навбар НАЧАЛО -->
        <ul class="navbar-nav">
          @auth
          @if ( auth()->user()->hasRoles('admin') )
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Редактировать
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/cards">Карты</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/editions">Выпуски</a>
              <a class="dropdown-item" href="/rarities">Редкости</a>
              <a class="dropdown-item" href="/liquids">Жидкости</a>
              <a class="dropdown-item" href="/elements">Стихии</a>
              <a class="dropdown-item" href="/supertypes">Супертипы</a>
              <a class="dropdown-item" href="/types">Типы</a>
              <a class="dropdown-item" href="/subtypes">Подтипы</a>
              <a class="dropdown-item" href="/artists">Художники</a>
            </div>
          </li>
          @endif
          @endauth

          @if (Route::has('login'))
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="/home">Мои колоды</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('/logout') }}">Выйти</a>
            </div>
          </li>
          @else
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Вход</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Регистрация</a></li>
          @endauth
          @endif
        </ul>
        <!-- Правый навбар КОНЕЦ -->

      </div>
    </div>
  </nav>

  <div class="container">
    <main role="main">

      @include('layouts.messages')
      @yield('content')
    </main>
  </div>

  <!-- webpack -->
  <script src="/js/app.min.js"></script>

</body>
</html>
