<?php
//config dibutuhkan karena pada page redirect ini membutuhkan fungsi 
//session_start() yang ada dalam file config.php
include_once "../_config/config.php";
echo "<script> window.location='data.php';</script>";
?>