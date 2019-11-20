<?php
  $fullname = $_POST['fullname'];
  $freeOrSale = $_POST['freeOrSale'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $myFile = $_POST['myFile'];
  $conditions = $_POST['conditions'];
  $categories = $_POST['categories'];
  $description = $_POST['description'];

  //Database Connection
  $conn = new mysqli('localhost', 'root', '', 'uploadform');
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("insert into registration(fullname, freeOrsale, title, price, myFile, conditions, categories, description)
      values(?, ?, ?, ?, ?, ?, ?, ?,)");
    $stmt->bind_param("sssdbsss", $fullname, $freeOrSale, $title, $price, $myFile, $conditions, $categories, $description);
    $stmt->execture();
    echo "Submitted Successfully...";
    $stmt->close();
    $conn->close();
  }
?>
