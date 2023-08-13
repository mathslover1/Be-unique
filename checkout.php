<?php
  session_start();
  $email=$_SESSION['email'];
  $conn = mysqli_connect("localhost","root","",'be@unique');   
    $sql = "SELECT * FROM `order`";

$result = mysqli_query($conn, $sql);
    ?>

<?php 


$email=$_SESSION['email'];
// $id=$_SESSION['id'];
$convertedEmail = str_replace('.', '_', $email);

// $quantity=$cart_data[$keys]["item_quantity"]; 
$connect = new PDO("mysql:host=localhost;dbname=be@unique", "root", "");


$message = '';

if(isset($_POST["add_to_cart"]))
{
	if(isset($_COOKIE["shopping_cart".$convertedEmail]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart'.$convertedEmail]);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}

	$item_id_list = array_column($cart_data, 'item_id');

	if(in_array($_POST["hidden_id"], $item_id_list))
	{
		foreach($cart_data as $keys => $row)
		{
			if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
			{
				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
			}
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_POST["hidden_id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
			'email' => $convertedEmail,
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data);
	setcookie('shopping_cart'.$convertedEmail, $item_data, time() + (86400 * 30));
	header("location:cart3.php?success=1");
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart'.$convertedEmail]);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $row)
		{
			if($cart_data[$keys]['item_id'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart".$convertedEmail, $item_data, time() + (86400 * 30));
				header("location:cart3.php?remove=1");
			}
		}
	}
}





if(isset($_GET["success"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
	  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	Item Added into Cart
	</div>
	';
}

if(isset($_GET["remove"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Item removed from Cart
	</div>
	';
}
if(isset($_GET["clearall"]))
{
	$message = '
	<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Your Shopping Cart has been clear...
	</div>
	';
}

?>
<?php
// session_start();
// $email=$_SESSION['email'];

if(isset($_POST['orderplace']))
{
  if(isset($_COOKIE["shopping_cart".$convertedEmail]))
  {
      $cookie_data = stripslashes($_COOKIE['shopping_cart'.$convertedEmail]);
      $cart_data = json_decode($cookie_data, true);

      $conn = mysqli_connect("localhost", "root", "", "be@unique");
      foreach ($cart_data as $keys => $row)
      {
          $id = $row["item_id"];
          $price = $row["item_quantity"] * $row["item_price"];
          $quantity = $row["item_quantity"];
          $fname=$_POST["fname"];
          $lname=$_POST["lname"];
          $add=$_POST["address"];
          $zip=$_POST["zip"];
          // setcookie('shopping_cart'.$convertedEmail, $fname, $lname ,$add, $zip, time() + (86400 * 30));
          // Use prepared statement to insert data securely
          $stmt = $conn->prepare("INSERT INTO `order` (`product_id`, `quantity`, `total_amount`, `email`,`fname`, `lname`, `address`, `zip`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("iissssss", $id, $quantity, $price, $email, $fname, $lname, $add, $zip);

          
          if ($stmt->execute()) {
            
          
          // $conn = mysqli_connect("localhost","root","",'be@unique');
          // $a="INSERT INTO `order` (`fname`, `lname`, `address`, `zip`)
          //             VALUES ('$fname', '$lname ','$add', '$zip')";
        
          //         $insert = mysqli_query( $conn,$a);
          //         if($insert){
          //             echo "<script>alert('Order placed ')</script>
          //             <script>location. href='homeafterlogin.php'</script>";
          //         }
              // Insert successful
              unset($cart_data[$keys]);
              echo "<script>alert('Order placed ')</script>
                  <script>location. href='homeafterlogin.php'</script>";
               // Remove inserted item from cart
          } else {
              // Insert failed
              echo "Error inserting data: " . $stmt->error;
          }
      }
      
      // Update cookie with remaining cart data
      $item_data = json_encode($cart_data);
      setcookie('shopping_cart'.$convertedEmail, $item_data, time() + (86400 * 30));
     
  }
  
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br/>
		<form method="post">
		<div class="container">
			<br />
			<div style="clear:both"></div>
			<br />
			<h3>Your Selected Product</h3>
			<div class="table-responsive">

			<table class="table table-bordered">
				<tr>
					<th width="45%">Item Name</th>
					<th width="15%">Quantity</th>
					<th width="20%">Price</th>
					<th width="20%">Total</th>
				</tr>
			<?php
			if(isset($_COOKIE["shopping_cart".$convertedEmail]))
			{
				$total = 0;
				$cookie_data = stripslashes($_COOKIE["shopping_cart".$convertedEmail]);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $row)
				{
			?>
				<tr>
					<td><?php echo $row["item_name"]; ?></td>
					<td><?php echo $row["item_quantity"]; ?></td>
					<td>₹<?php echo $row["item_price"]; ?></td>
					<td>₹<?php echo $row["item_quantity"] * $row["item_price"];?></td>
				</tr>
			<?php	
					$total = $total + ($row["item_quantity"] * $row["item_price"]);
				}
			?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right">₹<?php echo number_format($total, 2); ?></td>
					<td></td>
				</tr>
			<?php

			}
			else
			{
				echo '
				<tr>
					<td colspan="5" align="center">No Item in Cart</td>
				</tr>
				';
			}
			?>
			</table>
			</div>
		<br/>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Webslesson Demo | Simple PHP Mysql Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="css/checkout.css"> -->
    
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">     
      <main>

<!-- DEMO HTML -->
        
<div>
 <h4 class="mb-3">Billing address</h4>


 <form class="needs-validation" method="post" novalidate>


   <div class="row">
     <div class="col-md-6 mb-3">
       <label for="firstName">First name</label>
       <input type="text" class="form-control" name="fname" id="fname" placeholder="" value="" required>
       <div class="invalid-feedback">
         Valid first name is required.
       </div>
     </div>
     <div class="col-md-6 mb-3">
       <label for="lastName">Last name</label>
       <input type="text" class="form-control" name="lname" id="lname" placeholder="" value="" required>
       <div class="invalid-feedback">
         Valid last name is required.
       </div>
     </div>
   </div>

   
   <div class="mb-3">
     <label for="email">Email</label>
     <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $email; ?>" required>
     <div class="invalid-feedback">
       Please enter a valid email address for shipping updates.
     </div>
   </div>

   <div class="mb-3">
     <label for="address">Address</label>
     <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
     <div class="invalid-feedback">
       Please enter your shipping address.
     </div>
   </div>

   <div class="row">
     <div class="col-md-5 mb-3">
       <label for="country">Country</label>
       <select class="form-control" id="country" required>
         <option value="">Choose...</option>
         <option selected>India</option>
       </select>
       <div class="invalid-feedback">
         Please select a valid country.
       </div>
     </div>
     <div class="col-md-4 mb-3">
       <label for="state">State</label>
       <select class="form-control" id="state" required>
         <option value="">Choose...</option>
         <option value="">Select state</option>
         <option value="AN">Andaman and Nicobar Islands</option>
         <option value="AP">Andhra Pradesh</option>
         <option value="AR">Arunachal Pradesh</option>
         <option value="AS">Assam</option>
         <option value="BR">Bihar</option>
         <option value="CH">Chandigarh</option>
         <option value="CT">Chhattisgarh</option>
         <option value="DN">Dadra and Nagar Haveli</option>
         <option value="DD">Daman and Diu</option>
         <option value="DL">Delhi</option>
         <option value="GA">Goa</option>
         <option value="GJ" selected>Gujarat</option>
         <option value="HR">Haryana</option>
         <option value="HP">Himachal Pradesh</option>
         <option value="JK">Jammu and Kashmir</option>
         <option value="JH">Jharkhand</option>
         <option value="KA">Karnataka</option>
         <option value="KL">Kerala</option>
         <option value="LA">Ladakh</option>
         <option value="LD">Lakshadweep</option>
         <option value="MP">Madhya Pradesh</option>
         <option value="MH">Maharashtra</option>
         <option value="MN">Manipur</option>
         <option value="ML">Meghalaya</option>
         <option value="MZ">Mizoram</option>
         <option value="NL">Nagaland</option>
         <option value="OR">Odisha</option>
         <option value="PY">Puducherry</option>
         <option value="PB">Punjab</option>
         <option value="RJ">Rajasthan</option>
         <option value="SK">Sikkim</option>
         <option value="TN">Tamil Nadu</option>
         <option value="TG">Telangana</option>
         <option value="TR">Tripura</option>
         <option value="UP">Uttar Pradesh</option>
         <option value="UT">Uttarakhand</option>
         <option value="WB">West Bengal</option>
       </select>
       <div class="invalid-feedback">
         Please provide a valid state.
       </div>
     </div>
     <div class="col-md-3 mb-3">
       <label for="zip">Zip</label>
       <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
       <div class="invalid-feedback">
         Zip code required.
       </div>
     </div>
   </div>
  
   <h4 class="mb-3">Payment</h4>

   <div class="d-block my-3">
     <div class="custom-control custom-radio">
       <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
       <label class="custom-control-label" for="credit">Cash On Delivery</label>
     </div>
   </div>
   <!-- <div class="row">
     <div class="col-md-6 mb-3">
       <label for="cc-name">Name on card</label>
       <input type="text" class="form-control" id="cc-name" placeholder="" required>
       <small class="text-muted">Full name as displayed on card</small>
       <div class="invalid-feedback">
         Name on card is required
       </div>
     </div>
     <div class="col-md-6 mb-3">
       <label for="cc-number">Credit card number</label>
       <input type="text" class="form-control" id="cc-number" placeholder="" required>
       <div class="invalid-feedback">
         Credit card number is required
       </div>
     </div>
   </div>
   <div class="row">
     <div class="col-md-3 mb-3">
       <label for="cc-expiration">Expiration</label>
       <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
       <div class="invalid-feedback">
         Expiration date required
       </div>
     </div>
     <div class="col-md-3 mb-3">
       <label for="cc-cvv">CVV</label>
       <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
       <div class="invalid-feedback">
         Security code required
       </div>
     </div>
   </div> -->
   <hr class="mb-4">
   <input type="submit" name="orderplace" id="orderplace" class="btn btn-primary btn-lg btn-block" value="orderplace" />
 </form>
</div>
</div>


</div>
<!-- End Demo HTML -->

</main>
</div>
<br>
<br>
<br>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	</body>
</html>