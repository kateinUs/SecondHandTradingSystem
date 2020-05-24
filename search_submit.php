<?php
include "db_util.php";
session_start();
header("Content-Type: text/html; charset=utf-8");
if(isset($_SESSION["Login_status"])&&$_SESSION["Login_status"] == "OK"){
    $con = mysqli_connect("localhost","zhanghui","passward");
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con, $dbname);
    mysqli_query($con,"set names 'utf8'");

    $count=0;
    $selection=$_POST["selection"];
    $sql="SELECT $selection FROM Book_List;";
    $result=$con->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_POST["search1"] == $row[$selection]){
                echo "<script language=\"JavaScript\">alert(\"Result Found.\");</script>";
                echo "<table style='border: solid 1px black;'>";
                echo "<tr><th>Seller</th><th>ISBN</th><th>Title</th><th>Author</th><th>Edition</th><th>Grade</th><th>Course</th><th>Major</th><th>On_Sell</th></tr>";

                class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current() {
                        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                    }

                    function beginChildren() {
                        echo "<tr>";
                    }

                    function endChildren() {
                        echo "</tr>" . "\n";
                    }
                }

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $psd);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT Seller, ISBN, Title, Author, Edition, Grade, Course, Major, On_Sell FROM Book_List");
                    $stmt->execute();

                    $result1 = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";
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
else{
    echo "<script language=\"JavaScript\">alert(\"Please login first!\");</script>";
    echo "<meta http-equiv='Refresh' content='1;URL=Login.php'>";
}
