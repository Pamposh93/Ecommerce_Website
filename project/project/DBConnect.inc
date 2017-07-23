<?php
class DBConnect
{
public function SELECT_DisplayAll($query)
{
	$convar = mysql_connect("localhost","root","");
	if($convar == false)
		{
		die("Connection with MYSql Failed!");
		}
	
	$dbvar = mysql_select_db("ezeshopping",$convar);
	if($dbvar == false)
		{
		die("Connection with DB Failed!");
		}

	$queryvar = mysql_query($query,$convar);
	if($queryvar == false)
		{
		die("Passing of query Failed!");
		}
	
	return $queryvar;
}
public function SELECT_Verify($query)
	{
	$convar = mysql_connect("localhost","root","");
	if($convar == false)
		{
		die("Connection with MYSql Failed!");
		}
	
	$dbvar = mysql_select_db("ezeshopping",$convar);
	if($dbvar == false)
		{
		die("Connection with DB Failed!");
		}

	$queryvar = mysql_query($query,$convar);
	if($queryvar == false)
		{
		die("Passing of query Failed!");
		}
	//check the no. of rows of the resultset
	$numr =mysql_num_rows($queryvar);	
	
	return $numr;
	}
public function DMLExecuter($query)
	{
	$convar = mysql_connect("localhost","root","");
	if($convar == false)
		{
		die("Connection with MYSql Failed!");
		}
	$dbvar = mysql_select_db("ezeshopping",$convar);
	if($dbvar == false)
		{
		die("Connection with DB Failed!");
		}
	$queryvar = mysql_query($query,$convar);
	if($queryvar == false)
		{
		die("Passing of query Failed!");
		}
	$ra = mysql_affected_rows();
	return $ra;
	}
}
?>