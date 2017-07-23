<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
body {
    margin: 0;
	padding: 0;
}
.textbox
{
	font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700; border-width:2px; border-color: black; border-style:solid;
}
.button
{
	font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700; border-width:2px; border-color: black; border-style:solid; background-color:white; color:yellow;
}
.outer
{
  height:600px;
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
.textstcat
{
	font-family: Verdana, Geneva, sans-serif; font-size:20px;
	font-weight: 700;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eZe Shopping.com - Planet's Best Shopping portal</title>
</head>

<body bgcolor="white">
<div class="outer">
	<div style="width: 1200px; height: 100px;">
    	<div style="width: 200px; height: 100px; float: left;">
        <a href="index.php"><img src="images/logo.png"/></a>
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
					header("Location: index.php");
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
    
    <div style="width: 1200px; height: 475px;">
    	
        <div style="width: 200px; height: 475px; float:left;" >
        	
        </div>
        <div style="width: 980px; height: 475px; float:right; padding-left: 10px; padding-right: 10px; margin: 0; padding: 0;">
        <center><span style="background-color:lime; text-align:center; font-family: Verdana, Geneva, sans-serif; font-size:20px;font-weight: 700; zoom: 1; filter: alpha(opacity=80); opacity: 0.8;">New User - Sign Up</span></center><br/>
        
	        <div style="width: 600px; height:350px; background-color: yellow; zoom: 1; filter: alpha(opacity=90); opacity: 0.9;  margin-right: auto; margin-left: auto;" >
            
            <table style="font-family: Verdana, Geneva, sans-serif; font-size:15px;font-weight: 700;" cellspacing="4px">
            	<form id="signup" action="" method="post">
            	<tr>
                	<td>Enter Email Address (username): </td>
                    <td><input type="text" name="email" class="textbox"/></td>
                </tr>
                <tr>
                	<td>Enter Full Name: </td>
                    <td><input type="text" name="fullname" class="textbox"/></td>
                </tr>
                <tr>
                	<td>Enter Password: </td>
                    <td><input type="password" name="password" class="textbox"/></td>
                </tr>
                <tr>
                	<td>Re-Enter Password: </td>
                    <td><input type="password" name="repassword" class="textbox"/></td>
                </tr>
                <tr>
                	<td>Enter Full Address: </td>
                    <td><textarea name="address" rows="5" class="textbox"></textarea></td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    <input type="submit" name="btnsub" value="Sign Up" class="button"/>
                    </td>
                </tr>
                <tr>
                	<td colspan="2" align="center">
                    <?php
					if(isset($_POST["btnsub"])==true)
					{
						
						include("DBConnect.inc");

						$emailid = $_POST["email"];
						$password = $_POST["password"];
						$fullname = $_POST["fullname"];
						$address = $_POST["address"];
						$doj = date('Y-m-d');
						$loyaltycategory = "Fresh";
						
						$query="INSERT INTO customertab (emailid,password,fullname,address, doj, loyaltycategory) VALUES('$emailid', '$password', '$fullname', '$address', '$doj', '$loyaltycategory');";
						
						$obj = new DBConnect();
						$ra = $obj->DMLExecuter($query);
						
						if($ra>0)
						{
							echo ("You are Signed Up as a new user!");
						}
						else
						{
							echo ("Problem occurred in Sign Up!");
						}
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
    	<div style="width:400px; height:auto; background-color:yellow; zoom: 1; filter: alpha(opacity=80); opacity: 0.8; text-align:center; margin-right: auto; margin-left: auto;">
        //<span class="textst">About Us | Terms & Conditions | Admin Login</span>
        </div>
    </div>
</div>
</body>
</html>