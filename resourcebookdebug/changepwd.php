<!-- 
Online Resource Booking System
Developed By Nandish Chauhan and Akshay Kansara				
   Jan 01,2015
   
This file is part of resourcebook.

    Online Resource Booking System is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Online Resource Booking System is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Online Resource Booking System.  If not, see <http://www.gnu.org/licenses/>. -->

<?php

session_start();

if(!$_SESSION['email'])
{
header("location:index.php");
}

?>
<html>
	<head>
		<title>Change Password</title>
	</head>
	
<body bgcolor="#DBE8F9">
<?php 
include('header.php'); 
include('com/config_db.php');
?>
<form method = "post" action = "changepwd.php">
	<table width = '400' border = '5' align='center'>
	<tr>
		<td colspan='2' align = 'center'><h1>Change Password</h1></td>
	</tr>
	<tr>
		<td align = 'center'>Old Password</td>
		<td><input type ='password' name = 'oldpass'/></td>
	</tr>
	<tr>
		<td align = 'center'>New Password :</td>
		<td><input type = 'password' name = 'newpass'/></td>
	</tr>
	<tr>
	<td align="center"><a href="welcome.php"> Back to homepage</a></td>
	<td align = 'center'><input type = 'submit' name = 'submit' value = 'Change'/></td>
	</tr>

</table>
</form>
<?php include('footer.php'); ?>
</body>
</html>

<?php	
	if(isset($_POST['submit']))
	{ 
		 $user_name = $_SESSION['email'];
		 $old_pass = $_POST['oldpass'];
		 $new_pass = $_POST['newpass'];
		 
		 if($user_name=='')
		 {
			echo "<script>alert('Please enter your name!!')</script>";
			exit();
		 }
		 
		 if($old_pass=='')
		 {
			echo "<script>alert('Please enter your password!!')</script>";
			exit();
		 }
		 
		 if($new_pass=='')
		 {
			echo "<script>alert('Please enter your email!!')</script>";
			exit();
		 }
		$check_email = "select * from users where user_email = '$user_name' and user_pass = '$old_pass'";
		//echo $check_email;
		$run = mysql_query($check_email);
		$row = mysql_num_rows($run);
		//echo $row;
			if($row != 1){
			echo "<script>alert('Password is wrong')</script>";
			exit();
			}
			$query = "update users set user_pass = '$new_pass' where user_email = '$user_name'";
			//echo $query;
			if(mysql_query($query)){
			echo "<script>alert('password successfully changed!!!')</script>";
			echo "<script>window.open('welcome.php','_self')</script>";
			}
}

?>