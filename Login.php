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
    <div class="main_title_text">
        <font style="line-height: 78px" size="10" color="black">WKU Second Hand Trading System</font>
    </div>
    <form class="search" action="Search.php" method="post">
        <input class="button" type="submit" value="Search">
    </form>
    <form class="search" action="Search.php" method="post">
        <input class="button" type="submit" value="Login">
    </form>
</div>
<form class="login_area" method="post" id="users_login">
    Email:<input type="text" name="email">
    Password:<input type="text" name="password">
    <input class="button_login" type="submit" value="Login" onclick="user_login()">
    <input class="button_login" type="submit" value="Admin login" onclick="admin_login()">
    <button onclick="window.location.href = 'Register.php'" value="Register now">
</form>
</body>
<script>
    function user_login() {
        var form = document.forms['users_login'];
        form.action = 'Login_submit.php';
        form.submit();
    }
    function admin_login() {
        var form = document.forms['users_login'];
        form.action = 'admin_login.php';
        form.submit();
    }
</script>

<?php
