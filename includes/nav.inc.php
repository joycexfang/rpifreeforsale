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
        <form method="POST" action="index.php">
          <select name"cate">
            <option value="All">All</option>
            <option value="Beauty&Health">Beauty&Health</option>
            <option value="Clothing&Shoes">Clothing&Shoes</option>
            <option value="Electronics">Electronics</option>
            <option value="Furniture">Furniture</option>
            <option value="Games">Games</option>
            <option value="Kitchen">Kitchen</option>
            <option value="Sports&Outdoors">Sports&Outdoors</option>
            <option value="Textbooks">Textbooks</option>
            <option value="Others">Others</option>
            <option value="Textbooks">Textbooks</option>
          </select>
          <input type="submit" name="submit" value="Search">
        </form>
      </div>
      </div>
