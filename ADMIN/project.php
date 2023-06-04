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
  <br/><br/>
  <form method="post" action="project.php">
      
       <div class="box" style="background-color: cyan; margin-left: 33%; alignment-adjust: central; width: 35%; border-radius:25px;">
           <table align="center"  width="100%">
            <br><tr></tr>
  <tr>
    <td></td>
    <td align="right"><font size="5">Project ID&nbsp;:&nbsp; </font>    </td>
    <td>
        <?php
            include '../connection.php';
             $sql="select p_id from project";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="p_id" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                  <option value="Projects">Projects</option>   
                <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['p_id'];
                     ?> 
                 <option value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
             </select></td>
  </tr>
  <tr><td></td></tr>
  <tr><td></td></tr>
  <tr>
  <td colspan="3" align="center">
  <input class="button-17" style="width: 10em;  height: 2em; font-size: 15px;"  type="submit" name="search" value="Search" />
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
                </div><br><br>
    <table  border="01" align="center" bgcolor="orange" style="table-layout:auto; width:80%">
            <?php
    if (isset($_POST['search']))
    {   
        $p_id=$_POST['p_id'];
                echo "<tr>";
                echo "<th>"."Project ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Student Name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Result"."</th>";
                echo "</tr>";
                include '../connection.php';

                $p_id = $_POST['p_id'];

                if ($p_id == "Projects") {
                  $sql1 = "select * from project";
                } else {
                  $sql1 = "select * from project where p_id = '$p_id'";
                }
                        // $sql1="select * from meeting where f_id = '$f_id'";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="white" align="center"><?php
                            echo "<td>".$std['p_id']."</td>";
                            echo "<td>" ?> &nbsp; <?php "</td>";
                            echo "<td>".$std['name']."</td>";
                            echo "<td>" ?> &nbsp; <?php "</td>"; 
                            echo "<td>".$std['s_name']."</td>";
                            echo "<td>" ?> &nbsp; <?php "</td>";
                            echo "<td>".$std['remark']. "</td>";  
                            ?>  </tr> <?php 
                        }
                      }
            ?>
        </table>
    </form>
</form>
<?php
}
elseif($role=="Faculty")    
{
  header('Location:../Admin.php'); 
?>
<?php
}
else   
{
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