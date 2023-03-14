<?php 

    define("host", "Localhost");
    define("user", "root");
    define("pwd", "");
    define("dbname", "aukcio");

        $con = mysqli_connect(host,user,pwd,dbname);
        mysqli_query($con, "SET NAMES utf8");
        
?>

