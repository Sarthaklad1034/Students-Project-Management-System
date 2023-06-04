<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];



include 'connection.php';


if(isset($_POST['allocate']))
{
           $sid=$_POST['sid']; 
           $fid=$_POST['faid'];
           $proid=$_POST['projectid'];
                      
           if (!empty($sid)|| !empty($fid)||!empty($proid))
           {
              
            $sql= "INSERT INTO `spmas`.`project` (`p_id`, `name`, `domain`, `s_id`, `f_id`, `ppf`, `psf`, `remark`) VALUES ('$proid', '', '', '$sid', '$fid', '', '', '');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:allocation.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:allocation.php');
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
<table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="green">
    <th width="7%" scope="col">&nbsp;</th>
    <th width="10%" scope="col"><a href="../Admin.php"><img src="../logo.png" alt="LOGO" width="120" height="120"/></a></th>
    <th width="66%" scope="col"><font size="8" color="White">Students Project Managenent System</font></th>
    <th width="10%" scope="col"><font color="White" size='5'>
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
<br/><br/>
    <form method="post" action="allocation.php">
       <div class="box" style="background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%">
           <table align="center"  width="100%">
 <br/><tr></tr>
  <tr>
    <td></td>
    <td align="right"><font size='5'>Student ID&nbsp;: &nbsp;</font></td>
    <td>
    
        <?php
            include '../connection.php';
             $sql="select s_id from student";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                 <!-- <option >Student</option> -->
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['s_id'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select> 
    </td>
  </tr>
  <tr><td></td></tr>
  <tr><td></td></tr>
    <tr>
    <td colspan='3' align='center'>
    <input type="submit" class="button-17" style="width: 10em;  height: 2em; font-size: 15px;" name="chk" value="Check For Request"/>
    </td>
   <td>&nbsp;</td>
 
    </tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
<tr></tr>
               </table>
       </div>
      
      
      </form>
      <form method='post' action='allocation.php'></form>
<br/><br/>
      <div class="box" style='background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%'>
      <table align='center'  width='100%' cellspacing='05' cellpadding='05'>
            <?php
            if (isset($_POST['chk']))
            {
                    $username=$_POST['id'];
                    $sql1="select * from request where s_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    while($row=mysqli_fetch_assoc($rec))
                    {
              echo "<tr><br></tr>";
              echo "<td>&nbsp;<br/>"."</td>";
              echo "<td align='right'>"."<font size='5'>"."Student ID&nbsp;:&nbsp;"."</font>"."</td>";
              echo "<td>"?> <input  id="in" type="text" name="sid" readonly value="<?php echo $row['s_id'];?>"/> <?php "</td>";
              echo "<td>&nbsp;"."</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td align='right'><font size='5'>Faculty ID&nbsp;:&nbsp;</font></td>";
              echo "<td>"?><input id="in" required type="text" name="faid" value="<?php echo $row['f_id'];?>"/><?php "</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td align='right'><font size='5'>Project ID&nbsp;:&nbsp;</font></td>";
              echo "<td>"?><input id="in" required type="text" name="projectid" value=""/><?php "</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td align='right'><font size='5'>Project Name&nbsp;:&nbsp;</font></td>";
              echo "<td>"?><input id="in" required type="text" name="name" value=""/><?php "</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr align='center'>";
              echo "<td>&nbsp;</td>";
              echo "<td colspan='2'>"?><input class="button-17" type="submit" name="allocate" value="Allocate" style="font-size: 16px;"/><?php "</td>";    				
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr><td></td></tr>";
             
                    }
}
?>


</table>
      </div>
  </form>
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
      


              