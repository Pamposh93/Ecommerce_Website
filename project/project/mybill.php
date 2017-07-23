<?php session_start(); 
if(isset($_SESSION["sesemailid"])==false)
{
	header("location: index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body {
    margin: 0;
	padding: 0;
}
.outer
{
  min-height:600px; overflow:hidden;
  background-image:url(images/log.jpg);
  margin-right: auto; margin-left: auto; width: 1200px;
}
.textst
{
	font-family: Verdana, Geneva, sans-serif; font-size:15px;
	font-weight: 700;
}
.button
{
	font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700; border-width:2px; border-color: black; border-style:solid; background-color:black; color:yellow;
}
.textst2
{
	font-family: Verdana, Geneva, sans-serif; font-size:20px;
	font-weight: 700;
}
.textst3
{
	font-family: Verdana, Geneva, sans-serif; font-size:13px;
	font-weight: 700;
}
.textstcat
{
	font-family: Verdana, Geneva, sans-serif; font-size:20px;
	font-weight: 700;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eZe Shopping.com - Planet's Best Shopping portal</title>
</head>

<body bgcolor="black">
<div class="outer">
	<div style="width: 1200px; height: 100px;">
    	<div style="width: 200px; height: 100px; float: left;">
        <a href="index.php"><img src="images/log.jpg"/></a>
        </div>
        
        <div style="width: 1000px; height: 100px; float: right;">
        	<div style="width: 1000px; height: 50px;">
            	<div style="float: right; width: 350px;background-color:yellow
            	; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
                <?php
				//check if session is created or not
				if(isset($_SESSION["sesemailid"])==false)
				{
				?>
            		<span class="textst2"><a href="login.php">Login</a> | <a href="signup.php">Sign Up</a>&nbsp;</span>
                <?php
				}
				else
				{
					?>
                    <span class="textst3">Welcome <?php echo($_SESSION["sesemailid"]); ?> ! | <a href="logout.php">Logout</a>&nbsp;</span>
                    <?php
				}
				?>
                  </div>
            </div>
            
            <div  style="width: 1000px; height: 50px; ">
				<div style="float: right; width: 350px;background-color:yellow; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
            	<span class="textst2"><a href="mybill.php">My Bill</a> | <a href="history.php">History</a>&nbsp;</span>
           	 	</div>
            </div>
        </div>
    </div>
    
    <div style="width: 1200px; min-height: 475px;  overflow:hidden;">
    	
        <div style="width: 200px; min-height: 475px; float:left;  overflow:hidden;" >
        	<div style="padding-left:10px; padding-right: 10px; padding-top:20px; padding-bottom: 20px; background-color:yellow; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">
            
            <span class="textstcat">
            <i>Categories:</i>
            <br/><br/>
            
            <?php
			include("DBConnect.inc");
			$obj = new DBConnect();
			$resultset = $obj->SELECT_DisplayAll("SELECT catid, catname FROM categorytab ORDER BY catname;");
			while(($row = mysql_fetch_array($resultset))!=null)
			{
				$catid=$row[0];
				$catname=$row[1];
				echo("<a href='showproducts.php?catid=$catid&catname=$catname'>$catname</a><br/><br/>");
			}
			?>
            
            </span>
            
            </div>
        </div>
        <div style="width: 980px; min-height: 475px;  overflow:hidden; float:right; padding-left: 10px; padding-right: 10px;">
        <center><span style="background-color:lime; text-align:center; font-family: Verdana, Geneva, sans-serif; font-size:20px;font-weight: 700; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">My Bill</span></center><br/>
        
        
        <div style="width: 850px; height:400px; background-color: yellow; zoom: 1; filter: alpha(opacity=90); opacity: 0.9;  margin-right: auto; margin-left: auto;" >
            
           <table cellpadding="0" cellspacing="0" border="1" style="width:inherit; height:inherit; font-family: Verdana, Geneva, sans-serif; font-size:11px;font-weight: 700;">
           	<tr>
            	<th colspan="5" align="center">
                	Your Cart
                </th>
            </tr>
            <tr>
            	<th>Product ID</th>
                <th>Brand Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Per Unit (In Rs.)</th>
            </tr>
            <?php
			$arr = $_SESSION["sescartarray"];
			$totprods = $_SESSION["sestotalproducts"];
			if($totprods==0)
			{
				?>
                <tr>
    	        	<th>NA</th>
                	<th>NA</th>
	                <th>NA</th>
                	<th>NA</th>
                	<th>NA</th>
	            </tr>
                <?php
			}
			else
			{
				for($i=0 ; $i<count($arr); $i++)
				{
					
						?>
                        <tr>
    	        			<th><?php echo($arr[$i][0]); ?></th>
		                	<th><?php echo($arr[$i][1]); ?></th>
	    		            <th><?php echo($arr[$i][2]); ?></th>
                			<th><?php echo($arr[$i][3]); ?></th>
		                	<th><?php echo($arr[$i][4]); ?></th>
	    			    </tr>
                        <?php
					
				}
			}
			?>
            <tr>
            	<th colspan="5">
                <a href="generatebill.php">Click here to Generate Bill</a>
                </th>
            </tr>
           </table>
            
            </div>
        
        
        </div>
        
        
    </div>
    
    <div style="width: 1200px; height: 25px; margin: 0; padding: 0;">
    	<div style="width:400px; height:auto; background-color:yellow; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:center; margin-right: auto; margin-left: auto;">
        <span class="textst">About Us | Terms & Conditions | Admin Login</span>
        </div>
    </div>
</div>
</body>
</html>