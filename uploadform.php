<?php
  include('includes/nav.inc1.php'); // include the nav bar
  include('includes/head.inc.php'); // include the head
  include('includes/dbconnect.inc.php') // include the db connection
?>

<html>
  <head>
    <title>Forms with PHP - ITWS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript" src="resources/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="resources/JavaScript/uploadpage.js"></script>
    <link href="resources/termproj.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
  </head>
  <body>
    <div id="bodyBlock">

      <h1>Sell Your Item</h1>

<?php
    // Now let's process our form:
    // Have we posted?
    $havePost = isset($_POST["save"]);

    // Let's do some basic validation
    $errors = '';
    $fullName = '';
    $email = '';
    $freeOrSale = '';
    $title = '';
    $price = '';
    $myFile = '';
    $conditions = '';
    $categories = '';
    $detail = '';

    if ($havePost) {
      // Get the input and clean it.
      // First, let's get the input one param at a time.
      // Could also output escape with htmlentities()
      $fullName = htmlspecialchars(trim($_POST["fullName"]));
      $email = htmlspecialchars(trim($_POST["email"]));
      $freeOrSale = htmlspecialchars(trim($_POST["freeOrSale"]));
      $title = htmlspecialchars(trim($_POST["title"]));
      $price = htmlspecialchars(trim($_POST["price"]));
      $myFile = htmlspecialchars(trim($_FILES["myFile"]['name']));
      $conditions = htmlspecialchars(trim($_POST["conditions"]));
      $categories = htmlspecialchars(trim($_POST["categories"]));
      $detail = htmlspecialchars(trim($_POST["detail"]));
    // have we posted?
    $havePost = isset($_POST["save"]);

    if ($fullName == '') {
      $errors .= '<li>Full name may not be blank</li>';
      if ($focusId == '') $focusId = '#fullName';
    }
    if ($email == '') {
      $errors .= '<li>Email may not be blank</li>';
      if ($focusId == '') $focusId = '#email';
    }
    if ($freeOrSale == '') {
      $errors .= '<li>Please Select Free or For Sale</li>';
      if ($focusId == '') $focusId = '#freeOrSale';
    }
    if ($title == '') {
      $errors .= '<li>Title may not be blank</li>';
      if ($focusId == '') $focusId = '#title';
    }
    if ($price == '') {
      $errors .= '<li>Price may not be blank</li>';
      if ($focusId == '') $focusId = '#price';
    }
    if ($myFile == '') {
      $errors .= '<li>You must select a picture</li>';
      if ($focusId == '') $focusId = '#myFile';
    }
    if ($conditions == '') {
      $errors .= '<li>Please select a condition</li>';
      if ($focusId == '') $focusId = '#conditions';
    }
    if ($categories == '') {
      $errors .= '<li>Please select at least one category</li>';
      if ($focusId == '') $focusId = '#categories';
    }
    if ($detail == '') {
      $errors .= '<liPlease give your item a description</li>';
      if ($focusId == '') $focusId = '#detail';
    }


    if ($errors != '') {
      echo '<div class="messages"><h4>Please correct the following errors:</h4><ul>';
      echo $errors;
      echo '</ul></div>';
      echo '<script type="text/javascript">';
      echo '  $(document).ready(function() {';
      echo '    $("' . $focusId . '").focus();';
      echo '  });';
      echo '</script>';
    } else {
      if ($dbOk) {
        // Let's trim the input for inserting into mysql
        // Note that aside from trimming, we'll do no further escaping because we
        // use prepared statements to put these values in the database.
        $fullNameForDb = trim($_POST["fullName"]);
        $emailForDb = trim($_POST["email"]);
        $freeOrSaleForDb = trim($_POST["freeOrSale"]);
        $titleForDb = trim($_POST["title"]);
        $priceForDb = trim($_POST["price"]);
        $myFileForDb = trim($_FILES["myFile"]['name']);
        $conditionsForDb = trim($_POST["conditions"]);
        $categoriesForDb = trim($_POST["categories"]);
        $detailForDb = trim($_POST["detail"]);

        // Setup a prepared statement. Alternately, we could write an insert statement - but
        // *only* if we escape our data using addslashes() or (better) mysqli_real_escape_string().
        $insQuery = "INSERT INTO items (fullName,email,freeOrSale,title,price,myFile,conditions,categories,detail) VALUES(?,?,?,?,?,?,?,?,?)";

        $statement = $db->prepare($insQuery);

        // bind our variables to the question marks
        $statement->bind_param("ssssissss",$fullNameForDb,$emailForDb,$freeOrSaleForDb,$titleForDb,$priceForDb,$myFileForDb,$conditionsForDb,$categoriesForDb,$detailForDb);

        // make it so:
        $statement->execute();

        // give the user some feedback
        echo '<div class="messages"><h4>Success: ' . $statement->affected_rows . ' item added to database.</h4>';

        // close the prepared statement obj
        $statement->close();

      }
    }
  }
