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
<div style="width:100%;"><form method = "post" action = "index.php">
<font color = 'navy' style="font-size:1em;margin-bottom:0px;">Check resource on this date </font> <input type = 'date' placeholder="yyyy-mm-dd" name = 'chkdate' style="padding:5px 15px; background:#fffff1; border:0 none;cursor:pointer; -webkit-border-radius: 10px; border-radius: 10px;font-weight:bolder;"/> <input type = 'submit' name = 'chkres' value='Check Status' style="padding:5px 15px; background:#fffff1; border:0 none;
cursor:pointer; -webkit-border-radius: 10px; border-radius: 10px;font-weight:bolder;"/>
</form></div>
				<table style= "float:left; margin-left:10px; background-color:#fffff1; text-align:center;margin-bottom:30px;" width = '60%' cellspacing="0px" cellpadding="1px" align="left">
			<caption style="color:navy;font-weight:bolder;">
			Resource status <?php if(isset($_POST['chkres']))
	echo "on ".$_POST['chkdate'];
	?></caption>
			<tr>
				<th width="13%" class="tdcolor"><font color = '#D63333'>Date</font></th>
				<th width="6%" class="tdcolor">Slot name</font></th>
				<th width="6%" class="tdcolor">Sem</font></th>
				<th width="14%" class="tdcolor">Resource name</font></th>
				<th width="8%" class="tdcolor">Branch name</font></th>
				<th width="20%" class="tdcolor">Subject</font></th>
				<th width="20%" class="tdcolor">Faculty</font></th>
				<th class="tdcolor">Remarks</font></th>
			</tr>
			
			<tr>

			<?php
			if(isset($_POST['chkres']))
	{
	$date = $_POST['chkdate'];
//			mysql_connect("localhost", "root", "");
	//		mysql_select_db("user_db");
			$query = "SELECT b.date, b.slot_no, s.s_name, r.r_name, br.b_name, su.sub_short, b.Remarks, b.User FROM subject_data su, semester_data s, booking_info b, resource_data r, branch_data br WHERE b.date =  '".$date."' AND b.r_id = r.r_id AND b.b_id = br.b_id AND b.s_id = s.s_id  and su.sub_id = b.sub_id ORDER BY b.slot_no";
			//$query = "select * from booking_info where date='".date("Y-m-d")."'";
			//echo $query;
			$run = mysql_query($query);
			
			while($row = mysql_fetch_array($run))
			{
				
				$date = $row[0];
				$slot_name = $row[1];
				$sem = $row[2];
				$resource_name = $row[3];
				$branch_name = $row[4];
				$sub = $row[5];
				$remarks = $row[6];
				$user = $row[7];
			?>
		
			<td><?php echo $date; ?></td>
			<td><?php echo $slot_name; ?></td>
			<td><?php echo $sem; ?></td>
			<td><?php echo $resource_name; ?></td>
			<td><?php echo $branch_name; ?></td>
			<td><?php echo $sub; ?></td>
			<td><?php echo $user = substr($user, 0, strpos($user, '@')) ?></td>
			<td><?php echo $remarks; ?></td>
			</tr>
			<?php } }?>
		</table>
<form method = "post" action = "index.php">
	<table style= "margin-top:20px;float:left; margin-left:30px; background-color:#fffff1;color:navy;" width = '30%' cellspacing="1px" cellpadding="5px">
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
