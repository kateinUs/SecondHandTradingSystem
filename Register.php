<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="resources/style.css">
    <title>WKU Second Hand Trading System</title>
</head>
<body>
<div class="title">
    <div class="icon">
        <img src="resources/pictures/logo_cn.png" width="300">
    </div>
    <div class="main_title_text" onclick="jump_to_main()">
        <font style="line-height: 78px" size="10" color="black">WKU Second Hand Trading System</font>
    </div>
    <form class="search" action="Search.php" method="post">
        <input class="button" type="submit" value="Search">
    </form>
    <form class="search" action="Search.php" method="post">
        <input class="button" type="submit" value="Login">
    </form>
</div>
<form class="login_area" action="Register_submit.php" method="post">
    Email:<input type="text" name="email">
    Password:<input type="text" name="password" id="password">
    Confirm Password:<input type="text" name="confirm_password" id="confirm_password">
    <form action="Register_submit.php" method="post">
        <input class="button_login" type="submit" value="Register now" onclick="return check_password()">
    </form>
</form>
</body>
<script>
check_password = function(){
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    if(password !== confirm_password){
        alert("password not match, please check again!");
        return false;
    }
}
function jump_to_main(){
    window.location.href='main.php';
}
</script>

<?php
