
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Ludiflex | Login</title>

</head>
<body>
    <form action="loginbackend.php" method="post">
   <div class="box">
    <div class="container">
        
        <div class="top">
            <span>Have an account?</span>
            <header>Login</header>
        </div>

        <div class="input-field">
            <input type="email" class="input" name="email" placeholder="Email Address" id="email" required>
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="Password" class="input" name="pass" placeholder="Password" id="pass" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="input-field">
            <input type="submit" class="submit" value="Login" id="">
        </div>

        <div class="two-col">
            <div class="two">
                <label><a href="forgotpassword.php">Forgot password?</a></label>
            </div>
        </div>
        <div class="two-col2">
             <div class="three">
                <label>Register Your Self First</label>
              </div>
              <div class="four">
                <label><a href="register.php">Click Me</a></label>
              </div>
        </div>
    </div>
</div>  
    </form>
</body>
</html>