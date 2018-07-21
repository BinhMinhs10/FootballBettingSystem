@extends('layouts.background')

@section('content')
	<h1>Profile</h1>
	<div class="row">
		<div class="col-md-4">Username</div>
		<div class="col-md-8">{{ $user->username }}</div><br/>
		<div class="col-md-4" style="text-align: left">Email</div>
		<div class="col-md-8">{{ $user->email }}</div>
		<div class="col-md-4">Amount</div>
		<div class="col-md-8">{{ $user->amount }}</div>
	</div>
	<hr/>
	<h1>History </h1>
	<table class="table table-bordered">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Tên 2 đội</th>
	      <th scope="col">Đội chọn</th>
	      <th scope="col">Tỉ lệ cược</th>
	      <th scope="col">Tiền đặt cọc</th>
	      <th scope="col">kết quả</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach( $user->matches as $match)
		  	<tr>
		  		<td>{{ $match->team->name }} - {{ $match->awayteam->name }}</td>
		  		@if( $match->pivot->choice == 0)
					<td>{{ $match->team->name }}</td>
					<td>{{ $match->win }}</td>
		  		@elseif( $match->pivot->choice == 1 )
					<td>Hòa</td>
					<td>{{ $match->tie }}</td>
		  		@else
					<td>{{ $match->awayteam->name }}</td>
					<td>{{ $match->lost }}</td>
		  		@endif
		  		<td>{{ $match->pivot->amountbet }}</td>
		  		<td>{{ $match->result }}</td>
		  	</tr>
	    @endforeach
	  </tbody>
	</table>
	<hr/>
	
@endsection