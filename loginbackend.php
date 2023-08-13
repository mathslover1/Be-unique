<?php
// session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];
// echo $email;
// echo $pass;

$c = mysqli_connect("localhost","root","","be@unique");
$q = "SELECT * FROM `users` WHERE email= '$email' and password ='$pass'";
$res = mysqli_query($c,$q);
$exists="No";
if (isset($_POST['email']) && isset($_POST['pass']) )
{
    while ($row = mysqli_fetch_array($res)) 
    {
        $exists="Yes";
    }
    if($exists=="Yes")
    {
        // $_SESSION['email'] = $_POST['email'];
        // $_SESSION['pass'] = $_POST['pass'];
        echo "<script>location. href='homeafterlogin.php'</script>";
    }
    else{
        echo"<script>alert('invalid password')</script>";
        echo "<script>location. href='login.php'</script>";
    }

    session_start();
    $_SESSION['email']=$_POST['email'];
}
?>