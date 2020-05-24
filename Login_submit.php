<?php
include "db_util.php";
header("Content-Type: text/html; charset=utf-8");
//$con = mysqli_connect("localhost","zhanghui","passward");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, $dbname);
mysqli_query($con,"set names 'utf8'");

$sql="SELECT email, password FROM Users_list;";
$result=$con->query($sql);
$count=0;

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($_POST['email'] == $row["email"] && $_POST['password'] == $row["password"]){
            echo "Welcome back.";
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