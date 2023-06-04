<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];


include '../connection.php';
if(isset($_POST['update']))
{
           $domain=$_POST['domain'];
           $research=$_POST['research']; 
           $others=$_POST['others'];
           
           if (!empty($domain)|| !empty($research)||!empty($others))
           {
              
            $sql= "UPDATE `spmas`.`faculty` SET `domain` = '$domain', `research` = '$research', `others` = '$others' WHERE `faculty`.`f_id` = '$user';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:update.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:update.php');
        }  
}



if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../CSS.css">
<link rel="Website Icon" type="png" href="../logo.png">
<style>
	body
	{
		background-image:url(../bg1.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style>
<title>Students Project Management System</title>
</head>
<div>
    <body>
<?php
   header('Location:../Admin.php');
   ?>
 <?php
}
elseif($role=="Faculty")    
{
?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS.css">
    <link rel="Website Icon" type="png" href="../logo.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(../bg1.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style>
<title>Students Project Management System</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="green">
    <th width="7%" scope="col">&nbsp;</th>
    <th width="10%" scope="col"><a href="../Admin.php"><img src="../logo.png" alt="LOGO" width="120" height="120"/></a></th>
    <th width="66%" scope="col"><font size="8" color="White">Students Project Managenent System</font></th>
    <th width="7%" scope="col"><font color="White" size="5">
    <?php
    print $role;
    echo "<br/>";
    print $user;
    ?>
        </font></th>
    <th width="10%" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="01" cellpadding="01">
  <tr bgcolor="skyblue">
      <th width="5%" scope="col"> <h4>&nbsp;</h4></th>
    <th width="17%" scope="col"><a class="button-18" href="update.php">Update Details</a></th>
    <th width="17%" scope="col"><a class="button-18" href="p_detail.php">Project Details</a></th>
    <th width="17%" scope="col"><a class="button-18" href="mail.php">Mail System</a></th>
    <th width="17%" scope="col"><a class="button-18" href="meeting.php">Meeting Details</a></th>
    <th width="13%" scope="col"><a class="button-18" href="../logout.php">Logout</a></th>
    <th width="5%" scope="col">&nbsp;</th>
  </tr>
  </table>
      <form action="update.php" method="post">
          <div class="box"style="background-color:cyan; border:1px solid black; border-radius:25px; width:40%; margin-left:30%; margin-top:100px;">
              <br/>
              <table   cellspacing="05" cellpadding="05" align="center" width="100%">
    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="5">Domain : </font></td>
      <td><input id="in" type="text" name="domain" required/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="5">Subject : </font></td>
      <td><input id="in" type="text" name="research" required/></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="right"><font size="5">Other Skill (s) if any : </font></td>
      <td><input id="in" type="text" name="others"/></td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
        <td colspan="4" align="center"><br><input class="button-17" style="width: 10em;  height: 2em; font-size: 15px;" type="submit" name="update" value="Update" /></td>
    </tr>
    <tr></tr>
    <tr></tr>
  </table>
          </div>
  </form>
 <?php
}
else   
{
?>
    <?php
   header('Location:../Admin.php');
   ?>
<?php
}
?>
</table>

  <p>
    <?php
}
?>
    
    
    
  </p>
  <p>&nbsp;</p>
    </body>
