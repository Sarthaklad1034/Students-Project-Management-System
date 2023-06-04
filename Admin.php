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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="Website Icon" type="png" href="logo.png">
<style>
	body
	{
		background-image:url(bg1.png);
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
    <th width="10%" scope="col"><img src="logo.png" alt="LOGO" width="120" height="120"></th>
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
      <th width="11%" scope="col"><a class="button-18" href="ADMIN/student.php">Add Student</a></th>
      <th width="11%" scope="col"><a class="button-18" href="ADMIN/faculty.php">Add Faculty</a></th>
      <th width="12%" scope="col"><a class="button-18" href="ADMIN/stsearch.php">Search Student</a></th>
      <th width="12%" scope="col"><a class="button-18" href="ADMIN/fa_search.php">Search Faculty </a></th>
      <th width="12%" scope="col"><a class="button-18" href="ADMIN/allocation.php">Allocation</a></th>
      <th width="12%" scope="col"><a class="button-18" href="ADMIN/meeting.php">Meeting Details</a></th>
      <th width="12%" scope="col"><a class="button-18" href="ADMIN/project.php">Project Details</a></th>
      <th width="12%" scope="col"><a class="button-18" href="logout.php">Logout</a></th>
      <th width="3%" scope="col">&nbsp;</th>
  </tr>
    <!-- <tr>
       <td colspan="10"><img src="bg.jpg" height="50%" width="100%"></img></td>
    </tr> -->
</table>
   
 <?php
}
elseif($role=="Faculty")    
{
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="Website Icon" type="png" href="logo.png">
<style>
	body
	{
		background-image:url(bg1.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Students Project Management System</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="green">
    <th width="7%" scope="col">&nbsp;</th>
    <th width="10%" scope="col"><img src="logo.png" alt="LOGO" width="120" height="120"></th>
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
      <th width="5%" scope="col"><h4>&nbsp;</h4></th>
      <th width="17%" scope="col"><a class="button-18" href="FACULTY/update.php">Update Details</a></th>
      <th width="17%" scope="col"><a class="button-18" href="FACULTY/p_detail.php">Project Details</a></th>
      <th width="17%" scope="col"><a class="button-18" href="FACULTY/mail.php">Mail System</a></th>
      <th width="17%" scope="col"><a class="button-18" href="FACULTY/meeting.php">Meeting Details</a></th>
      <th width="13%" scope="col"><a class="button-18" href="logout.php">Logout</a></th>
      <th width="5%" scope="col">&nbsp;</th>
  </tr>
       <tr>
        <!-- <td colspan="10"><img src="bg.png" height="50%" width="100%"></img></td> -->
    </tr>
</table>
 <?php
}
else   
{
?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS.css">
<link rel="Website Icon" type="png" href="logo.png">
<style>
	body
	{
		background-image:url(bg1.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
                
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Students Project Management System</title>
</head>
<div>
<body>
    <table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="green">
    <th width="7%" scope="col">&nbsp;</th>
    <th width="10%" scope="col"><img src="logo.png" alt="LOGO" width="120" height="120"></th>
    <th width="66%" scope="col"><font size="8" color="White">Students Project Managenent System</font></th>
    <th width="7%" scope="col"><font color="White" size="5">
	<?php
    print $role;
    echo "<br/>";
    print $user;
    ?></font></th>
    <th width="10%" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="01" cellpadding="01">
  <tr bgcolor="skyblue">            
  <th width="4%" scope="col"><h4>&nbsp;</h4></th>
      <th width="19%" scope="col"><a class="button-18" href="STUDENT/project.php">Project Details</a></th>
      <th width="19%" scope="col"><a class="button-18" href="STUDENT/fa_detail.php">Faculty Details</a></th>
      <th width="19%" scope="col"><a class="button-18" href="STUDENT/mail.php">Mail System</a></th>
      <th width="19%" scope="col"><a class="button-18" href="STUDENT/meeting.php">Meeting Details</a></th>
      <th width="16%" scope="col"><a class="button-18" href="logout.php">Logout</a></th>
      <th width="4%" scope="col">&nbsp;</th>
  </tr>
       <tr>
        <!-- <td colspan="10"><img src="bg.png" height="50%" width="100%"></img></td> -->
    </tr>
</table>
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
  </table>
</table></body>