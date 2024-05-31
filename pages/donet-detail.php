<?php
session_start();
if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit();
}
include __DIR__ . '/../script/getBookDeail.php';



$id = htmlspecialchars_decode($_GET['id']);
$name = htmlspecialchars_decode($_GET['name']);

$data = getBookDetail($id, $name);
$data = json_decode($data, true);

if (!$data['status']) {
    $book = [];
}

$book = $data['data'];
?>
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

<body class='book-detils-bg'>
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


        <div class="book-detail">
            <div class="book-image">
                <img src="<?php echo htmlspecialchars($book['cover'], ENT_QUOTES, 'UTF-8') ?>" alt="Book Cover">
            </div>
            <div class="book-info">
                <h1><?php echo htmlspecialchars($book['name'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p><?php echo htmlspecialchars($book['author'], ENT_QUOTES, 'UTF-8') ?></p>
                <p class="price">$19.99</p>
                <p><strong>Description:</strong><?php echo htmlspecialchars($book['book_description'], ENT_QUOTES, 'UTF-8') ?></p>
                <div class="purchase-options">
                    <form action="./process.php" method="get">
                        <input type="hidden" name="action" value="process">
                        <input type="hidden" name="id" value="<?php echo $book['id']  ?>">
                        <input type="hidden" name="name" value="<?php echo $book['name']  ?>">
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                        <input type="hidden" name="isbn" value="<?php echo $book['ISBN']; ?>">
                        <label for="quantity">Quantity:</label>
                        <input class="quantity-input" type="number" id="quantity" name="quantity" value="1" min="1">
                        <input class="process-btn" type="submit" value="Process">
                    </form>
                </div>
                <ul class="additional-info">
                    <li><strong>Publisher:</strong><?php echo htmlspecialchars($book['publisher'], ENT_QUOTES, 'UTF-8') ?></li>
                    <li><strong>ISBN:</strong> <?php echo htmlspecialchars($book['ISBN'], ENT_QUOTES, 'UTF-8') ?></li>
                    <li><strong>Catogory:</strong> <?php echo htmlspecialchars($book['category'], ENT_QUOTES, 'UTF-8') ?></li>
                    <li><strong>Language:</strong> English</li>
                </ul>
            </div>
        </div>





        <script src="../assets/js/button.js"></script>
</body>

</html>