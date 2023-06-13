<?php
  // Create database connection
  $servername = "localhost";
  $username = "yourusername";
  $password = "yourpassword";
  $dbname = "realestate";
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to retrieve properties
  $sql = "SELECT * FROM Property";
  $result = $conn->query($sql);

  // Check if any properties were found
  if ($result->num_rows > 0) {
    // Loop through each row and display the property details
    while($row = $result->fetch_assoc()) {
      echo "<h3>" . $row["PropertyName"] . "</h3>";
      echo "<p>" . $row["Address"] . ", " . $row["City"] . ", " . $row["State"] . " " . $row["ZipCode"] . "</p>";
      echo "<p>" . $row["Description"] . "</p>";
      echo "<p>$" . $row["Price"] . "</p>";
      // Query to retrieve images for the property
      $image_sql = "SELECT * FROM PropertyImage WHERE PropertyID = " . $row["PropertyID"];
      $image_result = $conn->query($image_sql);
      // Display the first image for the property
      if ($image_result->num_rows > 0) {
        $image_row = $image_result->fetch_assoc();
        echo "<img src='" . $image_row["ImageURL"] . "' alt='" . $image_row["ImageName"] . "'>";
      }
      echo "<hr>";
    }
  } else {
    echo "No properties found";
  }

  // Close database connection
  $conn->close();
?>