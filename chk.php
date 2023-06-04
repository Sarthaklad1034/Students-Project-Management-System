<?php
session_start();
$user = $_POST['id'];
$pass = $_POST['pass'];
$role = $_POST['role'];

include 'connection.php';

if($role == "Admin")
{
    if(!empty($user)||!empty($pass)){
$sql = "SELECT * FROM admin WHERE ID='$user' AND password='$pass'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);

		if($count == 0)
		{
		header("location:Admin.php");
		}
		else
		{
			$_SESSION['Email'] = $user;
			$_SESSION['Role'] = $role;
			header("location:Admin.php?image=image.php");
		}
    }
 else {
        // echo 'Fill up al fields';
		// Set error message
		echo "<script>alert('Please enter valid ID and Password');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
else if($role == "Faculty")
{
        if(!empty($user)||!empty($pass)){
	$sql = "SELECT * FROM faculty WHERE f_id='$user' AND password='$pass'";
	$res = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($res);

		if($count == 0)
		{
		// echo $alert;
		echo "<script>alert('Please enter valid ID and Password');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
		redirect("login.php");
		}
		else
		{
			$_SESSION['Email'] = $user;
			$_SESSION['Role'] = $role;
			header("location:Admin.php?image=image.php");
		}
        }
 else {echo 'Fill up al fields';}
}
else
{
        if(!empty($user)||!empty($pass)){
	$sql = "SELECT * FROM student WHERE s_id='$user' AND password='$pass'";
	$res = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($res);

		if($count == 0)
		{
		// echo "username password Incorrect";
		echo "<script>alert('Please enter valid ID and Password');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
		}
		else
		{
			$_SESSION['Email'] = $user;
			$_SESSION['Role'] = $role;
			header("location:Admin.php?image=image.php");
		}
        }
 else {echo 'Fill up al fields';}
}
if (isset($_SESSION['error'])) {
	echo '<script>alert("' . $_SESSION['error'] . '");</script>';
	unset($_SESSION['error']);
  }
?>
<script>alert=('Invalid')</script>