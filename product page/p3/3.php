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

  <body>
    <main class="container">

      <!-- Left Column /watch Image -->
      <div class="left-column">
        <img data-image="black" class="active" src="3/1.png" alt="">
        <img data-image="blue" src="3/2.png" alt="">
        <img data-image="white" src="3/3.png" alt="">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Watch</span>
          <h1>BOSTON LEVIN EON </h1>
          <p>BOSTON LEVIN EON 1.83" Android4.4+ Smartwatch with Voice Control, Bluetooth Calling, Full Screen Touch,TFT, Health Ecosystem, HR & SpO2 Monitoring </p>
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
                <input data-image="white" type="radio" id="white" name="color" value="white">
                <label for="white"><span></span></label>
              </div>
            </div>

          </div>

          <!-- Cable Configuration -->
          <div class="cable-config">
            <a href="https://boston-levin.com/">Visit the Boston Levin Store</a>
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price" style="margin-bottom: 50px;">
          <span>₹1,099</span>
          <a href="#" class="cart-btn">Add to cart</a>
        </div>

        <div style="margin-bottom: 100px;">
        <span>About this item</span>
            <table border=".5px">
              <tr><td>Brand:</td><td>	BOSTON LEVIN</td></tr>
              <tr><td>Model Number:</td><td>LEVIN EON</td>
              <tr><td>Style</td><td>	Modern</td>
              <tr><td>Screen Size</td><td>1.83 Inches</td>
              <tr><td>brightness</td><td> 280 NITS Peak</td>
              <tr><td>battery life</td><td>Up to 7-day battery life.battery takes approx 4 hours to 100% charge. </td>  
            </table>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
