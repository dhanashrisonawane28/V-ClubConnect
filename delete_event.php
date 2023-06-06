<?php
            include("connection.php");
            $Event_name = $_POST['Event_name'];

            $query = "DELETE FROM event_details WHERE Event_name = '$Event_name'";
            $result = mysqli_query($con, $query);

            if ($result) {
                echo "success";
                header("location:admin.php");
            } else {
                echo "error";
                header("location:admin.php");
            }
?>