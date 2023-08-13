<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
    <!-- Add your CSS styles here -->
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
</head>
<body>
<?php
    // Check if the product ID is provided via GET request
    if (isset($_GET['id'])) {
        session_start();
        $productId = $_GET['id'];
        $conn=mysqli_connect("localhost","root","","be@unique");    

        // Fetch the product details from the database
        $sql = "SELECT * FROM product WHERE `index`= $productId";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $watch_name=$row['watch_name'];
        $description=$row['Description'];
        $price=$row['price'];
        $color=$row['color'];
        $img=$row['img'];
        $dialcolor=$row['dial_color'];
        $dialglassmaterial=$row['dial_glass_material'];
        $caseshape=$row['case_shape'];
        $casematerial=$row['case_material'];
        $casediameter=$row['case_diameter'];
        $bandcolor=$row['band_color'];
        $bandmaterial=$row['band_material'];
    } 
    ?>

    <main class="container">
      <!-- Left Column /watch Image -->
      <div class="left-column">
        <img data-image="<?php echo $color;?>" class="active" src="<?php  echo "../admin panel/img/";echo $img; ?>" alt="">
      </div>

      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Watch</span>
          <h1><?php echo $watch_name; ?></h1>
          <p><?php echo $description;?></p>
        </div>

        <!-- Product Configuration -->
          <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>color</span>
            <p><?php echo $color;?></p>
          </div>
        </div>

        <!-- Product Pricing -->
        <?php
        $n=1;
        $id=$row['index'];
        ?>
        <div class="product-price" style="margin-bottom: 50px;">
          <span>₹<?php echo number_format($price, 2); ?></span>
          <form action="add_to_cart.php" style="margin-top: 60px;">
          <label>Enter Quantity:</label>
            <div class="col-md-2">
              <input type="hidden" name="id" value="<?php echo $id;?>" >
            <input type="number" class='form-control' id="quantity" name="quantity">
         </div>

         <div class="section">
         <a id="btn" href="login.php">
         <p id="btnText">Add To Cart</p>
         <div class="checked">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
         <path fill="transparent" d="M14.1 27.2l7.1 7.2 16.7-16.8"></path>
         </svg>
         </div>
</a>
         </div>
<script>
var btn = document.getElementById("btn");
var btnText = document.getElementById("btnText");

btn.onclick = function() {
  btnText.innerHTML = "Done";
  btn.classList.add("active");
}
</script>
        </form>

        </div>
        <div style="margin-bottom: 100px;">
        <span>About this item</span>
        <table border=".5px">
              <tr><td>Dial Color: </td><td> <?php echo $dialcolor;?></td></tr>
              <tr><td>Dial Glass Material: </td><td><?php echo $dialglassmaterial;?></td></tr>
              <tr><td>Case Shape: </td><td><?php echo $caseshape;?></td></tr>
              <tr><td>Case Material:</td><td><?php echo $casematerial;?></td></tr>
              <tr><td>Case Diameter:</td><td><?php echo $casediameter;?>millimeters</td></tr>
              <tr><td>Band Color:</td><td><?php echo $bandcolor;?></td></tr>
              <tr><td>Band Material:</td><td><?php echo $bandmaterial;?></td></tr>
        </table>
      </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="javascript/product.js" charset="utf-8"></script>



</body>
</html>
