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
        <img data-image="blue" class="active" src="4/1.png" alt="">
        <img data-image="black" src="4/2.png" alt="">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Watch</span>
          <h1>BENYAR</h1>
          <p>BENYAR Luxury Business Casual Party-Wear Silicone Chronograph Date Display Watch for Men</p>
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
            </div>

          </div>

          <!-- Cable Configuration -->
          <div class="cable-config">
            <!-- <a href="https://www.gonoise.com/">Visit the Noise Store</a> -->
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price" style="margin-bottom: 50px;">
          <span>₹2,690</span>
          <a href="#" class="cart-btn">Add to cart</a>
        </div>

        <div style="margin-bottom: 100px;">
        <span>About this item</span>
            <table border=".5px">
              <tr><td>Dial Material:</td><td>Stainless Steel; </td></tr>
              <tr><td> Dial Shape:</td><td>Round</td>
              <tr><td>Dial Diameter:</td><td>45 mm</td>
              <tr><td>Warranty Type: </td><td>Manufacturer Defect</td>
            </table>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
