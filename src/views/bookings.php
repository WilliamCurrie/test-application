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
		
		<div class="row">
		
			<div class="col-md-6">
				<h2 class="text-center">Customers</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Address</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($customers as $customer){ ?>
						<tr>
							<td><?php echo $customer['first_name']; ?></td>
							<td><?php echo $customer['second_name']; ?></td>
							<td><?php echo $customer['address']; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			
			<div class="col-md-6">
				<h2 class="text-center">Bookings</h2>
				<?php if(is_null($bookings)){ ?>
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">VOID</h5>
							<p class="card-text">There are no bookings for the customer <?php echo $our_customer['first_name'].' '.$our_customer['second_name']; ?></p>
						</div>
					</div>
				<?php }else{ ?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Reference</th>
								<th>Customer Name</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($bookings as $booking){ ?>
							<tr>
								<td><?php echo $booking['booking_reference']; ?></td>
								<td><?php echo $booking['customer_name']; ?></td>
								<td><?php echo $booking['booking_date']; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
			
		</div>
		
	</body>
</html>