

@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger fade show">
			<strong>{{$error}}</strong>
			<button type="button"  class="close" data-dismiss="alert">&times;</button>
		</div>
	@endforeach
@endif


@if(session('fail'))
	<div class="alert alert-danger fade show">
		<strong>{{ session('fail') }}</strong>
		<button type="button"  class="close" data-dismiss="alert">&times;</button>
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success">
		{{session('success')}}
	</div>
@endif