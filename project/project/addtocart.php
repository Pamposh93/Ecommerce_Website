<?php session_start(); 
if(isset($_GET["prodid"])==false)
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
	font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700; border-width:2px; border-color: black; border-style:solid; background-color:black; color:cyan;
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
            	<div style="float: right; width: 350px;background-color:cyan; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
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
				<div style="float: right; width: 350px;background-color:cyan; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
            	<span class="textst2"><a href="mybill.php">My Bill</a> | <a href="history.php">History</a>&nbsp;</span>
           	 	</div>
            </div>
        </div>
    </div>
    
    <div style="width: 1200px; min-height: 475px;  overflow:hidden;">
    	
        <div style="width: 200px; min-height: 475px; float:left;  overflow:hidden;" >
        	<div style="padding-left:10px; padding-right: 10px; padding-top:20px; padding-bottom: 20px; background-color:cyan; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">
            
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
        <center><span style="background-color:cyan; text-align:center; font-family: Verdana, Geneva, sans-serif; font-size:20px;font-weight: 700; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">Add Item To Cart</span></center><br/>
        
        
        <div style="width: 350px; height:350px; background-color: cyan; zoom: 1; filter: alpha(opacity=90); opacity: 0.9;  margin-right: auto; margin-left: auto;" >
            
            <table style="font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700;" cellspacing="4px">
            	<form id="addtocart" action="" method="post">
            	<tr>
                	<td>Prod ID: </td>
                    <td><input type="text" name="prodid" readonly="readonly" class="textbox" value="<?php echo($_GET["prodid"]); ?>"/></td>
                </tr>
                <tr>
                	<td>Brand Name: </td>
                    <td><input type="text" name="brand" readonly="readonly" class="textbox" value="<?php echo($_GET["brand"]); ?>"/></td>
                </tr>
                <tr>
                	<td>Product Name: </td>
                    <td><input type="text" name="product" readonly="readonly" class="textbox" value="<?php echo($_GET["prodname"]); ?>"/></td>
                </tr>
                <tr>
                	<td>Product Price (per unit, in Rs.): </td>
                    <td><input type="text" name="price" readonly="readonly" class="textbox" value="<?php echo($_GET["price"]); ?>"/></td>
                </tr>
                <tr>
                	<td>Select Quantity: </td>
                    <td>
                    	<select name="quantity">
                        	<option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    <img width="120px" height="100px" src="<?php echo($_GET["pic"]); ?>"/>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    <input type="submit" name="btnsub" value="Add to Cart" class="button"/>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    <?php
					if(isset($_POST["btnsub"])==true)
					{
						
						

						$prodid=$_POST["prodid"];
						$brand=$_POST["brand"];
						$prodnm=$_POST["product"];
						$qty=$_POST["quantity"];
						$price=$_POST["price"];
						
						$arr = $_SESSION["sescartarray"];
						$x=$_SESSION["sestotalproducts"];
						$arr[$x][0] = $prodid;
						$arr[$x][1] = $brand;
						$arr[$x][2] = $prodnm;
						$arr[$x][3] = $qty;
						$arr[$x][4] = $price;
						$_SESSION["sescartarray"] = $arr;
						$_SESSION["sestotalproducts"] = $_SESSION["sestotalproducts"] + 1;
						echo("Product Added To Cart! Click on My bill to checkout!");
					}
					?>
                    </td>
                </tr>
                </form>
            </table>
            
            </div>
        
        
        </div>
        
        
    </div>
    
    <div style="width: 1200px; height: 25px; margin: 0; padding: 0;">
    	<div style="width:400px; height:auto; background-color:cyan; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:center; margin-right: auto; margin-left: auto;">
        <span class="textst">About Us | Terms & Conditions | Admin Login</span>
        </div>
    </div>
</div>
</body>
</html>