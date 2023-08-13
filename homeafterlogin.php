<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products Grid</title>
    <script type="text/javascript">
			if (top !== window) {
				top.location.href = window.location.href;
			}
			if (window.location.hash) {
				window.location.href = window.location.href.replace(window.location.hash, '');
			}
		</script>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Home page</title>

		<meta name="author" content="p-Themes">

		<!-- Favicon -->
		<link rel="shortcut icon" href="https://www.portotheme.com/html/molla/assets/images/demos-img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="../../../www.portotheme.com/html/molla/assets/images/demos-img/apple-touch-icon.html">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/main.min.css">


    <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/about-us.css">
  </head>
  <body>

    <?php
    $conn=mysqli_connect("localhost","root","","be@unique");
    $query1="SELECT *FROM product";
    $res1=mysqli_query($conn,$query1);  
    ?>


    <section class="section section-demos text-center container-lg">
      <div class="demo-filter menu">
        <a href="#homepages" class="active">Home Pages</a>
        <a href="#aboutus">About Us</a>
        <a href="#productpages">Products</a>
        <!-- <a href="#" class="btn btn-primary btn-rounded" style="button">Button text</a> -->
        <a href="cart3.php">Cart</a>
        <a href="myorder.php">My Order</a>
    <a href="profile.php">
      <div class="user" style="display: flex; justify-content: flex-end;">
      <img src="img/user.png" alt="" style="width: 5%;">
      <div>
      <?php 
      session_start();
             $email=$_SESSION['email'];
             $conn = mysqli_connect("localhost","root","",'be@unique'); 
             $query = "SELECT * from users where email='$email'";
             $res = mysqli_query($conn,$query);
             $row=mysqli_fetch_array($res);
             echo $row["firstname"];
        ?>
      </div>
      </div>
    </a>
    <!-- <a href="#otherpages"><img src="img/user.png" style="width: 5%;" alt=""></a> -->
    </div>
 </div>
      </div>

      <div id="main"> 
        <div class="main">
          <div class="main-one">
            <span class="title">New Collection</span>
            <h1>Select <span>Your</span><br>New Perfect Style</h1>
            <!-- <a href="productpages"><button>Check Out</button></a> -->
          </div>
          <div class="watch">
          <!-- <div class="subpics">
            <img src="img/img/1/1.png" alt="pic" onclick="imageupdate('img/img/1/1.png')">
            <img src="img/luxury/1/1.png" alt="pic" onclick="imageupdate('img/luxury/1/1.png')">
            <img src="img/sport/1/1.png" alt="pic" onclick="imageupdate('img/sport/1/1.png')">
        </div> -->
          <div class="main-two">
              <img class="image" src="img/img/1/1.png" alt="pic" >
          </div>
        </div>
      </div>
      </div>
      </div>
      <script src="javascript/script.js"></script>
  
    </section>

    <section id="aboutus">
    <!--middle part start-->
    <div class="container mt-5">
      <div class="row mt-5">
          <div class="col-12 mt-5 text-center">
              <span class="header">about us</span>
          </div>
      </div>
      
      <!--main content-->
      <div class="row mt-5">
          <div class="col-xl-6 col-lg-6 col-sm-12 text-center">
              <img src="img/logo.png"  class="header-part" style="margin-bottom: 110px;">
          </div>
          <div class="col-xl-6 col-lg-6 col-sm-12 pt-5" style="font-weight: 600;">
            BeUnique is a leading retailer of watches for all watch brands listed on our website. We pride ourselves on having one of the most efficient shopping systems available with communication at every stage to inform you of your order status, as well as excellent customer service and support team who are glad to assist you with any enquiry or problem, should one arise.

            Buy from BeUnique with confidence: as an official retailer for all brand, all watches purchased from us are provided with the official manufacturer's Warranty.</span>                
          </div>
      </div>
  </div>
  <!--middle part end-->
 </section>
    




<!-- shoping cart  -->
    <section class="section section-demos text-center container-lg" id="productpages">
    <h2>Our Products</h2>
    <p></p>
    <div class="row demos" style="justify-content: center;" >
    <?php
        $n=1;
      while($row=mysqli_fetch_array($res1)){
        $id=$row['index'];
        ?>
      <div class="iso-item col-sm-6 col-md-4 col-lg-3 homepages" style="background-color: white; margin: 10px; margin-bottom: 40px;">
        <a href="product.php? id=<?php echo $id; ?>">
          <img src="<?php  echo "../admin panel/img/";echo $row['img']; ?>"  alt="" class="pcard__img" width="80%">
          <h5><?php echo $row['watch_name']; ?></h5>
          <h5 style="font-weight: 100;"><?php echo $row['price']; ?></h5>
        </a>
      </div> 
      <?php
      }
      ?>
      </div>
  </section>

  </body>
</html>
