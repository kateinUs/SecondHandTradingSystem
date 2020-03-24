<?php
header("Content-Type: text/html; charset=utf-8");// 编码为中文
$con = mysqli_connect("localhost","Second_Hand","pStjGTc347FDjfZW");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, Second_Hand);
mysqli_query($con,"set names 'utf8'");  //设置phpmyadmin数据库表编码为中文

$sql="SELECT email, password FROM Admin_Login;";
$result=$con->query($sql);
$count=0;
if (!mysqli_query($con,$sql))   //如果链接失败
{
    die('Error: ' . mysqli_error($con));
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($_POST['email'] == $row["email"] && $_POST['password'] == $row["password"]){
            echo "Welcome back, Administer.";
            session_start();
            $_SESSION["Login_status"] = "OK";
            $count++;
            echo "<meta http-equiv='Refresh' content='1;URL=Main.php'>";
        }
    }
    if($count==0)
        echo "Please enter the correct username or password.";
} else {
    echo "0 result";
}

mysqli_close($con);