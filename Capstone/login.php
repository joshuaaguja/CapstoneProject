<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkreg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $enteredUsername = $_POST['username'];
  $enteredPassword = $_POST['password'];

  $sql = "SELECT * FROM accounts WHERE username = '$enteredUsername' AND password = '$enteredPassword'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "Registration successful!";
      header("Location: index.html");
      exit();
  } else {
      echo "Registration failed. Invalid username or password.";
  }
}

$conn->close();
?>