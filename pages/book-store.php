<?php
session_start();
if(!isset($_SESSION['token'])){
    header('Location: login.php');
    exit();
}
include __DIR__ . '/../script/getBookStore.php';

$decoded_response = json_decode($response, true);

if(!$decoded_response['status']){
    $data = [];
}

$data = $decoded_response['data'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

    <div class="book-store">

    <?php
        foreach ($data as $book) {
            echo '<div class="book-store-bg">
                    <div class="book-details">
                        <div class="book-cover">
                            <img src="' . htmlspecialchars($book['cover'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($book['name'], ENT_QUOTES, 'UTF-8') . '">
                        </div>
                        <div class="book-info">
                            <div class="book-title">' . htmlspecialchars($book['name'], ENT_QUOTES, 'UTF-8') . '</div>
                            <div class="book-author"><strong>Author:</strong> ' . htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') . '</div>
                            <div class="book-publisher"><strong>Publisher:</strong> ' . htmlspecialchars($book['publisher'], ENT_QUOTES, 'UTF-8') . '</div>
                            <div class="book-isbn"><strong>ISBN:</strong> ' . htmlspecialchars($book['ISBN'], ENT_QUOTES, 'UTF-8') . '</div>
                            <div class="book-description">
                                <strong>Description:</strong>
                                <p>' . htmlspecialchars($book['book_description'], ENT_QUOTES, 'UTF-8') . '</p>
                            </div>
                        </div>
                    </div>
                    <div class="donet-action">
                    <a class="donet-action-btn" href="donet-detail.php?id=' . htmlspecialchars($book['id'], ENT_QUOTES, 'UTF-8') . '&name=' . urlencode(htmlspecialchars($book['name'], ENT_QUOTES, 'UTF-8')) . '">Donet</a>
                    </div>
                </div>';
        }
    ?>
    


        <!-- <div class="book-details">
            <div class="book-cover">
                <img src="../assets/book-store/ans/a.jpg" alt="The Great Gatsby">
            </div>
            <div class="book-info">
                <div class="book-title">The Great Gatsby</div>
                <div class="book-author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                <div class="book-publisher"><strong>Publisher:</strong> Charles Scribner's Sons</div>
                <div class="book-isbn"><strong>ISBN:</strong> 978-0743273565</div>
                <div class="book-description">
                    <strong>Description:</strong>
                    <p>The Great Gatsby is a 1925 novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional towns of West Egg and East Egg on prosperous Long Island in the summer of 1922. The story primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession with the beautiful former debutante Daisy Buchanan.</p>
                </div>
            </div>
        </div> -->
</div>





<script src="../assets/js/button.js"></script>
</body>
</html>








