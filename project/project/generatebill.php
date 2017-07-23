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
  background-image:url(images/ezeshoppingback2.jpg);
  margin-right: auto; margin-left: auto; width: 1200px;
}
.textst
{
	font-family: Verdana, Geneva, sans-serif; font-size:15px;
	font-weight: 700;
}
.button
{
	font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700; border-width:2px; border-color: black; border-style:solid; background-color:black; color:orange;
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
        <a href="index.php"><img src="images/logo.png"/></a>
        </div>
        
        <div style="width: 1000px; height: 100px; float: right;">
        	<div style="width: 1000px; height: 50px;">
            	<div style="float: right; width: 350px;background-color:orange; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
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
				<div style="float: right; width: 350px;background-color:orange; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:right">
            	<span class="textst2"><a href="mybill.php">My Bill</a> | <a href="history.php">History</a>&nbsp;</span>
           	 	</div>
            </div>
        </div>
    </div>
    
    <div style="width: 1200px; min-height: 475px;  overflow:hidden;">
    	
        <div style="width: 200px; min-height: 475px; float:left;  overflow:hidden;" >
        	
        </div>
        <div style="width: 980px; min-height: 475px;  overflow:hidden; float:right; padding-left: 10px; padding-right: 10px;">
        <center><span style="background-color:lime; text-align:center; font-family: Verdana, Geneva, sans-serif; font-size:20px;font-weight: 700; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">Your Final Bill</span></center><br/>
        
        
        <div style="width: 850px; height:400px; background-color: orange; zoom: 1; filter: alpha(opacity=90); opacity: 0.9;  margin-right: auto; margin-left: auto;" >
            
           <table cellpadding="0" cellspacing="0" border="1" style="width:inherit; height:inherit; font-family: Verdana, Geneva, sans-serif; font-size:11px;font-weight: 700;">
           	<tr>
            	<th colspan="6" align="center">
                
                <?php
				include("DBConnect.inc");
				$obj = new DBConnect();
				$emailid = $_SESSION["sesemailid"];
				$resultset = $obj->SELECT_DisplayAll("SELECT fullname, address, loyaltycategory FROM customertab WHERE emailid='".$emailid."';");
				$row = mysql_fetch_array($resultset);
				$date = date('Y-m-d'); 
				$fullname = $row[0];
				$addr = $row[1];
				$loycat=$row[2];
				$day = date('l', strtotime($date));
				$thursbrands = array("MTR","Britannia","Amul","Dabur","Mothers Recipe","Cadbury","Tata","Taj Mahal","Maggie","Pepsi","Pantene","Garnier","Dove","Lux","Axe","Kissan","Aashirwad","LOreal","Haldiram","Choco Fantasy","Kelloggs","Priyagold","Tops","Pillsbury");
				?>
                Date: <?php echo($day.", ".date('Y-m-d')); ?><br/>
                Username: <?php echo($_SESSION["sesemailid"]); ?> | Full Name : <?php echo($row[0]); ?> <br/> Address: <?php echo($row[1]); ?>| Loyalty Category: <?php echo($row[2]); ?> 
                
                
                </th>
            </tr>
            <tr>
            	<th>Product ID</th>
                <th>Brand Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price Per Unit (In Rs.)</th>
                <th>Thursday Discount</th>
            </tr>
            <?php
			$arr = $_SESSION["sescartarray"];
			$totprods = $_SESSION["sestotalproducts"];
			$desc="";
			$disarr=array();
			if($totprods==0)
			{
				?>
                <tr>
    	        	<th>NA</th>
                	<th>NA</th>
	                <th>NA</th>
                	<th>NA</th>
                	<th>NA</th>
                    <th></th>
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
                            <th>
                            <?php
							$br=$arr[$i][1];
							$pn=$arr[$i][2];
							$q=$arr[$i][3];
							$desc=$desc."Product: $br $pn, Quantity: $q.<br/>";
							if($day=="Thursday" && in_array($arr[$i][1],$thursbrands)==true)
							{
								echo ("10%");
								$disarr[$i]=10;
							}
							else
							{
								echo("0%");
								$disarr[$i]=0;
							}
							?>
                            </th>
	    			    </tr>
                        <?php
					
				}
			}
			?>
            <tr>
            	<th colspan="6">
                Total Amount: Rs. 
                <?php
				$totamt=0;
				for($i=0 ; $i<count($arr); $i++)
				{
					$totamt=$totamt+($arr[$i][4]*$arr[$i][3] - ($arr[$i][4]*$arr[$i][3]) * $disarr[$i] / 100);
				}
				echo ($totamt." /-");
				?>
                 <br/>- Loyalty Discount: Rs. 
                 <?php
				 $disamt=0;
				 if($totamt >= 1000)
				 {
					if($row[2]=="Silver")
					{
						$disamt=$totamt * 0.05;
					}
					elseif($row[2]=="Golden")
					{
						$disamt=$totamt * 0.1;
					}
					elseif($row[2]=="Platinum")
					{
						$disamt=$totamt * 0.2;
					}
					elseif($row[2]=="Fresh")
					{
						$disamt=$totamt * 0.02;
					}
				 }
				 else
				 {
					 $disamt = 0;
				 }
				 echo ($disamt." /-");
				 $netpayable=$totamt-$disamt;
				 ?>
                 <br/>
                 Net Payable Amount at the time of Delivery is Rs. <?php echo($netpayable); ?> /-
                 <?php
				 $dt = date('Y-m-d');
				 
				 $queryorder="INSERT INTO OrderHistoryTab (dt,emailid,orderdesc,totalamt,loyaltydiscount,netpayableamt) VALUES('$dt','$emailid','$desc',$totamt,$disamt,$netpayable);";
				 $obj2=new DBConnect();
				 $ra = $obj2->DMLExecuter($queryorder);
				 
				 $_SESSION["sestotalproducts"]=0;
				 $_SESSION["sescartarray"]=array();
				 
				 ?>
                 <form method="post">
                 	<input type="submit" name="btngeneratexml" value="Generate & Download XML file" class="button"/>
                 </form>
                 <?php
				 if(isset($_POST["btngeneratexml"]))
				 {
					 $xmlarr=array();
					 $xmlarr["date"] = $dt;
					 $xmlarr["emailid"] = $emailid;
					 $xmlarr["fullname"] = $fullname;
					 $xmlarr["address"] = $addr;
					 $xmlarr["loyaltycat"] = $loycat;
					 $xmlarr["orderdesc"] = $desc;
					 $xmlarr["netpayableamt"] = $netpayable;
					 $_SESSION["sesxmlarr"] = $xmlarr;
					 header("location: downloadxml.php");
				 }
				 ?>
                </th>
            </tr>
           </table>
            
            </div>
        
        
        </div>
        
        
    </div>
    
    <div style="width: 1200px; height: 25px; margin: 0; padding: 0;">
    	<div style="width:400px; height:auto; background-color:orange; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:center; margin-right: auto; margin-left: auto;">
        <span class="textst">About Us | Terms & Conditions | Admin Login</span>
        </div>
    </div>
</div>
</body>
</html>