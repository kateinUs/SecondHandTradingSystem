<?php
header("Content-Type: text/html; charset=utf-8");// 编码为中文
$con = mysqli_connect("localhost","XXXXXXXXXX","XXXXXXXXXX");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, www_sybmxt_club);
mysqli_query($con,"set names 'utf8'");  //设置phpmyadmin数据库表编码为中文

$sql="SELECT name, password FROM admin_info;";
$result=$con->query($sql);

if (!mysqli_query($con,$sql))   //如果链接失败
{
    die('Error: ' . mysqli_error($con));
}
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($_POST['username'] == $row["name"] && $_POST['password'] == $row["password"]){
            echo "Welcome back";
            session_start();
            $_SESSION["Login_status"] = "OK";
        }
        else{
            echo "Please enter the correct username or password";
        }
    }
} else {
    echo "0 result";
}

mysqli_close($con);