@extends('admin.app')

@section('content')
    <h1>Admin page</h1><br/>
    <h1 id="demo"></h1>
    <div class="container">
    	<form method="post" enctype="multipart/form-data" action="
		@if(session('match'))
			{{ url('matches/save') }}
		@else
    		{{ url('matches/add') }}
    	@endif ">
    		@csrf
			<div class="row">
				@if(session('match'))
					<input type="hidden" name="id" value="{{ session('match')->id }}">
				@endif
				<div class="col-sm-6">
					<div class="form-group">
						<label for="awayteam"><strong>Đội chơi trên sân khách</strong></label>
						<select  class="form-control" name="awayteam" id="awayteam" >
							@foreach ($teams as $team)
								
								<option value="{{$team->id}}"
								@if( session('match') ) 
									@if( session('match')->awayteam_id == $team->id )
										selected
									@endif
								@endif
								> {{ $team->name}} </option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="team"><strong>Đội chơi trên sân nhà</strong></label>
						<select  class="form-control" name="team" id="team" >
							@foreach ($teams as $team)
								<option value="{{$team->id}}"
								@if( session('match') ) 
									@if( session('match')->team_id == $team->id )
										selected
									@endif
								@endif
								> {{ $team->name}} </option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="tie"><strong>Tỉ lệ cửa hòa</strong></label>
						<input type="text" name="tie" class="form-control" placeholder="vd: 1.5" 
						@if( session('match') ) 
							value="{{session('match')->tie}}"
						@endif 
						>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="win"><strong>Tỉ lệ cửa thắng</strong></label>
						<input type="text" name="win" class="form-control" placeholder="vd: 1.5"
						@if( session('match') ) 
							value="{{session('match')->win}}"
						@endif
						>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="lost"><strong>Tỉ lệ cửa thua</strong></label>
						<input type="text" name="lost" class="form-control" placeholder="vd: 1.5"
						@if( session('match') ) 
							value="{{session('match')->lost}}"
						@endif
						>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="timestop"><strong>Thời gian dừng đặt cược</strong></label>
						<input type="text" name="timestop" class="form-control" placeholder="vd: 2018-11-06 12:32:00"
						@if( session('match') ) 
							value="{{session('match')->timestop}}"
						@endif
						>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="timestart"><strong>Thời gian bắt đầu trận</strong></label>
						<input type="text" name="timestart" class="form-control" placeholder="vd: 2018-11-06 12:32:00"
						@if( session('match') ) 
							value="{{session('match')->timestart}}"
						@endif
						>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="timefinish"><strong>Thời gian kết thúc trận</strong></label>
						<input type="text" name="timefinish" class="form-control" placeholder="vd: 2018-11-06 12:32:00"
						@if( session('match') ) 
							value="{{session('match')->timefinish}}"
						@endif
						>
					</div>
				</div>
				
			</div>
			
			<div class="row justify-content-center">
				@if(session('match'))
					<button type="submit" class="btn btn-success" style="font-size: 35px;"><i class="fa fa fa-save"></i>&nbsp; lưu </button>
				@else
					<button type="submit" class="btn btn-success" style="font-size: 35px;"><i class="fa fa-plus"></i>&nbsp; Thêm mới </button>
				@endif
				
				&nbsp; &nbsp; &nbsp;
				<button class="btn btn-danger" type="reset"><i class="fa fa-refresh" style="font-size: 35px;"></i></button>
			</div>
			
		</form>
    </div><br/>
    <table class="table table-bordered">
    	<tr>
    		
    		<th>Trận đấu</th>
    		<th>Thời gian bắt đầu trận</th>
    		<th>Tỉ lệ cửa</th>
    		<th>Kết quả</th>
    		<th></th>
    		<th></th>
    		<th></th>
    		<th></th>
    	</tr>
    	@foreach($matches as $match)
    		<tr>
    			<td>
    				<img src="{{ $match->team->flag }}" alt="team image" style="width: 125px">
    				<img src="{{ $match->awayteam->flag }}" alt="team image" style="width: 125px">
    				
    			</td>
    			<td>{{ $match->timestart}}</td>
    			<td>Hòa {{ $match->tie}} -
    			Thắng {{ $match->win}} -
    			Thua {{ $match->lost}}</td>
    			<td>{{ $match->result}}</td>
    			<td>
    				<a href="matches/view/{{ $match->id }}"><i class="fa fa-eye" style="font-size: 30px;"></i></a>
    			</td>
    			<td>
    				@if( $match->status == 0)
    					<a href="matches/edit/{{ $match->id }}"><i class="fa fa-edit" style="font-size: 30px; color: black;"></i></a>
    				@endif
    			</td>
    			<td>
    				@if( count($match->users) == 0 )
    				<a href="matches/delete/{{ $match->id }}"><i class="fa fa-trash" style="font-size: 30px; color: red"></i></a>
    				@endif
    			</td>
    			<td>
    				@if( $match->status == 0)
						<a href="matches/public/{{ $match->id }}"><i class="fa fa-share-square-o" style="font-size: 30px; color: green"></i></a>
    				@endif
    				
    			</td>
    			<td>
    				@if( ! $match->result )
    					<i class="fa fa-lightbulb-o" data-toggle="modal" data-target="#result{{ $match->id }}" style="font-size: 30px;"></i>
    				@endif
    			</td>
    			


    			<div id="result{{ $match->id }}" class="modal fade">
			      <div class="modal-dialog">
			          <div class="modal-content">
			              <div class="modal-header">
			                  <h4 class="modal-title text-xs-center"><b>Form add result</b></h4>
			              </div>
			              <div class="modal-body">
			                  <form role="form"  action="{{ route('addresult') }}" method="post">
			                      @csrf
			                      <input type="hidden" name="id" value="{{ $match->id }}">
			                      <div class="form-group">
			                          <label class="control-label">kết quả</label>
			                          <div>
			                              <input type="text" class="form-control input-lg" name="result">
			                          </div>
			                      </div>
			                      <div class="form-group">
			                          <div>
			                              <button type="submit" class="btn btn-info btn-block">Thêm kết quả</button>
			                          </div>
			                      </div>
			                  </form>
			              </div>
			              
			          </div><!-- /.modal-content -->
			      </div><!-- /.modal-dialog -->
			  	</div><!-- /.modal -->
  


    		</tr>
    	@endforeach
    	
    </table>
    {{ $matches->links() }}
@endsection


