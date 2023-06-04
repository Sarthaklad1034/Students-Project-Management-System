<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
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
    <th width="10%" scope="col"><font color="White" size="5">
	<?php
    print $role;
    ?></font></th>
    <th width="7%" scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" border="0" cellspacing="01" cellpadding="01">
  <tr bgcolor="skyblue">
  <th width="3%" scope="col"><h4>&nbsp;</h4></th>
      <th width="11%" scope="col"><a class="button-18" href="student.php">Add Student</a></th>
      <th width="11%" scope="col"><a class="button-18" href="faculty.php">Add Faculty</a></th>
      <th width="12%" scope="col"><a class="button-18" href="stsearch.php">Search Student</a></th>
      <th width="12%" scope="col"><a class="button-18" href="fa_search.php">Search Faculty </a></th>
      <th width="12%" scope="col"><a class="button-18" href="allocation.php">Allocation</a></th>
      <th width="12%" scope="col"><a class="button-18" href="meeting.php">Meeting Details</a></th>
      <th width="12%" scope="col"><a class="button-18" href="project.php">Project Details</a></th>
      <th width="12%" scope="col"><a class="button-18" href="../logout.php">Logout</a></th>
      <th width="3%" scope="col">&nbsp;</th>
  </tr>
</table>
    <form method="post" action="fa.php">
        <br/><br/><br/>
        <div style="background-color: cyan; margin-left: 25%; alignment-adjust: central; border-radius:25px; width: 50%" class="box">
            <table width="100%" border="0" cellspacing="00" cellpadding="05" align="center">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Faculty ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="id" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Faculty Name&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="text" name="faname" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Email ID&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="email" name="faemail" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Phone No.&nbsp;:&nbsp;</font></td>
    <td><input id="in" type="tel" name="faphone" pattern="[0-9]{10}" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Password &nbsp;:&nbsp;</font></td>
    <td><input id="in" type="password" name="fapass" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Qualification&nbsp;:&nbsp;</font></td>
    <td><input  id="in" type="text" name="faqulification" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td>&nbsp;</td>
    <td colspan="2"><br><input class="button-17" style="width: 10em;  height: 2em; font-size: 15px;" type="submit" name="add" value="Add"/>
    				
    <td>&nbsp;</td>
  </tr>
            </table>  <br/><br/></div></form>
 <?php
}
elseif($role=="Faculty")    
{
?>
    <?php
   header('Location:../Admin.php');
   ?>
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

  <?php
}
?>

<p>&nbsp;</p>
