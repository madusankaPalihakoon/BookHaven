<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uwu Library</title>
    <link rel="stylesheet" type="text/css" href="lib.css">
</head>
<body>

    <div class="navigation">
        <nav>
            <h2 class="logo">Uva Wellassa University  <span>LIBRARY</span></h2>
            <ul>
			    <li> <a href="index.php">HOME</a></li>
                <li> <a href="about.php">ABOUT US</a></li>
                <li> <a href="service.php">SERVICE</a></li>
                <li> <a href="gallery.php">GALLERY</a></li>
                <li> <a href="donation.php">DONATION</a></li>
            </ul>
        </nav>   
    </div>			

	<div class="donationform">
		<br>
			<h2 class="donationfont"><center>Donation </center></h2>
			<form action="action/donation_action.php" method="post">

					<div class="donationformtyper">
						<p>Your Name</p>
						<input type="text" name="yourname" placeholder="Enter name Here">
					</div>

					<div class="donationformtyper">
						<p>E mail</p>
						<input type="text" name="email" placeholder="Enter E mail">
					</div>

					<div class="donationformtyper">
						<p>Phone Number</p>
						<input type="text" name="phonenumber" placeholder="Enter phone number">
					</div>

					<div class="donationformtyper">
						<p>Amount</p>
						<input type="text" name="amount" placeholder="Enter book amount">
					</div>

					<div class="donationformtyper">
						<p>Book Title</p>
						<input type="text" name="booktitle" placeholder="Enter book title">
					</div>

					<div class="donationformtyper">
						<p>ISBN number</p>
						<input type="text" name="isbnnumber" placeholder="ISBN number">
					</div>

						<input type="submit" name="" value="Donate" >
			</form>
	</div>




</body>
</html>