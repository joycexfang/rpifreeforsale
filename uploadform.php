<?php

  if (isset($_POST['fullname'])) {
    $fullname = $_POST['fullname'];
  }
  if (isset($_POST['freeOrSale'])) {
    $freeOrSale = $_POST['freeOrSale'];
  }
  if (isset($_POST['title'])) {
    $title = $_POST['title'];
  }
  if (isset($_POST['price'])) {
    $price = $_POST['price'];
  }
  if (isset($_POST['myFile'])) {
    $myFile = $_POST['myFile'];
  }
  if (isset($_POST['conditions'])) {
    $conditions = $_POST['conditions'];
  }
  if (isset($_POST['categories'])) {
    $categories = $_POST['categories'];
  }
  if (isset($_POST['description'])) {
    $description = $_POST['description'];
  }

  //Database Connection
  $conn = new mysqli('localhost', 'root', 'rootroot', 'uploadform');
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

  }else{
    $stmt = $conn->prepare("insert into registration(fullname, freeOrsale, title, price, myFile, conditions, categories, description)
      values(?, ?, ?, ?, ?, ?, ?, ?, ?,)");
    $stmt->bind_param("sssibsss", $fullname, $freeOrSale, $title, $price, $myFile, $conditions, $categories, $description);
    $stmt->execture();
    echo "Submitted Successfully...";
    $stmt->close();
    $conn->close();
  }
?>
