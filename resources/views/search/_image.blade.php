<div class="row">

	@foreach($cards as $card)
	<div class="col-sm-6 col-md-4 col-lg-3">
		<a href="/cards/{{ $card->id }}">
			<img src="{{ $card->imagelink() }}" class="img-fluid" alt="{{ $card->name }}">
		</a>
		<p class="text-center">{{ $card->edition->name }}</p>
	</div>
	@endforeach

</div>