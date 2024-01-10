<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>HMS : Supplier Login</title>
    <link rel="stylesheet" href="/style/login.css">
    <link rel="stylesheet" href="/style/medhistory_style.css">
</head>
<body>
    <iframe src="/style/waves.html" frameborder="0" class="main-frame"></iframe>
    <div class="center">
        <h1>Supplier Login</h1>
        <form method="POST" action="">
            <div class="txt_field">
                <input type="text" name="mob" required>
                <span></span>
                <label>Mobile No.</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="error">
                <?=$err_msg?><br><br>
            </div>
            <!--<div class="pass">Forgot Password?</div>-->
            <input type="submit" value="Login">
            <div class="signup_link">
                Not registered?<a href="/supplier/signup"> Signup</a>
            </div>
            <div class="signup_link">
                <a href="/login">Back to User Login</a>
            </div>
        </form>
    </div>
    
</body>
</html>