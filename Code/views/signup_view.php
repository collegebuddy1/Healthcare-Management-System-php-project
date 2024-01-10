<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>HMS : Signup</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/medhistory_style.css">
</head>
<body>
    <iframe src="style/waves.html" frameborder="0" class="main-frame"></iframe>
    <div class="center">
        <h1>Signup</h1>
        <form method="post" action="">
            <div class="txt_field">
                <input type="text" name="u_id" maxlength="50" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="text" name="fname" maxlength="100" required>
                <span></span>
                <label>FirstName</label>
            </div>
            <div class="txt_field">
                <input type="text" name="lname" maxlength="100" required>
                <span></span>
                <label>LastName</label>
            </div>
            <div>
                <input type="radio" name="sex" value="M" required> Male 
                <input type="radio" name="sex" value="F" required> Female
                <span></span>
            </div>
            <div class="txt_field">
                <input type="date" name="dob" required>
                <span></span>
                <label>D.O.B</label>
            </div>
            <div>
            <label>Blood Group</label>
                <select name="bgroup" required>
                    <option value="A+"> A+
                    <option value="A-"> A-
                    <option value="B+"> B+
                    <option value="B-"> B-
                    <option value="AB+"> AB+
                    <option value="AB-"> AB-
                    <option value="O+"> O+
                    <option value="O-"> O-
                </select>
                <span></span>
            </div>
            <div class="txt_field">
                <input type="text" name="addline1" maxlength="255" required>
                <span></span>
                <label>Address Line 1</label>
            </div>
            <div class="txt_field">
                <input type="text" name="addline2" maxlength="255" required>
                <span></span>
                <label>Address Line 2</label>
            </div>
            <div class="txt_field">
                <input type="number" min="100000" max="999999" name="pin" required>
                <span></span>
                <label>PIN</label>
            </div>
            <div class="txt_field">
                <input type="number" min="1000000000" max="9999999999" name="mob" required>
                <span></span>
                <label>Mobile No</label>
            </div>
            <div class="txt_field">
                <input type="number" min="1000000000" max="9999999999" name="emg" required>
                <span></span>
                <label>Emergency Contact</label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwd" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="error">
                <?=$err_msg?><br><br>
            </div>
            <input type="submit" value="SignUp">
            <div class="signup_link">
                Already a member? <a href="/login">Login</a>
            </div>
        </form>
    </div>
    
</body>
</html>