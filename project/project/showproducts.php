<?php session_start(); 
if(isset($_GET["catid"])==false)
{
	header("Location: index.php");
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
            	<div style="float: right; width: 350px;background-color:yellow; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
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
        <center><span style="background-color:cyan; text-align:center; font-family: Verdana, Geneva, sans-serif; font-size:20px;font-weight: 700; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">Products of "<?php echo($_GET['catname']); ?>"</span></center><br/>
        
        <?php
		
		$obj = new DBConnect();
		$res = $obj->SELECT_DisplayAll("SELECT COUNT(*) FROM producttab WHERE catid=".$_GET["catid"].";");
		$row0 = mysql_fetch_array($res);
		$totalrecords = $row0[0];
		$resultset = $obj->SELECT_DisplayAll("SELECT * FROM producttab WHERE catid=".$_GET["catid"]." ORDER BY prodname;");
		$counter = 0;
		
		while(($row = mysql_fetch_array($resultset))!=null)
		{
			$counter=$counter+1;
			if($counter > $totalrecords)
			{
				break;
			}
			
			?>
            <div style="width:300px; height: 175px; background-color: cyan; zoom: 1; filter: alpha(opacity=90); opacity: 0.9; float: left; font-family: Verdana, Geneva, sans-serif; font-size:14px;">
            	<?php
				$prodid = $row["prodid"];
				$prodname=$row["prodname"];
				$brand=$row["brand"];
				$unittype=$row["unittype"];
				$quantity=$row["quantity"];
				$priceperunit=$row["priceperunit"];
				$picturepath=$row["picturepath"];
				
				echo("<table border=0>");
				echo("<tr>");
				echo("<td width=125px>");
				echo("<img width=125px height=125px src=".$picturepath." />");
				echo("</td>");
				echo("<td>");
				echo("<i>Brand</i>: $brand<br/>");
				echo("<i>Product</i>: $prodname<br/>");
				echo("<i>Price</i>: Rs. $priceperunit /-<br/>");
				echo("</td>");
				echo("</tr>");
				echo("<tr>");
				echo("<td colspan=2 align=center>");
				if(isset($_SESSION["sesemailid"])==true)
				{
					echo("<a href='addtocart.php?prodid=$prodid&prodname=$prodname&brand=$brand&pic=$picturepath&price=$priceperunit' style='background-color: orange; color: black; text-decoration: none; font-weight: 700;'>Add To Cart</a>");
				}
				else
				{
					echo("<a href=# style='background-color: yellow; color: black; text-decoration: none; font-weight: 700;'>You Must Log In to Add Item to Cart</a>");
				}
				echo("</td>");
				echo("</tr>");
				echo("</table>");
				
				?>
                
                
    	    </div>          
            
            <?php
			if($counter%3!=0)
			{
				?>
                <div style="width: 40px; height: 200px; float:left;">
	            </div>
                <?php
			}
			else
			{
				?>
            	<div style="width:980px; height: 15px; float:left;">
	            </div>    
                <?php
			}

		}
		?>
        
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