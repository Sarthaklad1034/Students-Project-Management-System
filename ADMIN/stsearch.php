<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';

if(isset($_POST['update']))
{
           $id=$_POST['sid']; 
           $name=$_POST['stname'];
           $email=$_POST['stemail'];
           $phone=$_POST['stphone'];
           $pass=$_POST['stpass']; 
           $year=$_POST['styear'];
           $stream=$_POST['ststream'];
           
           if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($year)||$stream!=empty($ststream))
           {
              
            $sql= "UPDATE `spmas`.`student` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `year` = '$year', `stream` = '$ststream' WHERE `student`.`s_id` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:stsearch.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:stsearch.php');
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
    <link rel="stylesheet" type="text/css" href="../CSS.css">
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
    
    <form method="post" action="stsearch.php">
      <div>
   <table width="100%"  cellspacing="05" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
   </table>
          <div style="background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%" class="box">
              <table align="center" width="100%" cellspacing="00" cellpadding="05" >
   <br>
              <tr>
    <td>&nbsp;</td>
    <td align="right"><font size='5'>Student ID&nbsp;:&nbsp;</font> </td>
    <td>
        <?php
            include '../connection.php';
             $sql="select s_id from student";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="id" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                 <!-- <option selected="selected" >Student</option> -->
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['s_id'];
                     ?>
                 <option  selected="selected" value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
            ?>
            </select> 
    </td>
  </tr>
    <tr>
        <td colspan="3" align="center">
            <input class="button-17" style="width: 10em;  height: 2em; font-size: 15px;" type="submit" name="search" value="Search" />
    </td>
    <td>&nbsp;</td>
  </tr>
    <tr><td></td></tr>
          </table>
                </div>

          </form>
<form method="post" action="stsearch.php">


          <br/><br/>
          <div style="background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%" class="box">
          <table align="center"  width="100%" cellspacing="00" cellpadding="03">    
       <?php
       if (isset($_POST['search']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from student where s_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    while($row=mysqli_fetch_assoc($rec))
                    {
                    echo "<tr><br></tr";
                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Student ID&nbsp;:&nbsp;</font></td>";
                    echo "<td>"?><input id="in" type="text" name="sid" value="<?php echo $row['s_id'];?>" readonly style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Student Name&nbsp;:&nbsp;</font></td>";
                    echo "<td>"?><input id="in" type="text" name="stname" value="<?php echo $row['name'];?>" readonly style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Email ID&nbsp;:&nbsp;</font></td>";
                    echo "<td>"?><input id="in" type="text" name="stemail" value="<?php echo $row['email'];?>" readonly style="text-align:center"/><?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Phone No.&nbsp;:&nbsp;</font></td>";
                    echo "<td>"?><input id="in" type="text" name="stphone" value="<?php echo $row['phone'];?>" readonly style="text-align:center"/><?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Password &nbsp;:&nbsp;</font></td>";
                    echo "<td>"?><input id="stpass" type="password" name="stpass" value="<?php echo $row['password'];?>" readonly style="text-align:center"/><input id="check" type="checkbox"><?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Academic Year&nbsp;:&nbsp;</font></td>";
                    echo "<td>"?><input  id="in" type="text" name="styear" value="<?php echo $row['year'];?>" readonly style="text-align:center"/><?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'><font size='5'>Current Stream&nbsp;: &nbsp;</font></td>";
                    echo "<td>"?><input id="in" type="text" name="ststream" value="<?php echo $row['stream'];?>" readonly style="text-align:center"/><?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";
                    echo "<tr><td></td></tr>";
                    echo "<tr><td></td></tr>";
                    echo "<tr><td></td></tr>";
              
                    // echo "<tr align='center'>";
                    // echo "<td>&nbsp;</td>";
                    // echo "<td colspan='2'>";
                    // echo "<input type='submit' name='update' value='Update' id='bt'/>";
                          
                    // echo "<td>&nbsp;</td>";
                    // echo "</tr>";
                    }
        }?>

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
  
<script>
  check.onclick=togglePassword;
  function togglePassword(){
  if(check.checked) stpass.type="text";
  else stpass.type = "password";
  }
</script>

