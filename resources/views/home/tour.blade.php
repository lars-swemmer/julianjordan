@if($response) {
	<div id="tour">
		<div class="container">
			<div>
				@foreach($response as $event)
				<div class="row">
					<div class="col-xs-3 col-sm-2 col-md-offset-2 col-md-1 text-center date">
						<p>{{ Carbon\Carbon::parse($event['start'])->format('D') }}</p>
						<p>{{ Carbon\Carbon::parse($event['start'])->format('d') }}</p>
						<p>{{ Carbon\Carbon::parse($event['start'])->format('M') }}</p>
					</div>

					<div class="col-xs-5 col-sm-5 col-md-5 info">
						<h4>
							{{ $event['title'] }}
						</h4>
						<p>
							@if(!empty($event['location']['countryIso3166']))
								<img src="https://artwinlive.com/media/countries/{{ strtolower($event['location']['countryIso3166']['alpha2']) }}.png">
							@else
								<i class="fa fa-question-circle text-muted" aria-hidden="true"></i>
							@endif
							{{ $event['location']['city'] }}, {{ $event['location']['country'] }}
						</p>
					</div>

					<div class="col-xs-2 col-sm-5 col-md-2">
						@if($event['ticketLink'] == true)
							<a href="{{ $event['ticketLink'] }}" style="margin-right: 5px;" class="btn btn-default" target="_blank" role="button">Tickets</a>
						@else
							<button style="margin-right: 5px;" disabled class="btn btn-default" href="#" role="button">Tickets</button>
						@endif

						@if($event['website'] == true)
							<a href="{{ $event['website'] }}" style="margin-right: 5px;" class="btn btn-default" target="_blank" role="button">Website</a>
						@else
							<button disabled class="btn btn-default" href="#" role="button">Website</button>
						@endif
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endif