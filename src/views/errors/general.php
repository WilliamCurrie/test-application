<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>My Simple  App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body class="container">
		
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<img class="card-img-top" src="/assets/img/404.jpg" alt="Error">
					<div class="card-body">
						<h5 class="card-title">Error</h5>
						<p class="card-text"><?php echo $message; ?></p>
						<a href="http://<?php echo $_SERVER['HTTP_HOST'];?>" class="btn btn-primary">Go to Home</a>
					</div>
				</div>
			</div>
		</div>
		
	</body>
</html>
