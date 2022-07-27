<?php
$id = $_GET['deletecartid'];

include('config.php');

$sql = "DELETE FROM food WHERE food_id=$id";

if (mysqli_query($con, $sql)) {
    echo ("<script>
            window.alert('Data Deleted successfully');
            window.location.href='food.php';
            </script>");
} else {
    die("not deleted" . mysqli_error($con));
}
?>