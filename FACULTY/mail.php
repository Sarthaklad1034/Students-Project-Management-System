<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';


if (isset($_POST['submit']))
{
            $to=$_POST['student']; 
           $msg=$_POST['msg'];
           
           
          if (!empty($to))
           {
              
            $sql= "INSERT INTO `spmas`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$to', '$user', '$msg');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:mail.php');  
           }
        else
            
        {
              echo 'Please fill up all fields';
              header('Location:mail.php');
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
    header("location:../Admin.php?image=image.php");
?>


 <?php
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
      <th width="5%" scope="col"> <h4>&nbsp;</h4></th>
    <th width="17%" scope="col"><a class="button-18" href="update.php">Update Details</a></th>
    <th width="17%" scope="col"><a class="button-18" href="p_detail.php">Project Details</a></th>
    <th width="17%" scope="col"><a class="button-18" href="mail.php">Mail System</a></th>
    <th width="17%" scope="col"><a class="button-18" href="meeting.php">Meeting Details</a></th>
    <th width="13%" scope="col"><a class="button-18" href="../logout.php">Logout</a></th>
    <th width="5%" scope="col">&nbsp;</th>
  </tr>
  </table>
    <bt/><br/><br/>
      <form method="post" action="mail.php">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr bgcolor="cyan">   <th><h4>&nbsp;</h4></th>
                <th><input class="button-17" style="width: 5em;  height: 2em; font-size: 15px;" type="submit" value="Compose" name="compose"/></th>
                <th>&nbsp;</th>
                <th><input class="button-17" style="width: 5em;  height: 2em; font-size: 15px;" type="submit" value="Inbox" name="inbox"/></th>
                <th>&nbsp;</th>
                <th><input class="button-17" style="width: 5em;  height: 2em; font-size: 15px;" type="submit" value="Sent Mail" name="sent"/></th>
                <th>&nbsp;</th>
        </tr>
                <?php
                
                if (isset($_POST['compose']))
                {
                    $sql1="select * from project where s_id ='$user' ";
                    $rec=mysqli_query($conn, $sql1);
                    $std=mysqli_fetch_assoc($rec);
                    ?>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td colspan="3" align="center">
                        <br/><br/>
                        <div style="background-color: cyan; width: 40%; margin-left: 5%; border-radius:25px; border: black;" class="box">
                        <br/><br/>
                        <font size="5"> To : &nbsp;&nbsp;</font> 
                        <?php
                        include '../connection.php';
                         $sql="select s_id from project where f_id='$user';";
                         $result=  mysqli_query($conn, $sql)
                         ?> <select name="student" style="width: 10em; height: 2em; font-size: 15px; text-align:center;">
                        <!-- <option>Choose From Supervisory</option> -->
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
                        <br/><br/>
                        <font size="5">  From : </font><input type="text" name="from" value="<?php echo $user;?>" readonly  style="text-align:center"/><br/><br/>
                        <textarea  name="msg" cols="35" rows="5" placeholder="Message" ></textarea><br/><br/>
                        <input class="button-17" type="submit" value="Send" name="submit"/>
                        <br/><br/>
                        </div>
                    </td>
                    <td colspan="2">&nbsp;</td>
                </tr>
                 <?php
                }
                elseif (isset($_POST['inbox'])) 
                    {
                        ?>  
                        
                            <table width="40%" cellpadding="04" cellspacing="01" border="0" align="center" bgcolor="orange">  

                    <?php
                                            echo "<br/>";
                                            echo "<br/>";
                                            echo "<br/>";
                       echo "<tr>";
                    echo "<th>"."FROM"."</th>";
                    echo "<th>"."MESSAGE"."</th>";
                    echo "</tr>";
                        $sql1="select * from st_mail where f_id ='$user'";
                        $rec=mysqli_query($conn, $sql1);
                        
                        echo "<tr>";
                        while ($std= mysqli_fetch_assoc($rec))
                        {
                           if ($std['from']="supervisor")
                            {
                               ?> <tr bgcolor="white" align="center"><?php
                            // echo "<tr>";
                            echo "<td>".$std['s_id']."</td>";
                            echo "<td>".$std['mag']."</td>"; 
                            ?>  </tr> <?php 
                            // echo "<tr/>";
                            }
                        }
                        
                        ?> </table> <?php
                         
                    }
                    
                    elseif (isset($_POST['sent'])) 
                    {
                        ?>  <table width="40%" cellpadding="04" cellspacing="01" border="0" align="center" bgcolor="orange">  

                    <?php
                    
                                            echo "<br/>";
                                            echo "<br/>";
                                            echo "<br/>";
                                            echo "<tr>";
                    echo "<th>"."TO"."</th>";
                    echo "<th>"."MESSAGE"."</th>";
                    echo "</tr>";
                        $sql1="select * from mail where f_id ='$user' ";
                        $rec=mysqli_query($conn, $sql1);
                        
                        // echo "<tr>";
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="white" align="center"><?php
                            echo "<td>".$std['s_id']."</td>";
                            echo "<td>".$std['msg']."</td>"; 
                            ?>  </tr> <?php 
                        }
                        // echo "<tr/>";
                        ?> </table> <?php
                         
                    }
                
                ?>
        
    </table>
</form>
 <?php
}
else   
{
    header("location:../Admin.php?image=image.php");
?>
      
<?php
}
?>
</table>
<p>
  <?php
}
?>
   

    