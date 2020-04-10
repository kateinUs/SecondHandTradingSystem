<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
if(isset($_SESSION["Login_status"])&&$_SESSION["Login_status"] == "OK"){
    $con = mysqli_connect("localhost","Second_Hand","pStjGTc347FDjfZW");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, Second_Hand);
    mysqli_query($con,"set names 'utf8'");

    $count=0;
    $selection=$_POST["selection"];
    $sql="SELECT $selection FROM Book_List;";
    $result=$con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_POST["search1"] == $row[$selection]){
                echo "Result found.";
                $count++;
            }
        }
        if($count==0){
            echo "<script language=\"JavaScript\">alert(\"No result found. Return to the search page.\");</script>";
            echo "<script>history.go(-1)</script>";
        }
    } else {
        echo "0 result";
    }

    mysqli_close($con);
}
else
    echo "<script language=\"JavaScript\">alert(\"Please login first!\");</script>";
    echo "<meta http-equiv='Refresh' content='1;URL=Login.php'>";
