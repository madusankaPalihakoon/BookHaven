<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Uwu Library</title>
    <!-- <link rel="stylesheet" type="text/css" href="lib.css"> -->
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body class='login-bg'>
    <div class='donet-bg-overlay'></div>
    <div class='donet-content'>
        <header>
            <nav class='nav'>
                <div class='logo'>
                    <li><a>Uva Wellassa University <span>LIBRARY</span></a></li>
                </div>
                <div class='link'>
                    <li class='nav-link'><a href="../index.php">HOME</a></li>
                    <li class='nav-link'><a href="../pages/about.php">ABOUT US</a></li>
                    <li class='nav-link'><a href="../pages/service.php">SERVICE</a></li>
                    <li class='nav-link'><a href="../pages/gallery.php">GALLERY</a></li>
                    <li class='nav-action'><button class='action-btn'> <a class='action-btn-link' href="../pages/donation.php">DONATION NOW <i id='action-icon' class="bi bi-caret-right"></i></a> </button></li>
                </div>
            </nav>
        </header>

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


<script src="../assets/js/button.js"></script>
</body>
</html>
