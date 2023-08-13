<?php
if($_POST['update']){
$conn = mysqli_connect("localhost","root","",'be@unique');   
     session_start();
     $_POST["email"]=$_SESSION['email'];
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        

        $sql="UPDATE `users` SET `firstname`='$fname',`lastname`='$lname',`mobilenum`='$phone'WHERE `email`='$email'";
        $insert = mysqli_query( $conn,$sql);
        if($insert){
            echo "<script>alert('data upadate successfully')</script>
                    <script>location. href='profile.php'</script>";
        }
   }
?>