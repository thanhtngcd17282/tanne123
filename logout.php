<?php
if(!isset($_SESSION)) session_start();

$_SESSION["isLogin"] = false;
$_SESSION["user"] = null;
echo '<script language="javascript">';
echo 'alert("Logout success")';
echo '</script>';
header('Location: index.php');

?>