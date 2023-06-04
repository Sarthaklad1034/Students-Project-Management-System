<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';

if(isset($_POST['allocate']))
        {
           $id=$_POST['facultyid'];  
            $sql= "INSERT INTO `spmas`.`request` (`request_id`, `s_id`, `f_id`) VALUES ('', '$user', '$id');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:fa_detail.php');  
                  
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
		background-image:url(../bg.png);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Project Management System</title>
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
    <th width="10%" scope="col"><a href="../Admin.php"><img src="../logo.png" alt="LOGO" width="120" height="120"/></a></th>
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
</table>
<p>
  <?php
}
?>
    <br>
    
    <div style="background-color: violet; width: 50%; margin-left: 25%; margin-top: 0px; border-radius:25px;" class="box">
        <br/><br>
    <form method="post" action="fa_detail.php">
        <table  class="box" align="center" bgcolor="cyan" width="30%" style="width: 60%; margin-left: 20%; border-radius:25px">
        <tr>
            
            <td align="center">
              <br/>  
    <?php
            include '../connection.php';
             $sql="select f_id from faculty";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="faculty" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                 <!-- <option selected="selected"><h3>Supervisors</h3></option> -->
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['f_id'];
                     ?>
                 <option selected="selected" value="<?php echo $category; ?>" style="text-align:center"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select>  <br/><br>
        <input class="button-17" type="submit" name="asses" value="View Faculty Details"/><br/><br>
            </td>
            
        </tr>
    </table>    
         </form>
    
    
    
    <br/>
    
    
    
    
    <form method="post" action="fa_detail.php">
       <div class="box" style="background-color: cyan; width: 60%; margin-left: 20%; border-radius:25px;"> 
    <table width="50%" cellpadding="5" cellspacing="5" border="0" align="center">
    <?php
            if (isset($_POST['asses']))
            {   
                $fid=$_POST['faculty'];          
                echo "<tr>";?>
                <td>Faculty ID</td>
                <td><input type="text" name="facultyid"  readonly value="<?php echo $fid;?>" style="text-align:center;"/></td>
                <?php
                echo "</tr>";
                
                $sql1="select * from faculty where f_id ='$fid' ";
                $rec=mysqli_query($conn, $sql1);
                while ($std= mysqli_fetch_assoc($rec))
                {
                echo "<tr>";
                echo "<td>"."Name"."</td>";
                echo "<td>"?> <input type="text" name="stid" readonly value="<?php echo $std['name'];?>" style="text-align:center;"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Qualification"."</td>";
                echo "<td>"?> <input type="text" name="faqu" readonly value="<?php echo $std['qualification'];?>" style="text-align:center;"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Domain"."</td>";
                echo "<td>"?> <input type="text" name="fad" readonly value="<?php echo $std['domain'];?>" style="text-align:center;"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Research"."</td>";
                echo "<td>"?> <input type="text" name="far" readonly value="<?php echo $std['research'];?>" style="text-align:center;"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>"."Others"."</td>";
                echo "<td>"?> <input type="text" name="fao" readonly value="<?php echo $std['others'];?>" style="text-align:center;"/> <?php "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td></td>";
                echo "<td>"?><input class="button-17" type="submit" name="allocate" readonly value="Request" style="text-align:center;"/> <?php "</td>";
                echo "</tr>";
                
                }
                
               
            }
    ?>
                
    </table>
        </div>
    </form>
    <br/><br/>
    </div>