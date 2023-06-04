<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';
//$sql="select s_id from project where f_id='$user';"; 
//$record=mysqli_query($conn, $sql);


if (isset($_POST['ppf']))
{
    $file=$_POST['file_name'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('ppf/'.$file);
    exit();}
 else {
    echo 'no file';
    }
}
elseif (isset($_POST['psf']))
{
    $file=$_POST['file_name1'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('psf/'.$file);
    exit();}
 else {
    
}
}

elseif (isset($_POST['assess']))
{
$feed=$_POST['assessmen'];
$prid=$_POST['pid'];
if(!empty($feed))
{
$sql2= "UPDATE `spmas`.`project` SET `remark` = '$feed'  WHERE `project`.`p_id` = '$prid';";
mysqli_query($conn, $sql2);
$conn->close();
header('Location:p_detail.php');
}
else 
{
        header('Location:p_detail.php');
        
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

 <?php
 header("location:../Admin.php");
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
    ?>
        </font></th>
    <th width="10%" scope="col">&nbsp;</th>
  </tr>
    </table>
  <table width="100%" border="0" cellspacing="01" cellpadding="01">
  <tr bgcolor="skyblue">
      <th width="5%" scope="col"><h4>&nbsp;</h4></th>
    <th width="17%" scope="col"><a class="button-18" href="update.php">Update Details</a></th>
    <th width="17%" scope="col"><a class="button-18" href="p_detail.php">Project Details</a></th>
    <th width="17%" scope="col"><a class="button-18" href="mail.php">Mail System</a></th>
    <th width="17%" scope="col"><a class="button-18"href="meeting.php">Meeting Details</a></th>
    <th width="13%" scope="col"><a class="button-18" href="../logout.php">Logout</a></th>
    <th width="5%" scope="col">&nbsp;</th>
  </tr>
 <?php
}
else   
{
?>
    
<?php
header("location:../Admin.php");
}
?>
</table>
<p>
  <?php
}
?>
    <form method="post" action="p_detail.php">
        <br/><br/>
        <div class="box" style="background-color: cyan; margin-left: 33%; alignment-adjust: central; border-radius:25px; width: 35%">
    <table align="center">
        <tr>
            <td><h4>&nbsp;</h4></td>
            <td align="center">
                
    <?php
            include '../connection.php';
             $sql="select s_id from project where f_id='$user';";
             $result=  mysqli_query($conn, $sql)
             ?> <select name="student" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                 <!-- <option selected="selected">Supervisory</option> -->
                 <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['s_id'];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>
            </select>   &nbsp;&nbsp;&nbsp;
            <input class="button-17" type="submit" name="asses" value="Check"/>
            </td>
        </tr>
    </table>  
        </div>
         </form>
    <form method="post" action="p_detail.php">
        <div  style="background-color:cyan;  alignment-adjust: central; width:90%; margin-left:5%; margin-top:75px;">
    <table width="100%" cellpadding="5" cellspacing="5" border="1" align="center">
    <?php
            if (isset($_POST['asses']))
            {   
                $stuid=$_POST['student'];          
                ?>
                
                <th>Student ID</th>
                <th>Project Proposal</th>
                <th>Project Specification</th>
                <th>Project Marks</th>   <!--Assessment-->
                
                <?php
                echo "</tr>";
                
                echo "<td align='center'>"?> <input type="text" name="stid" readonly value="<?php echo $stuid;?>" style="text-align:center"/> <?php "</td>";
                
                $sql1="select * from project where s_id ='$stuid' ";
                $rec=mysqli_query($conn, $sql1);
                
                while ($std=mysqli_fetch_assoc($rec))
                {
                    echo "<td align='center'>"?><br><input id="in" name="file_name" value="<?php echo $std["ppf"]?>" type="text" readonly style="text-align:center"/><br/><br/>
                    <input class="button-17" type="submit" value="Download" name="ppf"/> <input type="hidden" name="pid" value="<?php echo $std['p_id']?>"/> <?php "</td>";
                    
                    echo "<td align='center'>"?><br/><input  id="in" name="file_name1" value="<?php echo $std["psf"]?>" type="text" readonly style="text-align:center"/><br/><br/>
                    <input class="button-17" type="submit" value="Download" name="psf"/> <?php "</td>";
                    
                    echo "<td align='center'>"?><br><input  id="in" name="assessmen" style="width:25px; text-align: center;"/><br/><br/>
                    <input class="button-17" type="submit" value="Submit" name="assess"/> <?php "</td>";
                   
                    echo "</tr>";
                
                   
            }
            }
    ?>
    </table>
        </div>
    </form>
</p></body></div>

    
