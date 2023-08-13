<?php

    session_start();   
     $_POST["email"]=$_SESSION['email'];
     $pass=$_POST["pass"];
     $npass=$_POST["npass"];
     $email=$_POST["email"];
     $conn = mysqli_connect("localhost","root","",'be@unique');  
$q = "SELECT * FROM `users` WHERE  password ='$pass'"; 
$res = mysqli_query($conn,$q);
$exists="No";
if (isset($_POST['pass']))
{
    while ($row = mysqli_fetch_array($res)) 
    {
        $exists="Yes";
    }
    if($exists=="Yes")
    {
        $sql="UPDATE `users` SET `password`='$npass' WHERE `email`='$email'";
        $insert = mysqli_query( $conn,$sql);
        if($insert){
            echo"<script>alert('data upadate successfully')</script>
            <script>location. href='profile.php'</script>";
        }
        else{
        echo "<script>location. href='profile.php'</script>";}
    }
    else{
        echo"<script>alert('invalid password')</script>";
        echo "<script>location. href='profile.php'</script>";
    }
   }
   else
   {
    echo"<script>location. href='profile.php'</script>";
}
?>