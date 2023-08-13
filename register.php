
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Ludiflex | Login</title>

</head>
<body>
    <form action="regbackend.php" method="post"  enctype="multipart/form-data" onsubmit="return myfun()" >
   <div class="box">
    <div class="container">

        <div class="top">
            <header>Register</header>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="fname" placeholder="First name" id="fname" required pattern="[a-zA-Z'-'\s]*">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="text" class="input" name="lname" placeholder="Last name" id="lname" required pattern="[a-zA-Z'-'\s]*">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="email" class="input" name="email" placeholder="Email Address" id="email">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="phone" class="input" name="phone" placeholder="Mobile Number" id="phone" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input" name="pass" placeholder="Password" id="pass" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input" name="cpass" placeholder="Confirm Password" id="cpass" required>
            <i class='bx bx-lock-alt'></i>
        </div>
        <div>
        <span id="mess" ></span>
        </div>
        <div class="input-field">
            <input type="submit" class="submit" value="Next" id="Next"name="Next">
        </div>

        <div class="two-col2">
             <div class="three">
                <label>If all ready registered</label>
              </div>
              <div class="four">
                <label><a href="login.php">Click Me</a></label>
              </div>
        </div>
    </div>
</div>  
    </form>
<script>
 function myfun(){
 var a =document.getElementById("pass").value;
 var b =document.getElementById("cpass").value;
 if(a==""){
    document.getElementById('mess').innerHTML="***Please Enter Password***";
    return false;
 }
 if(a!=b){
    document.getElementById('mess').innerHTML="***password not same***";
    return false;
 }
}
</script>
</body>
</html>