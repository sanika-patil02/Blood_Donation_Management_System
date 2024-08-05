<?php
session_start();
session_destroy(); 
$SESSION['']="";

header("Location: ../index.php")
?>