<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="style.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

  </head>

    <?php
    $conn=mysqli_connect("localhost","root","","be@unique");
    $query1="SELECT *FROM product";
    $res=mysqli_query($conn,$query1);
    
    ?>



  <body>
  <?php
        $n=1;
      while($row=mysqli_fetch_array($res)){
        ?>
    <main class="container">

      <!-- Left Column /watch Image -->
      <div class="left-column">
        <img data-image="black" class="active" src="<?php  echo "../admin panel/img/";echo $row['img']; ?>" alt="">
        <!-- <img data-image="blue" src="1/2.png" alt="">
        <img data-image="red"  src="1/3.png" alt="">
        <img data-image="pink"  src="1/4.png" alt="">
        <img data-image="white"  src="1/5.png" alt="">
        <img data-image="green"  src="1/6.png" alt=""> -->
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Watch</span>
          <h1>Noise Vivid</h1>
          <p>Noise Vivid Call Bluetooth Calling Smartwatch with Metallic dial, 550 nits Brightness, AI Voice Assistant, Heart Rate Monitoring, 7 Days Battery & 100+ watchfaces (Jet Black)</p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>Color</span>

            <div class="color-choose">
              <div>
                <input data-image="black" type="radio" id="black" name="color" value="black" checked>
                <label for="black"><span></span></label>
              </div>
              <div>
                <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                <label for="blue"><span></span></label>
              </div>
              <div>
                <input data-image="red" type="radio" id="red" name="color" value="red">
                <label for="red"><span></span></label>
              </div>
              <div>
                <input data-image="pink" type="radio" id="pink" name="color" value="pink">
                <label for="pink"><span></span></label>
              </div>
              <div>
                <input data-image="white" type="radio" id="white" name="color" value="white">
                <label for="white"><span></span></label>
              </div>
              <div>
                <input data-image="green" type="radio" id="green" name="color" value="green">
                <label for="green"><span></span></label>
              </div>
            </div>

          </div>

          <!-- Cable Configuration -->
          <div class="cable-config">
            <a href="https://www.gonoise.com/">Visit the Noise Store</a>
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price" style="margin-bottom: 50px;">
          <span>₹1,299</span>
          <a href="#" class="cart-btn">Add to cart</a>
        </div>

        <div style="margin-bottom: 100px;">
        <span>About this item</span>
            <table border=".5px">
              <tr><td>Brand:</td><td>Gonoise</td></tr>
              <tr><td>Model Number:</td><td>ColorFit Vivid Call</td>
              <tr><td>Style</td><td>Casual</td>
              <tr><td>Screen Size</td><td>1.69 Inches</td>
              <tr><td>brightness</td><td>550 nits </td>
              <tr><td>battery life</td><td>Up to 7-day battery life.260mAh battery takes approx 2 hours to fully charge. </td>  
            </table>
        </div>
      </div>
    </main>
    <?php
      }
      ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
