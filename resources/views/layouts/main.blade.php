<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/favicon.ico">

  <title>Reborn Cards Database</title>

  <!-- Font Awesome Free CDN -->
  <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="/css/style.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Reborn Cards Database</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Поиск карт" aria-label="Search">
        </form>

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Колоды</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Карты</a>
          </li>
        </ul>

        <ul class="navbar-nav">
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

          @if (Route::has('login'))
          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">Home</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Вход</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
          </li>
          @endauth
        </div>
        @endif
      </ul>

      </div>
    </div>
  </nav>

  <div class="container">
    <main role="main">

<!--       <span class="d-block d-sm-none">xs</span>
<span class="d-none d-sm-block d-md-none">sm</span>
<span class="d-none d-md-block d-lg-none">md</span>
<span class="d-none d-lg-block d-xl-none">lg</span>
<span class="d-none d-xl-block">xl</span> -->
      
      @include('layouts.messages')
      @yield('content')
    </main>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom js -->
    <!-- <script src="/js/app.js"></script> -->
    <script src="/js/delete.js"></script>
    
  </body>
  </html>
