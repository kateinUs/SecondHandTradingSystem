<?php
include "db_util.php";
header("Content-Type: text/html; charset=utf-8");

if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, $dbname);
mysqli_query($con,"set names 'utf8'");

$sql1="SELECT * FROM Users_list WHERE email='$_POST[email]'";
$result1=mysqli_query($con,$sql1);
$num1=mysqli_num_rows($result1);
if($num1 >=1){
    echo "<script language=\"JavaScript\">alert(\"You have registered once, please don't submit twice!\");window.location.href='Register.php';</script>";
}

$sql = "INSERT INTO Users_list (email, password)
VALUES ('$_POST[email]','$_POST[password]')";

if ($con->query($sql) === TRUE) {
    echo "successfully registered. Please login.";
    echo "<script>window.location.href='Login.php'</script>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();