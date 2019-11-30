<?php 
  include('includes/nav.inc.php'); // include the nav bar
?>
<title>Homepage</title>   

<html>
  <head>
    <title>Homepage</title> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
    <script type="text/javascript" src="resources/jquery-1.4.3.min.js"></script>
    <link href="resources/termproj.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="bodyBlock">

      <h1>All Items</h1>

<?php
  // We'll need a database connection both for retrieving records and for 
  // inserting them.  Let's get it up front and use it for both processes
  // to avoid opening the connection twice.  If we make a good connection, 
  // we'll change the $dbOk flag.
  $dbOk = false;
  
  /* Create a new database connection object, passing in the host, username,
     password, and database to use. The "@" suppresses errors. */
  @ $db = new mysqli('localhost', 'root', 'root', 'rpifreeforsale');
  
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
      if ($i % 4 == 0) {
        echo "\n".'<tr id="movie-' . '"><td>';
      } else {
        echo "\n".'<tr class="odd" id="movie-' . '"><td>';
      }
      echo '<div class="row">';
        echo '<div class="column">
                <a href="productDescription.html"><img style="width:100%;"src="images/'.$record['myFile'].'"></a>
                <a href="productDescription.html"><figcaption>$'.$record['price'].'<br>'.$record['title'].'</figcaption></a>
            </div>';
        
        echo '</td><td>';
        echo '</td></tr>';
      // Uncomment the following three lines to see the underlying 
      // associative array for each record.
      /*echo '<tr><td colspan="3" style="white-space: pre;">';
      print_r($record);
      echo '</td></tr>';*/
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