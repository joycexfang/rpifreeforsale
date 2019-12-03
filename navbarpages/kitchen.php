<?php
  include('../includes/nav.inc.php'); // include the nav bar
  include('../includes/head.inc.php'); // include the head
  include('../includes/dbconnect.inc.php') // include the head
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript" src="../resources/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../resources/JavaScript/uploadpage.js"></script>
    <link href="../resources/termproj.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="bodyBlock">

<html>
  <head>
    <title>Free Items</title>
    <style>
      input[type=text] {
        width:100%;
      }
      input[type=submit]{
        background-color:#37404f;
      }
    </style>
  </head>
  <body>

    <div id="bodyBlock">

          <table id="itemListing">
          <?php
            if ($dbOk) {
              $query = "SELECT fullName, email, freeOrSale, title, price, myFile, conditions, categories, detail FROM items WHERE categories LIKE 'Kitchen'";
              $result = $db->query($query);
              $numRecords = $result->num_rows;
              $j = 0;
              for ($i=0; $i < $numRecords; $i++) {
                $record = $result->fetch_assoc();
                if($j%3 == 0) {
                  echo "<tr>";
                }
                echo '<td><a href="../productDescription.php"><img style="width:370px;"src="../images/'.$record['myFile'].'"></a>
                <a href="../productDescription.php"><figcaption>$'.$record['price'].'<br>'.$record['title'].'</figcaption></a>
                </td>';
                if($j%3 == 2) {
                  echo "</tr>";
                }
                $j++;
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

<?php include('../includes/foot.inc.php');
  // footer info and closing tags
?>
