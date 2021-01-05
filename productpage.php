<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flopkart Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- NAVBAR SECTION -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="mainpage.html">Flopkart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="mainpage.html">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myorders.php">My orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mycart.php">My cart</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
     </div>
     </div>   <!-- End of container div -->
</nav>    <!-- End of Navigation bar -->


<!--  CONTAINER  -->

<div class="container">
  <?php
  session_start();
  $server='localhost';
  $uname="root";
  $pw="";
  $db="flopkart-website";
  $updat=mysqli_connect($server,$uname,$pw,$db);
  $items= $_REQUEST["src"];
  if(!$updat)
  {
    echo "Connection not successful";
  }
  $query="SELECT pname,price FROM productinfo WHERE prodid=$items";
  $demo=mysqli_query($updat,$query);
  if(!$demo)
      die('Cannot connect to database'.mysqli_error());
  while($row=mysqli_fetch_array($demo)){
    $name=$row['pname'];
    $prices=$row['price'];
    if($items==201)
      $url='images/Iphone_XII.png';
    else if($items==202)
      $url='images/Airpods_Pro.png';
    else if($items==203)
      $url='images/Macbook_Air.png';
    else if($items==206)
      $url='images/Peter_England_Shirt.png';
    else if($items==207)
      $url='images/Levis_Pant.png';
    else if($items==208)
      $url='images/Rayban_Glasses.png';
    else if($items==211)
      $url='images/RC_Car.png';
    else if($items==212)
      $url='images/Nike_Football.png';
    else if($items==213)
      $url='images/SG_Cricket_Bat.png';
    else if($items==216)
      $url='images/Pen_Pack.png';
    else if($items==217)
      $url='images/Classmate_Notebook.png';
    else if($items==218)
      $url='images/Pencil_and_Eraser.png';
    echo "<br><h2 class=\"prod_head\">$name</h2><br>
      <div class=\"prod_img\" style=\"background:url($url) no-repeat\"></div>
      <div class=\"prod_name\">$name</div>
      <div class=\"prod_price\">$prices INR</div><br>
      <div class=\"buttons\"><button type=\"button\" class=\"button1\" onclick=\"location.href='buynow.php?src=$items'\">Buy Now</button><br><br>
      <button type=\"button\" class=\"button2\" onclick=\"location.href='addtocart.php?src=$items'\">Add to Cart</button></div>";
  }

  ?>

</div>
<hr>
<!--  CONTAINER  -->


<!-- FOOTER -->
<footer>
	<br>
	<div class="footer">
		Contact us:
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 tiles">
				<a href="https://www.instagram.com/gamanjaiin/">
					<div class="icons-1"></div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-4 tiles">
				<a href="https://github.com/gamanjain/">
					<div class="icons-2"></div>
				</a>
			</div>
			<div class="col-xs-12 col-sm-4 tiles">
				<a href="">
					<div class="icons-3"></div>
				</a>
			</div>
		</div>
	</div>
</footer>

<!-- END OF FOOTER -->

</body>
