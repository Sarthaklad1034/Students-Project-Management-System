<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';

if(isset($_POST['update']))
{
           $id=$_POST['fid']; 
           $name=$_POST['faname'];
           $email=$_POST['faemail'];
           $phone=$_POST['faphone'];
           $pass=$_POST['fapass']; 
           $qualification=$_POST['faqualification'];
           
           if (!empty($id)|| !empty($name)||!empty($email)||!empty($phone)||!empty($pass)||!empty($qualification))
           {
              
            $sql= "UPDATE `spmas`.`faculty` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `password` = '$pass', `qualification` = '$qualification' WHERE `faculty`.`f_id` = '$id';";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:fa_search.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:fa_search.php');
        }  
}


// error_reporting(E_ERROR | E_WARNING | E_PARSE);




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

    <form method="post" action="fa_search.php">
       <div class="box" style="background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%">
           <table align="center"  width="100%" cellspacing="00" cellpadding="05">
        <br/>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Faculty ID&nbsp;:&nbsp;</font></td>
    <td>
        <?php
            include '../connection.php';
             $sql="select f_id from faculty";
             $result=  mysqli_query($conn, $sql)
             ?><select name="id" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                 <!-- <option selected="selected">Faculty</option> -->
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['f_id'];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>       
             </select></td>
  </tr>
               <tr>
                   <td colspan="3" align="center"><input class="button-17" style="width: 10em;  height: 2em; font-size: 15px;" type="submit" name="search" value="Search" />
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr><td></td></tr>
       </table>
       </div> 


</form>
<form method="post" action="fa_search.php">



       <br/><br/>
       <div class="box" style="background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%">
       <table align="center"  width="100%" cellspacing="00" cellpadding="05">
       <?php
       if (isset($_POST['search']))
       {
                    $username=$_POST['id'];
                    $sql1="select * from faculty where f_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                   while( $row=mysqli_fetch_assoc($rec))
                   {
                    echo "<tr><br></tr";
                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Faculty ID&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="fid" readonly value="<?php echo $row['f_id'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Faculty Name&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="fname" readonly value="<?php echo $row['name'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Faculty Email ID&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="femail" readonly value="<?php echo $row['email'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";
                   
                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Phone No.&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="faphone" readonly value="<?php echo $row['phone'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Password&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="fapass" type="password" name="fapass" readonly value="<?php echo $row['password'];?>" style="text-align:center"/><input id="check" type="checkbox"> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Qualification&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="faqualification" readonly value="<?php echo $row['qualification'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Domain&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="fadomain" readonly value="<?php echo $row['domain'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>&nbsp;</td>";
                    echo "<td align='right'>"."<font size='5'>"."Subject&nbsp;:&nbsp;"."</font>"."</td>";
                    echo "<td>"?><input id="in" type="text" name="fareaserch" readonly value="<?php echo $row['research'];?>" style="text-align:center"/> <?php "</td>";
                    echo "<td>&nbsp;</td>";
                    echo "</tr>";
                    echo "<tr><td></td></tr>";
                    echo "<tr><td></td></tr>";
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
  if(check.checked) fapass.type="text";
  else fapass.type = "password";
  }
</script>

