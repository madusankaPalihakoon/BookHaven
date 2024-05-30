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



        <div class="login-box">
            <img src="../assets/login/user-512.png" class="user" alt=""><br>
    
                <h3 class="login-here">Login here</h3>
            <form action="../Controller/login.controller.php" method="post" id="loginForm">
                <input type="hidden" name="action" value="login">
                <div class="un">
                    <p class="username-password">USER NAME</p>
                    <input type="text" name="username" placeholder="Enter User Name Here" required>
                </div>

                <div class="pw">
                    <p class="username-password">PASSWORD</p>
                    <input type="password" name="password" placeholder="Enter Password" required>
                </div>
                <br>
                <input type="submit" value="Login">

                <div class="si">
                    <a href="../pages/registration.php">Don't have an account?</a>
                </div>
            </form>
        </div>



<script src="../AJAX/login.js"></script>
<script src="../assets/js/button.js"></script>
</body>
</html>
