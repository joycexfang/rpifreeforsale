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
          <li onclick="filterSelection('textbooks')">Textbooks</li>
          <li onclick="fiterSelection('electronics')"> Electronics</li>
          <li onclick="fiterSelection('clothing&shoes')"> Clothing & Shoes</li>
          <li onclick="fiterSelection('games')"> Games</li>
          <li onclick="fiterSelection('furniture')"> Furniture</li>
          <li onclick="fiterSelection('kitchen')"> Kitchen</li>
          <li onclick="fiterSelection('sports&outdoors')"> Sports & Outdoors</li>
          <li onclick="fiterSelection('beauty&health')"> Beauty & Health</li>
          <li onclick="fiterSelection('others')"> Others</li>
        </ul>
      </div>
      </div>