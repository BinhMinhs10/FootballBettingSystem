@extends('admin.app')

@section('content')
    <h1>All user betting match</h1><br/>
    <hr/>
	<?php 
		if(isset($match->result)){
			$results = explode("-", $match->result );
			if($results[0] > $results[1]){
				$bet = 0;
				$percent = $match->win;
			}elseif($results[0] == $results[1]){
				$bet = 1;
				$percent = $match->tie;
			}else{
				$bet = 2;
				$percent = $match->lost;
			}
		}
	?>
    <div class="container">
	    <div class="row">
	    	<div class="col-md-4">
		    	<table class="table table-bordered table-hover table-striped">
		    		<thead class="thead-dark">
		    			<tr>
				    		<th>Tên</th>
				    		<th>Tiền cược</th>
				    		<th>Số tiền thắng</th>
				    	</tr>
		    		</thead>
			    	@foreach( $match->users as $userBet )
						<tr>
							<td>{{ $userBet->username }}</td>
							<td>{{ $userBet->pivot->amountbet }}</td>
							<td>
								@if( $match->result )
									@if( $bet == $userBet->pivot->choice )
										+ {{ $userBet->pivot->amountbet * $percent }}
									@else
										0
									@endif
								@endif 
							</td>
						</tr>
					@endforeach
			    </table>
		    </div>
		    <div class="col-md-8">
		    	<div class="text-center">
		    	
    				<table class="table tabl table-bordered table-hover table-striped">
						<tr class="thead-dark">
							<th colspan="2">Thời gian</th>
							
						</tr>
						<tr>
							<td>Thời gian dừng đặt cược</td>
							<td>{{ $match->timestop}}</td>
						</tr>
						<tr>
							<td>Thời gian bắt đầu</td>
							<td>{{ $match->timestart}}</td>
						</tr>
						<tr>
							<td>Thời gian hết trận</td>
							<td>{{ $match->timefinish}}</td>
						</tr>
					</table>

					<img src="{{ asset($match->team->flag) }}" alt="team image" style="width: 125px">
    				<img src="{{ asset($match->awayteam->flag) }}" alt="team image" style="width: 125px">
    				<br/><br/>
    				<h1>{{ $match->result }}</h1>
    				<h2>Tỉ lệ :  Thắng {{ $match->win}}- Hòa {{ $match->tie}} - Thua {{ $match->lost}}</h2>

		    	</div>
		    	
		    </div>
	    </div>
	</div>
@endsection

