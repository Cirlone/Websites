<?php
  session_start();
  $home_url = "file:///C:/Users/User/Desktop/HTML/CIRLA-ESTATE.html";
?>

<?php
  $servername = "localhost";
  $username = "yourusername";
  $password = "yourpassword";
  $dbname = "yourdatabase";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      $_SESSION["email"] = $email;
      header("Location: $home_url");
      exit();
    } else {
      echo "Invalid email or password";
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo "New user created successfully";
      $_SESSION['email'] = $email;
      header("Location: $home_url");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
?>