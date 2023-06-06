<?php
            include("connection.php");
            $club_id = $_POST['club_id'];

            $query = "DELETE FROM clubs WHERE club_id = '$club_id'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "success";
                header("location:admin.php");
            } else {
                echo "error";
                header("location:admin.php");
            }
?>