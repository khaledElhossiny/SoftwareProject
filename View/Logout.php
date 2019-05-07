<?php
if (session_id() == ''){
	session_start();
}
if($_SESSION['ID']=="")
{
header("Location:../View/Login.php");
}
function logout()
{
	session_destroy();
	header("Location:../View/Login.php");
	exit(); //stops the current php script
}

logout();
?>