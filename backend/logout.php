<?php
session_start();
session_destroy();
header("Location: ../public/verification/login.php");
?>