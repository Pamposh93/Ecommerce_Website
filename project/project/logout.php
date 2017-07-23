<?php
session_start();
//check if session is created or not
if(isset($_SESSION["sesemailid"])==false)
{
	header("Location: login.php");
}
else
{
	session_destroy();
	header("Location: index.php");
}
?>