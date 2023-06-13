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

  // Get form data
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $address = $_POST["address"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $country = $_POST["country"];
  $zipcode = $_POST["zipcode"];

  // Insert user into User table
  $sql = "INSERT INTO [User] (FirstName, LastName, Email, Password, Address, City, State, Country, ZipCode)
  VALUES ('$firstname', '$lastname', '$email', '$password', '$address', '$city', '$state', '$country', '$zipcode')";

