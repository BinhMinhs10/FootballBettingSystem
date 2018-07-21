@extends('admin.app')

@section('content')
    <h1>Manager team page</h1><br/>
    <div class="container">
    	<form method="post" enctype="multipart/form-data" action="
		@if(session('team'))
			{{ url('teams/save')}}
		@else
    		{{ url('teams/add') }}
    	@endif ">
    		@csrf
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name"><strong>Lá cờ</strong></label>
						<input type="file" name="file" class="form-control" >
					</div>
					@if( session('team'))
						<div>
							<img src="{{ session('team')->flag}}" alt="anh la co">
						</div>
						<input type="hidden" name='originFile' value="{{ session('team')->flag }}">
						<input type="hidden" name='id' value="{{ session('team')->id }}">
					@endif
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name"><strong>Tên đội</strong></label>
						<input type="text" name="name" class="form-control" placeholder="vd: SHB Đà nẵng"
						@if( session('team'))
							value="{{ session('team')->name }}"
						@endif
						>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="nation"><strong>Quốc gia</strong></label>
						<input type="text" name="nation" class="form-control" placeholder="vd: Việt Nam"
						@if( session('team'))
							value="{{ session('team')->nation }}"
						@endif
						>
					</div>
				</div>
			</div>
			
			<div class="row justify-content-center">
				@if(session('team'))
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
    		
    		<th></th>
    		<th>Tên đội</th>
    		<th>Quốc gia</th>
    		<th></th>
    		<th></th>
    	</tr>
    	@foreach($teams as $team)
    		<tr>
    			<td>
    				<img src="{{ $team->flag }}" alt="team image" style="width: 125px">
    				
    			</td>
    			<td>
    				{{ $team->name }}
    			</td>
    			<td>
    				{{ $team->nation }}
    			</td>
    			<td>
    				<a href="teams/edit/{{ $team->id }}"><i class="fa fa-edit" style="font-size: 30px; color: black;"></i></a>
    			</td>
    			<td>
    				<a href="teams/delete/{{ $team->id }}"><i class="fa fa-trash" style="font-size: 30px; color: red"></i></a>
    			</td>
    		</tr>
    	@endforeach
    	
    </table>
    {{ $teams->links() }}
@endsection

