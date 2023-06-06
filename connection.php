<?php
$servername = "localhost";
        $username = "root";
        $password = "";
        $database = "clubnew";
        $con = mysqli_connect($servername,$username,$password,$database);
        if(!$con){
            die("Error connecting ".mysqli_error($con));
        }
      
?>