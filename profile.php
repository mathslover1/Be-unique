<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Settings UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="profile/css/style.css">
</head>
<body>
	<section class="py-5 my-5">
		
		<div class="container">
			<!-- <h1 class="mb-5">Account Settings</h1> -->
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<!-- <div class="img-circle text-center mb-3">
							<img src="img/user2.jpg" alt="Image" class="shadow">
						</div> -->
						<h4 class="text-center">
						<?php 
                            session_start();
                            $email=$_SESSION['email'];
                            $conn = mysqli_connect("localhost","root","",'be@unique'); 
                            $query = "SELECT * from users where email='$email'";
                            $res = mysqli_query($conn,$query);
                            $row=mysqli_fetch_array($res);
                            echo $row["firstname"];
                        ?>
						</h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
							Logout
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Your Profile</h3>
						<form action="upbackend.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input type="text" class="form-control" id="fname" name="fname"
									value="<?php 
                                            $email=$_SESSION['email'];
                                            $conn = mysqli_connect("localhost","root","",'be@unique'); 
                                            $query = "SELECT * from users where email='$email'";
                                            $res = mysqli_query($conn,$query);
                                            $row=mysqli_fetch_array($res);
                                            echo $row["firstname"];
                                    ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input type="text" class="form-control" id="lname" name="lname" value="<?php 
                                            $email=$_SESSION['email'];
                                            $conn = mysqli_connect("localhost","root","",'be@unique'); 
                                            $query = "SELECT * from users where email='$email'";
                                            $res = mysqli_query($conn,$query);
                                            $row=mysqli_fetch_array($res);
                                            echo $row["lastname"];
                                    ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email:</label>
								  	<?php 
                                            $email=$_SESSION['email'];
                                            $conn = mysqli_connect("localhost","root","",'be@unique'); 
                                            $query = "SELECT * from users where email='$email'";
                                            $res = mysqli_query($conn,$query);
                                            $row=mysqli_fetch_array($res);
                                            echo $row["email"];
                                    ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" id="phone" name="phone" value="<?php 
                                            $email=$_SESSION['email'];
                                            $conn = mysqli_connect("localhost","root","",'be@unique'); 
                                            $query = "SELECT * from users where email='$email'";
                                            $res = mysqli_query($conn,$query);
                                            $row=mysqli_fetch_array($res);
                                            echo $row["mobilenum"];
                                    ?>">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" value="update" id="update" name="update">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
						</form>
					</div>
</form>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<form action="profilebackend.php" method="post" onsubmit="return myfun()" >
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control" id="pass" name="pass" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control" id="npass" name="npass" value="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control" id="cpass" name="cpass" value="">
								</div>
								

							</div>
							<div>
							<span id="mess" style="text-align: center; color:red"></span>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
						</form>
					</div>
<!-- </form> -->
					<div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">
							Logout
						</h3>
						<div>
							<form action="logoutbackend.php" method="post">
							<button class="btn btn-primary">logout</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
 function myfun(){
 var a =document.getElementById("npass").value;
 var b =document.getElementById("cpass").value;
 var c =document.getElementById("pass").value;
 if(a==""){
    document.getElementById('mess').innerHTML="***Please New Enter Password or Enter old password again***";
    return false;
 }
 if(c==""){
    document.getElementById('mess').innerHTML="***Old Password can not be empty***";
    return false;
 }
 if(a!=b){
    document.getElementById('mess').innerHTML="***password not same***";
    return false;
 }
} </script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>