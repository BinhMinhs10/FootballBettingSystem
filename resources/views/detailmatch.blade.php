
@extends('layouts.background')

@section('content')

	<br/><h1>Chi tiết trận đấu</h1>
	<div style="text-align: center">
		<div class="row">
			<div class="col-md-6">
				<div id='head1'>{{ $match->team->name }}</div>
				<img src="{{ asset($match->team->flag)}}" alt="">
			</div>
			<div class="col-md-6">
				<div id='head1'>{{ $match->awayteam->name }}</div>
				<img src="{{ asset($match->awayteam->flag)}}" alt="">
			</div>
		</div><br/><br/>
		<div class="betting">
			<form action="{{ route('betting') }}" method="post">
				@csrf
				<input type="hidden" name="match_id" value="{{ $match->id }}">
				<input type="hidden" name="user_id" value="{{ Auth::id() }}">
				<div class="row">
					<div class="col-md-4">
						<div class="custom-control custom-radio custom-control-inline">
					    	<input type="radio" class="custom-control-input" id="customRadio" name="bet" value="0">
					    	<label class="custom-control-label" for="customRadio"><b>{{ $match->team->name }} Thắng</b></label>
						</div>
						<div>
							<b>Tỉ lệ: {{ $match->win }}</b>
						</div>
					</div>
					<div class="col-md-4">
						<div class="custom-control custom-radio custom-control-inline">
					    	<input type="radio" class="custom-control-input" id="customRadio2" name="bet" value="1">
					    	<label class="custom-control-label" for="customRadio2"><b>Hòa</b></label>
						</div>
						<div>
							<b>Tỉ lệ: {{ $match->tie }}</b>
						</div>
					</div>
					<div class="col-md-4">
						<div class="custom-control custom-radio custom-control-inline">
					    	<input type="radio" class="custom-control-input" id="customRadio3" name="bet" value="2">
					    	<label class="custom-control-label" for="customRadio3"><b>{{ $match->awayteam->name }} Thắng</b></label>
						</div>
						<div>
							<b>Tỉ lệ: {{ $match->lost }}</b>
						</div>
					</div>
				</div>
				<br/>
				<!-- ==================================================================== -->
				<!-- ================================================================================ -->
				<div class="justify-content-center">
					<h1><strong>Số tiền đặt cược</strong></h1>
					<input id="rcorners2" type="text" name="amountbet" size="45" >APC
				</div>
				<!-- =========================================================================== -->
				<!-- =========================================================================== -->
				<br/>
				<table class="table tabl table-bordered table-hover table-striped">
					<tr class="thead-dark">
						<th colspan="2" style="text-align: center;">Thời gian</th>
						
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

				<input type="submit" class="btn btn-outline-danger" value="Đặt cược" 
				@if( $match->result || ( $match->timestop < date("Y-m-d h:i:sa")) )
					disabled
				@endif
				></input>
			</form> 
		</div>
	</div>
	<br/>
	<div style="text-align: center">
		<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="10"></div>
	</div>
	
	
@endsection
<style>
	#head1{
		font-size: 50px;
	}
	b{
		font-size: 20px;
	}
	#rcorners2 {
	    border-radius: 15px 50px 30px;
	    background: #73AD21;
	    padding: 20px; 
	    width: 400px;
	    height: 50px; 
	}
</style>