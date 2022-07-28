<?php
session_start();
if (!($_SESSION['user'])) {
header ("Location: ../login.php");
}
else{
    echo "welcome to checkout" ." ".$_SESSION['user'];
}

?>