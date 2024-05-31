<?php
require_once __DIR__ . '/../script/getUserDetails.php';
$token = $_GET['token'];
$response = getUserDetails($token);
$decoded_response = json_decode($response, true);
if (!$decoded_response['status']) {
  exit();
}
$user = $decoded_response['data'];

$userId = $user['id'];
$userName = $user['name'];
$userEmail = $user['email'];
$bookName = $_GET['name'];
$bookId = $_GET['id'];
$isbn = $_GET['isbn'];
$booksQuantity = $_GET['quantity'];
$process = compact('userId', 'userName', 'userEmail', 'bookId', 'bookName', 'isbn', 'booksQuantity', 'token');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Process</title>
  <link rel="stylesheet" href="../style/style.css">
</head>

<body>
  <div class="process-container">
    <div class="process-content">
      <h2 class="process-heading">Complete your Donation</h2>
      <div class="process-form">
        <form action="../Controller/process.controller.php" method="post">
          <input type="hidden" name="action" value="process">
          <input type="hidden" name="token" value="<?php echo $process['token'] ?>">
          <input type="hidden" name="userId" value="<?php echo $process['userId'] ?>">
          <input type="hidden" name="bookId" value="<?php echo $process['bookId'] ?>">
          <div class="process-form-feild">
            <label for="name">Name</label>
            <input class="txt-feild" type="text" name="name" id="name" value="<?php echo $process['userName'] ?>">
          </div>
          <div class="process-form-feild">
            <label for="book-name">Book Name</label>
            <input class="txt-feild" type="text" name="book-name" id="book-name" value="<?php echo $process['bookName'] ?>">
          </div>
          <div class="process-form-feild">
            <label for="isbn">ISBN</label>
            <input class="txt-feild" type="text" name="isbn" id="isbn" value="<?php echo $process['isbn'] ?>">
          </div>
          <div class="process-form-feild">
            <label for="email">Email</label>
            <input class="txt-feild" type="email" name="email" id="email" value="<?php echo $process['userEmail'] ?>">
          </div>
          <div class="process-form-feild">
            <div class="form-inline-feild">
              <label for="quantity">Quantity :</label>
              <input class="quantity-txt" type="number" name="quantity" id="quantity" value="<?php echo $process['booksQuantity'] ?>">
            </div>
          </div>
          <div class="process-form-feild">
            <div class="form-inline-feild">
              <label for="price">Price</label>
              <input class="price-txt" type="text" name="price" id="price">
              <span>LKR</span>
            </div>

          </div>
          <div class="process-form-feild">
            <label for="method">Donation Method</label>
            <select class="option-feild" name="donet-method" id="method">
              <option value="">Select your donation method</option>
              <option value="hand over">Hand Over</option>
              <option value="delivery">Delivery (VIA Post)</option>
              <option value="cash deposit">Cash Deposit</option>
            </select>
          </div>
          <div class="process-form-feild">
            <input class="process-submit" type="submit" value="Place Donation">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>