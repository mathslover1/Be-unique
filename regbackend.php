<?php

$conn = mysqli_connect("localhost","root","",'be@unique');   
    // $count = mysqli_num_rows($result);   
        $fname=$_POST["fname"];
        $lname=$_POST["lname"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $pass=$_POST["pass"];

        $errors = array();

        $checkUser = "SELECT * from users where email='$email'";
        $result = mysqli_query($conn,$checkUser);
        $count = mysqli_num_rows($result);

        if($count>0){
            echo "
            <script>alert('Email already exist')</script>
            <script>location. href='register.php'</script>";
        }
        else{
            $sql="INSERT INTO `users` (`firstname`, `lastname`, `email`, `mobilenum`, `password`)
            VALUES ('$fname', '$lname ', '$email', '$phone', '$pass')";
            $insert = mysqli_query( $conn,$sql);
            if($insert){
                echo "<script>location. href='login.php'</script>";
            }
        }
        
    
       
        // if(count($errors)==0){
        //     $sql="INSERT INTO `users` (`firstname`, `lastname`, `email`, `mobilenum`, `password`)
        //     VALUES ('$fname', '$lname ', '$email', '$phone', '$pass')";
        //     $insert = mysqli_query( $conn,$sql);
        //      if($insert){
        //         echo "<script>location. href='login.php'</script>";
        //      }
        //      return false;
        // }
     
    
    // header("Location: login.php");

 
?>