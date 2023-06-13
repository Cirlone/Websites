<?php
session_start();
$home_url = "http://localhost/home.php";

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    // Success message
    echo "New user created successfully";
    // Set session variable and redirect to home page
    $_SESSION['email'] = $email;
    header("Location: $home_url");
    exit();
  } else {
    // Error message
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
      }

      h1 {
        text-align: center;
        margin-top: 50px;
      }

      form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }

      input[type="email"],
      input[type="password"],
      input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        border: none;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

      button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background-color: #333;
        color: #fff;
        border-radius: 5px;
        border: none;
        cursor: pointer;
      }

      button[type="submit"]:hover {
        background-color: #fff;
        color: #333;
        border: 1px solid #333;
      }
    </style>
  </head>
  <body>
    <h1>Signup</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
<button type="submit">Signup</button>
</form>

  </body>
</html>
