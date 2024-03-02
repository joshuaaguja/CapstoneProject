<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkreg";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $enteredUsername = $_POST['username'];
  $enteredPassword = $_POST['password'];
  $enteredlastName = $_POST['lastName'];
  $enteredfirstName = $_POST['firstName'];

  $sql1 = "INSERT INTO accounts (username, password) VALUES ('$enteredUsername', '$enteredPassword')";
  $sql2 = "INSERT INTO user_details (id, firstName, lastName) VALUES ((SELECT MAX(id) FROM accounts), '$enteredfirstName', '$enteredlastName')";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo "Records inserted successfully.<br>";

        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;

        header("Location: registration.html");
        exit();
    }
}

$conn->close();
?>