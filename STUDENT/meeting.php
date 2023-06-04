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
  <link rel="stylesheet" href="../style.css">
  <link rel="Website Icon" type="png" href="../logo.png">
<style>
	body
	{
		background-image:url(../bg1.png);
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
<?php
  header('Location:../Admin.php');
}
elseif($role=="Faculty")    
{
  header('Location:../Admin.php');
?>
<?php
}
else   
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../CSS.css">
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
  <table width="100%"  border="0"cellspacing="00" cellpadding="00">
    <tr bgcolor="green">
      <th width="7%" scope="col">&nbsp;</th>
      <th width="10%" scope="col"><a href="../Admin.php"><img src="../logo.png"  width="120" height="120" alt="LOGO"/></a></th>
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
      <th width="19%" scope="col"><a class="button-18" href="project.php">Project Details</a></th>
      <th width="19%" scope="col"><a class="button-18" href="fa_detail.php">Faculty Details</a></th>
      <th width="19%" scope="col"><a class="button-18" href="mail.php">Mail System</a></th>
      <th width="19%" scope="col"><a class="button-18" href="meeting.php">Meeting Details</a></th>
      <th width="16%" scope="col"><a class="button-18" href="../logout.php">Logout</a></th>
      <th width="4%" scope="col">&nbsp;</th>
  </tr>
  <?php
  }
  ?>
  <?php
  }
  ?>
  </table>
  <br/><br/><br/>
  <table  border="1" align="center" bgcolor="orange" style="table-layout:auto; width:80%">
    <?php
    echo "<tr>";
    echo "<th>"."Date"."</th>";
    echo "<th>" ?> &nbsp; <?php "</th>";
    echo "<th>"."Time"."</th>";
    echo "<th>" ?> &nbsp; <?php "</th>";
    echo "<th>"."Description"."</th>";
    echo "<th>" ?> &nbsp; <?php "</th>";
    echo "<th>"."Meeting Link"."</th>";
    echo "</tr>";
    include '../connection.php';
      $sql1="select * from meeting where s_id = '$user'";
      $rec=mysqli_query($conn, $sql1);
      while ($std=mysqli_fetch_assoc($rec))
      {
          ?> <tr bgcolor="white" align="center"><?php
          echo "<td>".$std['date']."</td>"; 
          echo "<td>" ?> &nbsp; <?php "</td>";
          echo "<td>".$std['time']."</td>"; 
          echo "<td>" ?> &nbsp; <?php "</td>";
          echo "<td>".$std['desc']."</td>"; 
          echo "<td>" ?> &nbsp; <?php "</td>";
          echo '<td><a href="' . htmlspecialchars($std['link']) . '" target="_blank">' . $std['link'] . '</a></td>';
          ?>  </tr> <?php 
      }
    ?>
  </table>
</body>
</html>   