?>

<form id="addForm" name="addForm" action="uploadform.php" method="post" enctype="multipart/form-data">
  <fieldset>
    <div class="formData">

      <?php
      // preset values
       $fullName='';
       $email='';
       $freeOrSale='Free';
       $title='';
       $price=0.00;
       $myFile='';
       $condition='New';
       $categories='Electronics';
       $detail=''
       ?>

      <label class="field" for="fullName">Full Name:</label>
      <div class="value"><input type="text" size="60" value="<?php echo $fullName; ?>" name="fullName" id="fullName"/></div>

      <label class="field" for="email">Email:</label>
      <div class="value"><input type="email" size="60" value="<?php echo $email; ?>" name="email" id="email"/></div>

      <label class="field" for="freeOrSale">Free or Sale:</label>
      <div class="value"><input type="radio" name="freeOrSale" value="free" checked> Free<br>
                         <input type="radio" name="freeOrSale" value="sale"> Sale<br><?php $freeOrSale; ?></div>

      <label class="field" for="title">Title:</label>
      <div class="value"><input type="text" size="60" value="<?php echo $title; ?>" name="title" id="title"/></div>

      <label class="field" for="price">Price:</label>
      <div class="value"><input type="number" placeholder="$" size="60" value="<?php echo $price; ?>" name="price" id="price"/></div>

      <?php
        include('uploadfile.php'); // include the uploadfile.php
      ?>
      <label class="field" for="myFile">Upload a Picture of Your Item:</label>
      <div class="value"><input type="file" size="60" value="<?php echo $myFile; ?>" name="myFile" id="myFile"/></div>

      <label class="field" for="conditions">Condition:</label>
      <div class="value"><ul style="list-style: none;">
                            <li><input type="radio" name="conditions" value="New" checked> New</li>
                            <li><input type="radio" name="conditions" value="LikeNew"> Used - Like New</li>
                            <li><input type="radio" name="conditions" value="Good"> Used - Good</li>
                         </ul><?php $conditions; ?></div>

      <label class="field" for="categories">Categories (Please check all the boxes the item applies to):</label>
      <div class="value">
      <ul style="list-style: none;">
        <li><input type="radio" name="categories" value="Textbooks" checked/> Textbooks</li>
        <li><input type="radio" name="categories" value="Electronics" /> Electronics</li>
        <li><input type="radio" name="categories" value="Clothing&Shoes" /> Clothing & Shoes</li>
        <li><input type="radio" name="categories" value="Games" /> Games</li>
        <li><input type="radio" name="categories" value="Furniture" /> Furniture</li>
        <li><input type="radio" name="categories" value="Kitchen" /> Kitchen</li>
        <li><input type="radio" name="categories" value="Sports&Outdoors" /> Sports & Outdoors</li>
        <li><input type="radio" name="categories" value="Beauty&Health" /> Beauty & Health</li>
        <li><input type="radio" name="categories" value="Others" /> Others</li>
      </ul><?php $categories; ?></div>

      <label class="field" for="detail">Describe Your Item:</label>
      <div class="value"><input style="width:800px" type="text" size="60" value="<?php echo $detail; ?>" name="detail" id="detail"/></div>

      <input type="submit" value="save" id="save" name="save"/>
    </div>
  </fieldset>
</form>


    </div>
  </body>
</html>
<?php
  // Finally, let's close the database
  $db->close();
?>
<?php include('includes/foot.inc.php');
  // footer info and closing tags
?>
