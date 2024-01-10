<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>HMS : Login</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/medhistory_style.css">
</head>
<body>
<iframe src="style/waves.html" frameborder="0" class="main-frame"></iframe>
    <div class="center">
        <h1>Login</h1>
        <form method="POST" action="">
            <div class="txt_field">
                <input type="text" name="uname" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="centered">
                <input type="radio" name="type" value="U" id="user" required> <label for="user">User</label>
                <input type="radio" name="type" value="D" id="doc" required> <label for="doc">Doctor</label> 
                <input type="radio" name="type" value="S" id="staff" required><label for="staff">Staff</label>
                <br>
            </div>
            <div class="error">
                <?=$err_msg?><br><br>
            </div>
            <!--<div class="pass">Forgot Password?</div>-->
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member?<a href="/signup">Signup</a>
            </div>
            <div class="signup_link">
                Supplier?<a href="/supplier/login">Login here</a>
            </div>
        </form>
    </div>
    
</body>
</html>