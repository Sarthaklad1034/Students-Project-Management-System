<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

if(isset($_POST['bppf'])){
if (isset($_FILES['ppf']))
{
    $file= $_FILES['ppf'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='../ppf/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include '../connection.php';
                    $sql = "UPDATE project SET ppf='$file_name' WHERE s_id='$user'";
                    mysqli_query($conn, $sql);
                    $conn->close();
                    header('Location:project.php'); 
                }
            }
        }
    }
}
}


    elseif(isset($_POST['bpsf']))
 {
if (isset($_FILES['psf']))
{
    $file= $_FILES['psf'];
    //file properties
    $file_name=$file['name'];
    $file_temp=$file['tmp_name'];
    $file_size=$file['size'];
    $file_error=$file['error'];
    // work out the extension
    $file_ext = explode('.', $file_name);
    $file_ext=  strtolower(end($file_ext));
    $allowed= array('docx','doc','txt','pdf');
    
    if(in_array($file_ext, $allowed))
    {
        if($file_error===0)
        {
            if($file_size<=9999999999)
            {
                $file_name_new=uniqid('',TRUE).'.'.$file_ext;
                $file_destination='../psf/'.$file_name_new;
                if(move_uploaded_file($file_temp, $file_destination))
                {
                    //echo $file_destination;
                    include '../connection.php';
                    $sql = "UPDATE project SET psf='$file_name' WHERE s_id='$user'";
                    mysqli_query($conn, $sql);
                    $conn->close();
                    header('Location:project.php'); 
                }
            }
        }
    }
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
    <th width="63" scope="col">&nbsp;</th>
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
    
    
</p>
<br/>
<div style="background-color: violet; width: 70%; margin-left: 15%; margin-top: 0px; border-radius:25px;" class="box">
    <br/>
<form method="post" action="project.php" enctype="multipart/form-data">
    
<table width="100%" border="0" cellspacing="05" cellpadding="05">
  <tr>
    <th width="12%" scope="col">&nbsp;</th>
    <th width="37%" scope="col">&nbsp;</th>
    <th width="37%" scope="col">&nbsp;</th>
    <th width="13%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;<br><br></td>
    <td align="center"><div style="background-color: cyan; border-radius:25px;" class="box"><br/><h3>Project  Proposal</h3><br><input type="file" name="ppf" style="text-align:center"/><br/><br/>
    <button class="button-17" type="button"  name="bppf" value="upload">Upload</button>
    <br/><br/></div></td>
    <td align="center"><div style="background-color: cyan; border-radius:25px;" class="box"><br/><h3>Project  Specification</h3><br /><input type="file" name="psf" style="text-align:center"/><br/><br/>
    <input type="submit" class="button-17" name="bpsf" value="upload"/><br/><br/></div></td>
    <td>&nbsp;</td>
  </tr>
</form>
</table>
    <br /><br />
<form method="post" action="project.php"> 
    <div style="background-color: cyan; width: 30%; border-radius:25px; margin-left: 35%;" class="box">
        <table align="center">
    <tr align="center">
    <td>&nbsp;</td><br/>
    <?php
    if(isset ($_POST['feedback']))
{
    include '../connection.php';
                    $sql1="select * from project where s_id ='$user' ";
                    $rec=mysqli_query($conn, $sql1);
                    
                    while($std=mysqli_fetch_assoc($rec))
                    {
                        ?>
    
    <td  align="center"><input name="feedback"  readonly="readonly" style="width:50px; text-align: center;" placeholder="FEEDBACK" value="<?php echo $std['remark'];?> / 100" /></td><td></td>
</tr>
                      <?php 
                    }
}?>
<tr></tr>
<tr></tr>
<tr></tr>
    <tr> 
        <td></td>
        <td colspan="2" align="center">
            <input class="button-17" type="submit"  name="feedback" value="Result"><br><br></td>
            <td>&nbsp;</td>
  </tr></form>
  
</table>
   </div>       </body><br /><br /> </div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body></div></html>
