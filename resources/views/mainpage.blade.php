@extends('layouts.main')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-xl-4">

			<h3>Поиск карт</h3>

			<form id="search-form" action="{{ url('search') }}" method="GET" class="form-inline my-2 my-md-0">
				<div class="input-group">
					<input id="search-field" name="name" class="form-control" type="text" placeholder="Начните вводить название" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit"><i class="fa fa-btn fa-search"></i></button>
					</div>
				</div>
			</form>

			<a id="advancedSearch" href="/search/advanced">Расширенный поиск</a>
			<hr>

			<h3>Последние турниры</h3>

			<p><a href="#">Стандартный турнир 28-01-2018</a></p>

			<table class="table table-sm">
				<thead>
					<tr>
						<th>Место</th>
						<th>Колода</th>
						<th>Игрок</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1 место</td>
						<td>ВВ Небеса</td>
						<td>Иванов Петя</td>
					</tr>
					<tr>
						<td>2 место</td>
						<td>ВВ Битки</td>
						<td>Петров Вася</td>
					</tr>
				</tbody>
			</table>

			<p><a href="#">Стандартный турнир 28-01-2018</a></p>

			<table class="table table-sm">
				<thead>
					<tr>
						<th>Место</th>
						<th>Колода</th>
						<th>Игрок</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1 место</td>
						<td>ВВ Небеса</td>
						<td>Иванов Петя</td>
					</tr>
					<tr>
						<td>2 место</td>
						<td>ВВ Битки</td>
						<td>Петров Вася</td>
					</tr>
				</tbody>
			</table>
			
		</div>

		<div class="col-xl-8">

			<h3>Метагейм: стандарт</h3>

			<div class="row">

				<div class="col-sm-4 col-md-3">
					<div class="card archetype mb-3">
						<img class="card-img-top" src="/images/01-001-crop.jpg">
						<div class="card-body p-2">
							<a href=""><h5 class="card-title mb-1">Архетип</h5></a>
							<img src="/icons/lives-16x16.png" class="img-fluid">
							<img src="/icons/counter-16x16.png" class="img-fluid">
							<p class="card-text">Ледяной титан<br>Водный Кракен<br>Черный волк</p>
						</div>
						<table class="table table-sm mb-0">
							<thead>
								<tr>
									<th class="text-center">Колод</th>
									<th class="text-center">% меты</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">15</td>
									<td class="text-center">8.52%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-sm-4 col-md-3">
					<div class="card archetype mb-3">
						<img class="card-img-top" src="/images/01-002-crop.jpg">
						<div class="card-body p-2">
							<a href=""><h5 class="card-title mb-1">Архетип</h5></a>
							<img src="/icons/lives-16x16.png" class="img-fluid">
							<img src="/icons/counter-16x16.png" class="img-fluid">
							<p class="card-text">Ледяной титан<br>Водный Кракен<br>Черный волк</p>
						</div>
						<table class="table table-sm mb-0">
							<thead>
								<tr>
									<th class="text-center">Колод</th>
									<th class="text-center">% меты</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">15</td>
									<td class="text-center">8.52%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-sm-4 col-md-3">
					<div class="card archetype mb-3">
						<img class="card-img-top" src="/images/01-003-crop.jpg">
						<div class="card-body p-2">
							<a href=""><h5 class="card-title mb-1">Архетип</h5></a>
							<img src="/icons/lives-16x16.png" class="img-fluid">
							<img src="/icons/counter-16x16.png" class="img-fluid">
							<p class="card-text">Ледяной титан<br>Водный Кракен<br>Черный волк</p>
						</div>
						<table class="table table-sm mb-0">
							<thead>
								<tr>
									<th class="text-center">Колод</th>
									<th class="text-center">% меты</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">15</td>
									<td class="text-center">8.52%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-sm-4 col-md-3">
					<div class="card archetype mb-3">
						<img class="card-img-top" src="/images/01-004-crop.jpg">
						<div class="card-body p-2">
							<a href=""><h5 class="card-title mb-1">Архетип</h5></a>
							<img src="/icons/lives-16x16.png" class="img-fluid">
							<img src="/icons/counter-16x16.png" class="img-fluid">
							<p class="card-text">Ледяной титан<br>Водный Кракен<br>Черный волк</p>
						</div>
						<table class="table table-sm mb-0">
							<thead>
								<tr>
									<th class="text-center">Колод</th>
									<th class="text-center">% меты</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">15</td>
									<td class="text-center">8.52%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-sm-4 col-md-3">
					<div class="card archetype mb-3">
						<img class="card-img-top" src="/images/01-005-crop.jpg">
						<div class="card-body p-2">
							<a href=""><h5 class="card-title mb-1">Архетип</h5></a>
							<img src="/icons/lives-16x16.png" class="img-fluid">
							<img src="/icons/counter-16x16.png" class="img-fluid">
							<p class="card-text">Ледяной титан<br>Водный Кракен<br>Черный волк</p>
						</div>
						<table class="table table-sm mb-0">
							<thead>
								<tr>
									<th class="text-center">Колод</th>
									<th class="text-center">% меты</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">15</td>
									<td class="text-center">8.52%</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
			
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<p>Карта дня</p>
			<p>Колоды</p>
		</div>
	</div>

</div>
@endsection
