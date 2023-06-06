<?php
            include("connection.php");
            $prn = $_POST['prn'];
            $club_name = $_POST['club_name'];
            $stud_name = $_POST['stud_name'];
            $request_date = $_POST['request_date'];
            

            $query = "DELETE FROM requests WHERE prn = '$prn' AND club_name = '$club_name'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "success";
                header("location:homepage.php");
            } else {
                echo "error";
                header("location:homepage.php");
            }

           

            $query1 = "INSERT INTO members(club_name,stud_name,prn,request_date) VALUES('$club_name','$stud_name','$prn','$request_date')";
            $result = mysqli_query($con, $query1);

            if ($result) {
                echo "success";
                header("location:homepage.php");
            } else {
                echo "error";
                header("location:homepage.php");
            }
?>