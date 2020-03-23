<?php
header("Content-Type: text/html; charset=utf-8");// 编码为中文
session_start();
if(isset($_SESSION["Login_status"])&&["Login_status"] == "OK"){
    $con = mysqli_connect("localhost","Second_Hand","pStjGTc347FDjfZW");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, Second_Hand);
    mysqli_query($con,"set names 'utf8'");  //设置phpmyadmin数据库表编码为中文

    $selection=$_POST["selection"];
    $sql="SELECT $selection FROM Book_List;";
    $result=$con->query($sql);

    if (!mysqli_query($con,$sql))   //如果链接失败
    {
        die('Error: ' . mysqli_error($con));
    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_POST['username'] == $row["name"] && $_POST['password'] == $row["password"]){
                echo "欢迎回来，尊敬的管理员，将在三秒后跳转到管理员管理界面.";
                echo "<meta http-equiv='Refresh' content='3;URL=Login.html'>";
            }
            else{
                echo "抱歉，您不是管理员，请联系管理员来获取相关数据!";
            }
        }
    } else {
        echo "0 结果";
    }

    mysqli_close($con);
}
else
    echo "<script language=\"JavaScript\">alert(\"Please login first!\");</script>";
