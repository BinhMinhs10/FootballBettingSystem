<html>
<head>
	<meta charset="UTF-8">
	<title>Upload anh</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="content-form">
		{{--Hien thi thong bao xay ra loi--}}
		@if($errors->any())
			<ul class="error-form">
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		<div style="width:350px; margin: auto;">
			<form action="upload-file" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="file" name="file" class="form-control">
				<button type='submit'>Tai anh</button>
			</form>
		</div>
	</div>	
</body>
</html>
