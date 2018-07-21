<html>
<head>
	<meta charset="UTF-8">
	<title>Test thu</title>
</head>
<body>

	<?php foreach ($task as $value): ?>
		<a href="tasks/{{ $value->id }}"><?= $value->body ?></a><br/>	
	<?php endforeach ?>
</body>
</html>