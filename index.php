<?php
session_start();                   // Session starting for Login Page
if(empty($_SESSION['email']))      // Checking if the 'email' key is present in the '$_SESSTIONS' array and if it is empty or not    
{

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">     <!--  doctype html public is part of format which is used to define DTD (Document type defination) -->    
<html xmlns="http://www.w3.org/1999/xhtml">                              <!--  specifies the xml namespace for a document --> 
<head>
    <link rel="stylesheet" type="text/css" href="CSS.css">               <!--  Addressing the style sheet of CSS -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">         <!--this link in your head of the html file, and use a font awesome link for an icon.-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> 
    <link rel="Website Icon" type="png" href="logo.png">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />             <!--  Meta data about HTML document -->    
  <style>
<style>
	body
	{
		background-image:url(bg1.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	} 
  marquee{
      font-size: 20px;
      font-weight: 40;
      color: black;
      font-family: 'Times new Roman';
      /* margin: 68px 0; */
      }        
  .tab {
            display: inline-block;
            margin-left: 310px;
        }
     
</style>
<title>Students Project Management System</title>
</head>
<div>             <!-- div - Division or section -->    
<body>
<table width="100%"  cellspacing="00" cellpadding="00">
  <tr bgcolor="green">
    <th width="7%" scope="col">&nbsp;</th>
    <th width="10%" scope="col"><img src="logo.png" alt="LOGO" width="120" height="120" /></th>
    <th width="66%" scope="col"><font size="8" color="White">Students Project Managenent System</font></th>
    <!-- <th width="13%" scope="col"><font size="5" color="White">&nbsp;</font></th> -->
    <th width="10%" scope="col"><img src="logo.png" alt="LOGO" width="120" height="120"/></th>
    <th width="7%" scope="col">&nbsp;</th>
  <tr>
    <td>&nbsp;</td>         <!-- Non-Breaking space -->  
    <td>&nbsp;</td>
    <td><br/><br/><div style="width:50%;background-color:CYAN;margin-left:24%;margin-top:100px;border: 3px solid black; border-radius:3%; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
    	<br><br>
                <form name="login" action="chk.php" method="post">          <!--  post - sends data to a server to create or update the resource -->    
                    
        <table width="100%"  cellspacing="02" cellpadding="05">
  <tr>
      <th colspan="2" scope="col"><font size="6">LOGIN</font></th>
    </tr>
  <tr>
      <td align="right"><font size="5">Login ID&nbsp;:&nbsp;</font></td>
    <td><input style="height: 20px; font-size: 15px;" type="text" name="id" required/><br/>
    </td>
  </tr>
  <tr>
      <td align="right"><font size="5">Password&nbsp;:&nbsp;</font></td>
    <td><input style="height: 20px; font-size: 15px;" type="password" name="pass" required/></td>
  </tr>
  <tr>
      <td align="right"><font size="5">Login As&nbsp;:&nbsp;</font></td>
    <td>
        <select name="role" style="width: 13em; height: 2em; font-size: 15px;">
        <option value="Student">Student</option>
        <option value="Faculty">Faculty</option>
        <option value="Admin">Admin</option>          
        </select>
      </td>
  </tr>
            <tr>
                <td colspan="2" align="center"><br/><input class="button-61" type="submit" role="button" name="register" value="Submit"/></td>
            </tr>

</table> 

        <br/>
        &nbsp;
        </form>
    	</div>
     </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</div>
</html>

<?php
}
else
{
header("location:Admin.php");          // Moving on with this header location
}

?>




                