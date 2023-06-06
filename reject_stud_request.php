<?php
            include("connection.php");
            $mod_club_temp = $_POST['mod_club_temp'];
            $prn = $_POST['prn'];

            $query = "DELETE FROM requests WHERE club_name = '$mod_club_temp' AND prn='$prn'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "success";
                header("location:homepage.php");
            } else {
                echo "error";
                header("location:homepage.php");
            }
?>