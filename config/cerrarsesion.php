<?php
session_start();
session_destroy();
header("location: ../modulo/login.php");

?>