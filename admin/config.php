<?php
$con = mysqli_connect("localhost", "root", "", "food_order");

if (!$con) {
    die("connection failed" . mysqli_connect_error());
}
