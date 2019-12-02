<?php
  include('includes/nav.inc1.php'); // include the nav bar
  include('includes/head.inc.php') // include the head
?>

<html>
  <head>
    <title>Product Description</title>
  </head>
  <body>
    <div id="bodyBlock">

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

    // $query = "SELECT movies.title, actors.last_name, actors.first_names FROM movies, actors, relationship WHERE relationship.movieid = movies.movieid AND relationship.actorid = actors.actorid order by title";
    $query = "SELECT fullName, email, freeOrSale, title, price, myFile, conditions, categories, detail FROM items";

    $result = $db->query($query);
    $numRecords = $result->num_rows;

    // echo '<tr><th>Movie Title:</th><th>Actors:</th><th></th></tr>';

    $last_title = '';
    for ($i=0; $i < $numRecords; $i++) {
      $record = $result->fetch_assoc();
        echo "\n".'<tr><td>';
        echo '<div class="productDescrip"></div>
                <h1>'.$record['title'].'</h1>
                <h2>Price: $'.$record['price'].'</h2>
                <img id="productPic" src="images/'.$record['myFile'].'" style="width:30%">
              <div id="productInfo">
        <h4>About this Item</h4>
        <p>'.$record['detail'].'</p>
        <p>Category/Categories: '.$record['categories'].'</p>
        <p>Condition: '.$record['conditions'].'</p>
            <a href="ContactInfo.html"><button type="button">Contact Seller</button></a>
    </div><br>';
    }

    $result->free();

    // Finally, let's close the database
    $db->close();
  }

?>
</table>

<?php include('includes/foot.inc.php');
  // footer info and closing tags
?>
