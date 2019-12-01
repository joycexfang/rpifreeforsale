<?php
  include('includes/head.inc.php') // include the head
  $link = mysql_connect("localhost", "root", "rootroot") or die("Error connecting to database: ".mysql_error());
  mysql_select_db($link, $rpifreeforesale) or die(mysql_error());

?>


<html>
  <head>
    <title>Homepage</title>
     </head>
  <body>
    <?php
        $query = $_GET['search'];
        $query = mysql_real_escape_string($query);
        $raw_results = mysql_query("SELECT * FROM items
            WHERE (`categories` LIKE '%".$query."%')") or die(mysql_error());
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following

            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                echo "<p><h3>".$results['categories']."</h3>".$results['fullname']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
    ?>
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
            <form action="index.php" method="GET">
              <input type="text" name="search" placeholder="Choose a category"/>
              <input type="submit" value="submit"/>
          </ul>
        </div>
        </div>


</table>

    </div>
  </body>
</html>

<?php include('includes/foot.inc.php');
  // footer info and closing tags
?>
