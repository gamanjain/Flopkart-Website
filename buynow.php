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
</nav>	  <!-- End of Navigation bar -->


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
  $query="SELECT price,ava_qty FROM productinfo where prodid=$items";
  $demo1=mysqli_query($updat,$query);
  $row=mysqli_fetch_array($demo1);
  $ava_qty=$row['ava_qty'];
  $prodprice=$row['price'];
  if(!$demo1)
      die('Cannot connect to database'.mysqli_error());
  /*$query2="SELECT address FROM userinfo where userid=$u";
  $demo2=mysqli_query($updat,$query2);
  $addess=mysqli_fetch_array($demo2)['address'];*/
  if($ava_qty==0){
    echo "<h1> Product currently unavailable!<h1>";
  }
  else{
    $q="SELECT orderid FROM orderinfo";
    $d=mysqli_query($updat,$q);
    while(true){
      $ds=$db;
      $db=mysqli_fetch_array($d);
      if($db)
        continue;
      else break;
    }
    $orderid=$ds['orderid']+1;
    $query1="INSERT INTO orderinfo VALUES($orderid,101,$items,1,$prodprice);";
    $query2="UPDATE productinfo SET ava_qty=ava_qty-1 WHERE prodid=$items";
    $demo2=mysqli_query($updat,$query1);
    $demo3=mysqli_query($updat,$query2);
    if(!$demo3)
        die('Cannot connect to database'.mysqli_error());
    if(!$demo2)
        die('Cannot connect to database'.mysqli_error());
    echo "<h1> Order Successful!! Your order will be delivered to your address shortly </h1>
          <h2> Payment option: Cash on delivery </h2>";
    }
  ?>

</div>

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
