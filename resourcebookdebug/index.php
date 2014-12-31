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
if(isset($_SESSION['email']))
{
header("location:welcome.php");
}

?>
<html>
	<head>
		<title>Login Page</title>
	</head>
<style>
table,tr,td,th
{
border:1px solid grey;
}
</style>

<body bgcolor="#DBE8F9">
 <?php 
 include('header.php'); 
 include('com/config_db.php');
 ?>
<br />
<center><font color = 'navy' style="font-size:2em;">Online Resource Booking System<font></center>
<br />
<form method = "post" action = "index.php">
	<table width = '400' align='center' bgcolor="white" style="color:navy;">
	<tr>
		<td colspan='2' align = 'center'><h1>Login Form</h1></td>
	
	
	</tr>
	
	
	<tr>
		<td align = 'center'>E-mail :</td>
		<td><input type = 'text' name = 'email'/> @saffrony.ac.in</td>
	
	</tr>
	<tr>
		<td align = 'center'>Password :</td>
		<td><input type = 'password' name = 'pass'/></td>
	
	</tr>
	<tr>
		<td colspan='5' align = 'center'><input type = 'submit' name = 'login' value = 'Login'/></td>
		
	
	</tr>

</table>

</form>
<!--
<font color='red' size = '3'>Not registered yet??</font><a href = 'registration.php'>Sign Up Here</a>-->
<?php include('footer.php'); ?>
</body>
</html>

<?php
	if(isset($_POST['login']))
	{
	$email = $_POST['email']."@saffrony.ac.in";
	$password = $_POST['pass'];
	$email = stripslashes($email);
	$email = mysql_real_escape_string($email);
	$password = stripslashes($password);
	$password = mysql_real_escape_string($password);
	$check_user = "select * from users where user_email = '$email' and user_pass = '$password'";
	$run = mysql_query($check_user);
	//echo $check_user;
	 $result = mysql_num_rows($run);
	if($result > 0)
	{
	$res = mysql_fetch_array($run);
	    $_SESSION['email']= $email;
		$_SESSION['br']= $res[1];
		echo "<script>window.open('welcome.php', '_self')</script>";
	}
	else
	{
		echo "<script>alert('Email or password is incorrect')</script>";
	}
	}

?>