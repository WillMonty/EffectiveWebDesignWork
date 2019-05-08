<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Black Panda Art Gallery | Gallery</title>
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/generalStyle.css" rel="stylesheet" type="text/css">
		<link href="css/galleryStyle.css" rel="stylesheet" type="text/css">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="js/galleryLogic.js"></script>
	</head>
	<body class="text-center">
		<div class="page-container d-flex w-100 p-3 mx-auto flex-column">
			<header class="masthead mb-auto">
				<div class="inner">
					<a href="index.html"><img class="brand" src="media/logo.png"/></a>
					<nav class="nav nav-masthead justify-content-center">
						<a class="nav-link" href="event.html">Event</a>
						<a class="nav-link active" href="gallery.php">Gallery</a>
					</nav>
				</div>
			</header>
			<div class="mainIMGArea">
				<h1 id="mainTitle">Splash</h1>
				<img id="mainArt" src="media/gallery/splash.jpg">
			</div>
			<div class="artGrid mb-auto">
				<div class="row">
					<div title="Splash" class="unit">
						<img class="art" src="media/gallery/splash.jpg">
					</div>
					<div title="Cheeky Cow" class="unit">
						<img class="art" src="media/gallery/cheekycow.jpg">
					</div>
					<div title="The Acrobat Schulz" class="unit">
						<img class="art" src="media/gallery/acrobatschulz.jpg">
					</div>
					<div title="Cracked Face" class="unit">
						<img class="art" src="media/gallery/crackedface.jpg">
					</div>
					<div title="Overgrown" class="unit">
						<img class="art" src="media/gallery/overgrown.jpg">
					</div>
				</div>
				<div class="row">
					<div title="The Church" class="unit">
						<img class="art" src="media/gallery/thechurch.JPG">
					</div>
					<div title="Cat" class="unit">
						<img class="art" src="media/gallery/cat.jpg">
					</div>
					<div title="Hillsides" class="unit">
						<img class="art" src="media/gallery/hillsides.jpg">
					</div>
					<div title="Washout" class="unit">
						<img class="art" src="media/gallery/washout.jpg">
					</div>
					<div title="Grounded" class="unit">
						<img class="art" src="media/gallery/grounded.jpg">
					</div>
				</div>
				<div class="row">
					<div title="Flowers and Hat" class="unit">
						<img class="art" src="media/gallery/flowersandhat.jpg">
					</div>
					<div title="Tower of David III" class="unit">
						<img class="art" src="media/gallery/towerofdavidiii.jpg">
					</div>
					<div title="The Light of Magic" class="unit">
						<img class="art" src="media/gallery/thelightofmagic.jpg">
					</div>
					<div title="Guacamayas" class="unit">
						<img class="art" src="media/gallery/guacamayas.jpg">
					</div>
					<div title="City" class="unit">
						<img class="art" src="media/gallery/city.png">
					</div>
				</div>
			</div>
			<div class="mb-auto">
				<?php
				if(empty($_POST)){
				?>
				<h3>Get Pricing for Selected Art</h3>
				<form action="gallery.php" method="post">
					<div class="form-group">
						<label for="interestInput">Interested In</label>
						<input name="interest" type="text" class="form-control" id="interestI" value="Splash" readonly>
					</div>
					<div class="form-group">
						<label for="emailInput">Email Address</label>
						<input id="emailI" name="email" type="email" class="form-control" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="nameInput">Name</label>
						<input id="nameI" name="name" type="text" class="form-control" placeholder="Name">
					</div>
					<button type="submit" id="submit" class="btn btn-secondary mb-3">Contact Us</button>
				</form>
				<?php
				}
				else{
					//Submission
					$host = "localhost";
					$user = "root";
					$passwd = "";
					$dbname = "blackpanda";

					$cxn = mysqli_connect($host,$user,$passwd,$dbname)
						or die("Couldn't connect to server");

					if (!$cxn) {
						echo "<h1>Could not connect to database.</h1>";
						die("Connection failed: " . mysqli_connect_error());
					}

					$today = date("Y-m-d");
					$email = $_POST["email"];
					$interest = $_POST["interest"];
					$name = $_POST["name"];

					$sql = "INSERT INTO interestedusers (dateCreated, email, interest, name) VALUES
              		('$today','$email','$interest','$name')";

					mysqli_query($cxn,$sql);


					echo "<h3>Thanks! We'll be in touch!</h3>";
				}
				?>
			</div>
		</div>
	</body>
</html>