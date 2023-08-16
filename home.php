<?php
require 'database.php';

session_start();
$msg = null;
$name = null;
if (!empty($_SESSION['user'])) {
  $msg = "You're logged in..";
  $name = $_SESSION['user']['name'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">

	<!-- Bootstrap 4 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="w3-blue">
<div class="w3-container w3-center w3-margin-top">
    <div class="w3-card-4 w3-light-gray w3-padding">
        <h1><?php echo  $msg; ?></h1>
        <a href="login.php" class="w3-button w3-blue">Login</a>
        <a href="register.php" class="w3-button w3-blue">Register</a>
        <p><?php echo $name; ?></p>
        <?php if ($name) {
          echo '<a href="logout.php" class="w3-button w3-red">Logout</a>';
        }?>
    </div>
</div>
</body>
</html>