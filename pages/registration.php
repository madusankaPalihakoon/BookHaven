<?php
    session_start();
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
	foreach ($errors as $key => $value) {
		echo' '. $key .' '. $value .' ';
	}
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Uwu Library</title>
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

        <div class="reg">
			<h2 class="regfont">Registration</h2>

			<form action="../Controller/register.controller.php" method="post" enctype="multipart/form-data" id="registerForm">
				<input type="hidden" name="action" value="signup">
					<div class="Registerformtyper">
						<p class="reg-details">Full Name</p>
						<input class="reg_input" type="text" name="fname" placeholder="Enter Full Name Here">
					</div>

					<div class="Registerformtyper">
						<p class="reg-details">User Name</p>
						<input class="reg_input" type="text" name="username" placeholder="Enter User Name">
					</div>

					<div class="Registerformtyper">
						<p class="reg-details">E mail</p>
						<input class="reg_input" type="text" name="email" placeholder="Enter Email">
					</div>

					<div class="Registerformtyper">
						<p class="reg-details">Address</p>
						<input class="reg_input" type="text" name="address" placeholder="Enter Your Address">
					</div>

					<div class="Registerformtyper">
						<p class="reg-details">Phone Number</p>
						<input class="reg_input" type="number" name="pNumber" placeholder="Enter Phone Number">
					</div>

					<div class="Registerformtyper">
						<p class="reg-details">Password</p>
						<input class="reg_input" type="password" name="password" placeholder="Enter Password">
					</div>

					<div class="Registerformtyper">
						<p class="reg-details">Confirm  Password</p>
						<input class="reg_input" type="password" name="confirmPassword" placeholder="Confirm Password">
					</div>

					<div class="Registerformtyper">
						<ul>I agree <a href="../pages/term.php">Tearm Conditions <input type="checkbox" name="term" id=""> </a></ul>
					</div>

					<div id="error" class="error" style="color:red"></div>

					<input class="reg_input" type="submit" name="" value="Register" >
			</form>
	</div>

<script src="../AJAX/register.js"></script>
<script src="../assets/js/button.js"></script>
</body>
</html>
