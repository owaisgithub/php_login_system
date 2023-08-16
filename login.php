<?php
require 'database.php';

session_start();
if (!empty($_SESSION['user'])) {
    header('Location: home.php');
    exit();
}
$user_err = null;
$pwd_err = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST['email'];
    $password = $_POST['password'];
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "select * from users where email = '$email'";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        $hash = $row['password'];
        $verify = password_verify($password, $hash);
        if ($verify) {
            $user['name'] = $row['name'];
            $_SESSION['user'] = $user;
            header('Location: home.php');
            exit();
        } else {
            $pwd_err = "Password incorrect";
        }
    } else {
        $user_err = "User not found";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<meta charset="utf-8">

	<!-- Bootstrap 4 -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="w3-blue">
<div class="w3-container w3-center w3-margin-top">
    <div class="w3-card-4 w3-light-gray w3-padding">
        <!-- <a href="/" class="w3-button w3-blue w3-left">Go Home</a> -->
        <h1>Login Form</h1>
        <form method="post" action="">
             <div class="w3-row w3-section">
                 <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-user"></i></div>
                 <div class="w3-rest">
                     <input class="w3-input w3-border" name="email" type="text" placeholder="Email" required>
                 </div>
             </div>
             <div class="w3-row w3-section">
                 <div class="w3-col" style="width:50px"><i class="w3-xlarge fa fa-key"></i></div>
                   <div class="w3-rest">
                     <input class="w3-input w3-border" name="password" type="password" placeholder="Password" required>
                   </div>
             </div>
             <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" type="submit">Login</button>
             <p>Not a User? <a href="registeration.php" style="color: #1876f2;">Create an account</a></p>
        </form>
    </div>
</div>
</body>
</html>