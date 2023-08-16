<?php
require 'database.php';

session_start();
if (!empty($_SESSION['user'])) {
    header('Location: home.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$email = $_POST['email'];
    $phone_number = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "select * from users where email = '$email'";
    $result = $conn->query($sql);
    echo $email;
    if ($result) {
        echo "User exist";
        // header('Location: registeration.php');
    } else {
        $sql_query = "insert into users(name, email, phone_number, address, password)
            values('$name', '$email', '$phone_number', '$address', '$password')";

        if ($conn->query($sql_query) === TRUE) {
            echo "New record inserted";
            // header("Location: login.php");
        } else {
            echo "Error: " . $sql_query . "<br>" . $conn->error;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">

  <!-- Bootstrap 4 -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="{% static 'css/style.css' %}">
</head>
<body class="w3-blue">
    <div class="w3-container w3-margin-top">
        <div class="w3-center">
            <div class="w3-card-4 w3-light-gray w3-text-blue w3-padding">
                <h1>Registration Form</h1>
                <form method="post" action="">
                    <div class="w3-row w3-section">
                        <div class="w3-rest">
                            <label class="w3-col s3">Name:</label>
                            <div class="w3-col s9">
                                <input class="w3-input w3-border" name="name" type="text" placeholder="Name..." required>
                            </div>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-rest">
                            <label class="w3-col s3">Email:</label>
                            <div class="w3-col s9">
                                <input class="w3-input w3-border" name="email" type="email" placeholder="Email..." required>
                            </div>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-rest">
                            <label class="w3-col s3">Phone Number:</label>
                            <div class="w3-col s9">
                                <input class="w3-input w3-border" name="mobile" type="text" placeholder="Phone Number..." required>
                            </div>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-rest">
                            <label class="w3-col s3">Address</label>
                            <div class="w3-col s9">
                                <input class="w3-input w3-border" name="address" type="text" placeholder="Address...">
                            </div>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-rest">
                            <label class="w3-col s3">Password:</label>
                            <div class="w3-col s9">
                                <input class="w3-input w3-border" id="pass1" name="password" type="password" placeholder="Password..." required>
                            </div>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" type="submit">Register Now</button>
                    <p style="color: #000;">Already a User? <a href="login.php" style="color: #1876f2;">Log-in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
