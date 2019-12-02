<?php
  include('includes/head.inc.php') // include the head
?>


<html>
  <head>
    <title>Homepage</title>
    <style>
      input[type=text] {
        width:100%;
      }
      input[type=submit]{
        background-color:#37404f;
        margin-top: 0px;
        margin-right: 50px;
        margin-bottom: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 30px;
        padding-left: 30px;
      }
    </style>
  </head>
  <body>

    <div id="bodyBlock">
      <div id="container">
      </div>
        <div id="header">
            <a href="index.php"><img src="resources/logo.png"></a>
            <a href="login.html"><button type="button">logout</button></a>
            <a href="uploadform.php"><button type="button">+ sell your stuff</button></a>
      </div>
      <div id="content">
        <div id="nav">
          <form class="form-inline" action="index.php" method="post">
            <input type="text" name="search" placeholder="Search..."/>
            <input type="submit" value="search"/>
          </form>
          <h3>Price</h3>
          <ul>
            <li><a href="navbarpages/free.php" class="selected">Free</a></li>
            <li><a href="navbarpages/sale.php">Sale</a></li>
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
        <?php
          // We'll need a database connection both for retrieving records and for
          // inserting them.  Let's get it up front and use it for both processes
          // to avoid opening the connection twice.  If we make a good connection,
          // we'll change the $dbOk flag.
          $dbOk = false;

          /* Create a new database connection object, passing in the host, username,
             password, and database to use. The "@" suppresses errors. */
          @ $db = new mysqli('localhost', 'root', 'rootroot', 'rpifreeforsale');

          if ($db->connect_error) {
            echo '<div class="messages">Could not connect to the database. Error: ';
            echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
          } else {
            $dbOk = true;
          }


          ?>

        <table id="itemListing">
        <?php
          if ($dbOk) {
            if (isset($_POST['search'])) {
              $search = $_POST['search'];
              $search = mysqli_real_escape_string($db, $search);
              $query = "SELECT fullName, email, freeOrSale, title, price, myFile, conditions, categories, detail
              FROM items
              WHERE fullName LIKE '%".$search."%'
              OR email LIKE '%".$search."%'
              OR freeOrSale LIKE '%".$search."%'
              OR title LIKE '%".$search."%'
              OR price LIKE '%".$search."%'
              OR myFile LIKE '%".$search."%'
              OR conditions LIKE '%".$search."%'
              OR categories LIKE '%".$search."%'";

              $result = $db->query($query);
              $numRecords = $result->num_rows;

              $j = 0;
              for ($i=0; $i < $numRecords; $i++) {
                $record = $result->fetch_assoc();
                if($j%3 == 0) {
                  echo "<tr>";
                }
                echo '<td><a href="productDescription.php"><img style="width:370px;"src="images/'.$record['myFile'].'"></a>
                <a href="productDescription.php"><figcaption>$'.$record['price'].'<br>'.$record['title'].'</figcaption></a>
                </td>';
                if($j%3 == 2) {
                  echo "</tr>";
                }
                $j++;
              }
            } else {
              $query = "SELECT fullName, email, freeOrSale, title, price, myFile, conditions, categories, detail FROM items";
              $result = $db->query($query);
              $numRecords = $result->num_rows;
              $j = 0;
              for ($i=0; $i < $numRecords; $i++) {
                $record = $result->fetch_assoc();
                if($j%3 == 0) {
                  echo "<tr>";
                }
                echo '<td><a href="productDescription.php"><img style="width:100%;"src="images/'.$record['myFile'].'"></a>
                <a href="productDescription.php"><figcaption>$'.$record['price'].'<br>'.$record['title'].'</figcaption></a>
                </td>';
                if($j%3 == 2) {
                  echo "</tr>";
                }
                $j++;
              }
            }
            $result->free();

            // Finally, let's close the database
            $db->close();
          }

        ?>

</table>

    </div>
  </body>
</html>

<?php include('includes/foot.inc.php');
  // footer info and closing tags
?>
