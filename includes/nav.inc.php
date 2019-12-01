<?php
  if (isset($_POST['cate'])) {
    $connection = new mysqli("localhost", "root", "rootroot", "rpifreeforsale");
    $cate = $_POST['cate'];
    echo "You have Selected: " .$cate;
    $sql = $connection->query("SELECT fullName, email, freeOrSale, title, price, myFile, conditions, categories, detail FROM items WHERE categories LIKE %$cate%");
    if ($sql > 0) {
      while ($data = $sql->fetch_array())
        echo $data['fullname'] . "<br>";
      } else
      echo "Your search query doesn't match any data!";
    }
?>
<!DOCTYPE html>
<body>
    <div id="container">
    </div>
      <div id="header">
          <a href="index.php"><img src="resources/logo.png"></a>
          <a href="login.html"><button type="button">logout</button></a>
          <a href="uploadform.php"><button type="button">+ sell your stuff</button></a>
    </div>
    <div id="content">
      <div id="nav">
        <h3>Price</h3>
        <ul>
          <li><a href="#" class="selected">Free</a></li>
          <li><a href="#">Sale</a></li>
        </ul>
        <h3>Categories</h3>
        <ul>
          <li>Beauty&Health</li>
          <li>Clothing&Shoes</li>
          <li>Electronics</li>
          <li>Furniture</li>
          <li>Games</li>
          <li>Kitchen</li>
          <li>Sports&Outdoors</li>
          <li>Textbooks</li>
          <li>Others</li>
        </ul>
      </div>
      </div>
