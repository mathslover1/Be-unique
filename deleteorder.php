<?php
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", 'be@unique');
    if ($conn) {
        $query = "DELETE FROM `order` WHERE `index1` = $id";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            echo"<script>alert('Your Order Delete Successfully')</script>";
            echo "<script>location. href='myorder.php'</script>";
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Connection error: " . mysqli_connect_error();
    }
}
?>
