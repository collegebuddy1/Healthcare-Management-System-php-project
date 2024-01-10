<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Book an Appointment</title>

	<!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="/style/appointment/bootstrap.min.css" rel="stylesheet">
	<link href="/style/appointment/style.css" rel="stylesheet">
	<link href="/style/appointment/vendors.css" rel="stylesheet">
	<link href="/style/appointment/icon_fonts/css/all_icons_min.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="/style/appointment/date_picker.css" rel="stylesheet">

</head>

<body>

	<div id="page">
		<nav id="menu" class="main-menu">
		</nav>

	<main class="theia-exception">
		<div id="results">
			<div class="container">
				<div class="row">
				<ul>
				<a href="/home"><li>HOME</li></a>
				</ul>
					<div class="col-md-6">
						<h2 style="color:white;"><strong>Book an Appointment</strong></h2>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		</div>
		<!-- /filters -->
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-7">
				<?php while($row = mysqli_fetch_assoc($doctors)) { ?>
					<div class="strip_list wow fadeIn">
						<figure>
							<img src="http://via.placeholder.com/565x565.jpg" alt="">
						</figure>
						<small><?=$row['STAFF_ID']?></small>
						<h3>>Dr. <?=$row['FNAME']." ".$row['LNAME']?></h3>
						<p>NIT Calicut</p>
						
						<ul>
							<li><a href="#" onclick="selectDoc('<?=$row['STAFF_ID']?>','<?='Dr. '.$row['FNAME'].' '.$row['LNAME']?>');">Select</a></li>
						</ul>
					</div>
				<?php } ?>
				</div>

				<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						<form method="POST" action="">
							<div class="title">
							<h3>Book a Visit</h3>
							<small>Monday to Friday 09.00am-06.00pm</small>
							</div>
							<div class="row">
								<div class="form-group">
									<label for="doc_id" id="doc_id_lbl" class="form-control">Select a Doctor</label>
									<input class="form-control" style="display:none;" type="text" id="doc_id" name="doc_id" readonly required>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<input class="form-control" type="text" name="b_date" id="booking_date" data-lang="en" data-min-year="2017" data-max-year="2020" data-disabled-days="10/17/2017,11/18/2017" required>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input class="form-control" type="text" name="b_time" id="booking_time" value="9:00 am" required>
									</div>
								</div>
							</div>
							<hr>
							<div class="row">
								<?=$err_msg?>
							</div>
							<input class="btn_1 full-width" type="submit" value="Book Now"/>
						</form>
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="/scripts/jquery-3.5.1.min.js"></script>
	<script src="/scripts/common_scripts.min.js"></script>
	<script src="/scripts/functions.js"></script>
	<script src="/scripts/makeappointment.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<!-- <script src="http://maps.googleapis.com/maps/api/js"></script>	 -->
	<!-- <script src="/scripts/markerclusterer.js"></script>
    <script src="/scripts/map_listing.js"></script>
    <script src="/scripts/infobox.js"></script> -->

</body>
</html>
