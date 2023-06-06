<?php
            include("connection.php");
            $moderator_name = $_POST['moderator_name'];

            $query = "DELETE FROM moderator_info WHERE moderator_name = '$moderator_name'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "success";
                header("location:admin.php");
            } else {
                echo "error";
                header("location:admin.php");
            }
?>