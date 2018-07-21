@extends('layouts.background')

@section('content')
	<h1></h1><br/>
	<div class="row">
		@foreach($matches as $match)
			@if($match->status == 1)
				<div class="col-sm-4">
					<a href="detailMatch/{{ $match->id }}" style="text-decoration: none">
						<div class="card card-block">
							<div style="text-align: center;">
								<div class="card-title"><h3>{{ $match->team->name }}- {{ $match->awayteam->name}}</h3></div>
								<div class="card-img">
									<img  style="height: 80px; width: 100px" class="card-img-top img-thumbnail " src="{{ $match->team->flag }}" alt="Card images"> VS
									<img  style="height: 80px; width: 100px" class="card-img-top img-thumbnail " src="{{ $match->awayteam->flag }}" alt="Card images" >
								</div>
							</div>
							<p class="card-text"><h3>Thời hạn đấu giá:</h3> {{ $match->timestop }}</p>
							<p class="card-text"><h3>Kết quả: {{ $match->result }}</h3></p>
						</div>
					</a><br/><br/>
				</div>
			@endif
		@endforeach	
	</div>
@endsection

@section('sidebar')
	@parent
	<p>This is appended to the sidebar</p>

@endsection