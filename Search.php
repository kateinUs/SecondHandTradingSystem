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
    <form class="search" action="Login.php" method="post">
        <input class="button" type="submit" value="Login">
    </form>
</div>
<div class="search_area">
    <form action="search_submit.php" method="post">
        Enter the key words here:<input type="search" name="search1" id="search1"/>
        <select id="selection" name="selection">
            <option value="ISBN">ISBN</option>
            <option value="Title">Title</option>
            <option value="Author">Author</option>
            <option value="Edition">Edition</option>
            <option value="Grade">Grade</option>
            <option value="Course">Course</option>
            <option value="Major">Major</option>
            <option value="Seller">Seller</option>
        </select>
        <input type="submit" value="search" onclick="return check_content()">
    </form>
</div>
</body>
<script>
    function check_content(){
        var content = document.getElementById("search1").value;
        if(content === ""){
            alert("Please enter the content to search");
            return false;
        }
    }
</script>

<?php
