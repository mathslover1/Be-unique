<?php 

session_start();
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
	if($_GET["action"] == "clear")
	{
		setcookie("shopping_cart".$convertedEmail, "", time() - 3600);
		header("location:cart3.php?clearall=1");
	}
}
if(isset($_POST['checkout']))
{
    if(isset($_COOKIE["shopping_cart".$convertedEmail]))
    {
        $cookie_data = stripslashes($_COOKIE['shopping_cart'.$convertedEmail]);
        $cart_data = json_decode($cookie_data, true);

        $conn = mysqli_connect("localhost", "root", "", "be@unique");
        // foreach ($cart_data as $keys => $row)
        // {
            // $id = $row["item_id"];
            // $price = $row["item_quantity"] * $row["item_price"];
            // $quantity = $row["item_quantity"];
            
            // // Use prepared statement to insert data securely
            // $stmt = $conn->prepare("INSERT INTO `order` (`product_id`, `quantity`, `total_amount`, `email`) VALUES (?, ?, ?, ?)");
            // $stmt->bind_param("siis", $id, $quantity, $price, $email);
            
            // if ($stmt->execute()) {
                // Insert successful
                header("location:checkout.php") ;// Remove inserted item from cart
            // } else {
            //     // Insert failed
            //     echo "Error inserting data: " . $stmt->error;
            // }
        // }
        
        // Update cookie with remaining cart data
        $item_data = json_encode($cart_data);
        setcookie('shopping_cart'.$convertedEmail, $item_data, time() + (86400 * 30));
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
			<h3>Order Details</h3>
			<div class="table-responsive">
			<?php echo $message; ?>
			<div align="right">
				<a href="cart3.php?action=clear"><b>Clear Cart</b></a>
			</div>
			<table class="table table-bordered">
				<tr>
					<th width="40%">Item Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
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
					<td><a href="cart3.php?action=delete&id=<?php echo $row["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
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
			<div align="right">
			<a href="homeafterlogin.php"><b>Shop More</b></a>
			</div>
			<form action="checkout.php" method="get">
			<input type="submit" name="checkout" id="checkout" class="btn btn-primary btn-lg btn-block" value="checkout" />
			</form>
			</div>
		<br/>
	</body>
</html>