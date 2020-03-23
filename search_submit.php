<?php
session_start();
header("Content-Type: text/html; charset=utf-8");// 编码为中文
if(isset($_SESSION["Login_status"])&&$_SESSION["Login_status"] == "OK"){
    $con = mysqli_connect("localhost","Second_Hand","pStjGTc347FDjfZW");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, Second_Hand);
    mysqli_query($con,"set names 'utf8'");  //设置phpmyadmin数据库表编码为中文

    $count=0;
    $selection=$_POST["selection"];
    $sql="SELECT $selection FROM Book_List;";
    $result=$con->query($sql);

    if (!mysqli_query($con,$sql))   //如果链接失败
    {
        die('Error: ' . mysqli_error($con));
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_POST["search1"] == $row[$selection]){
                echo "Result found.";
                $count++;
//                echo "<meta http-equiv='Refresh' content='3;URL=Login.html'>";
            }
        }
        if($count==0){
            echo "<script language=\"JavaScript\">alert(\"No result found. Return to the search page.\");</script>";
            echo "<meta http-equiv='Refresh' content='1;URL=Search.php'>";
        }
    } else {
        echo "0 result";
    }

    mysqli_close($con);
}
else
    echo "<script language=\"JavaScript\">alert(\"Please login first!\");</script>";
    echo "<meta http-equiv='Refresh' content='1;URL=Login.php'>";
