<?php
header("Content-Type: text/html; charset=utf-8");// 编码为中文
$con = mysqli_connect("localhost","Second_Hand","pStjGTc347FDjfZW");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, Second_Hand);
mysqli_query($con,"set names 'utf8'");  //设置phpmyadmin数据库表编码为中文

$sql = "INSERT INTO Users_list (email, password)
VALUES ('$_POST[email]','$_POST[password]')";

if (!mysqli_query($con,$sql))   //如果链接失败
{
    die('Error: ' . mysqli_error($con));
}
if ($con->query($sql) === TRUE) {
    echo "successfully registered.";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();