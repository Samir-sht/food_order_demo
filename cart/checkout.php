<?php
session_start();
if (!($_SESSION['loggedin'])== 'true') {
header ("Location: ../login.php");
}
else{
    echo "welcome to checkout" ." ".$_SESSION['user'];
}

?>