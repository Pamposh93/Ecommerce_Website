<html>
<body>
<form method="post">
<input type="submit" name="btn"/>
</form>
<?php
if(isset($_POST["btn"]))
{
	header("location: test2.php");	
}
?>
</body>
</html>