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
		<title>welcome to online resource booking system</title>
		
	</head>
<style>
table, th, td {
    border: 1px ridge grey;
}
html,
body {
   margin:0;
   padding:0;
   height:100%;
}
#container {
   min-height:100%;
   position:relative;
}
#header {
   background:white;
   padding:10px;
}
#body {
   padding:10px;
   padding-bottom:25px;   /* Height of the footer */
}
#footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:25px;   /* Height of the footer */
}
.tdcolor
{
color:#D63333;
}
</style>

<body bgcolor="#DBE8F9">
<div id="container">
<div id="header">
<?php 
include('header.php');
include('com/config_db.php')
?>
</div>
<div id="body">
<?php $username = $_SESSION['email'];?>
<b><i><font color = 'navy' style="text-align:left;" size = '5'>Welcome </font></i></b>
<b><i><font color = 'navy' style="text-align:left;" size = '5'><?php $username = substr($username, 0, strpos($username, '.')); echo ucwords($username);?></font></i></b>
<font style="float:right; text-align:right; margin-right:20px" color = ' blue' size = '4'><a href = 'logout.php'>Logout</font></a>	
<font style="float:right;text-align:right;margin-right:20px" color = ' blue' size = '4'><a href = 'changepwd.php'>Change password</font></a>
<br />
<br />		
	<table style= "float:left; margin-left:10px; background-color:white; text-align:center;margin-bottom:30px;" width = '60%' cellspacing="0px" cellpadding="1px" align="left">
			<caption style="color:navy;font-weight:bolder;">Todays Resource booking</caption>
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
//			mysql_connect("localhost", "root", "");
	//		mysql_select_db("user_db");
			$query = "SELECT b.date, b.slot_no, s.s_name, r.r_name, br.b_name, su.sub_short, b.Remarks, b.User FROM subject_data su, semester_data s, booking_info b, resource_data r, branch_data br WHERE b.date =  '".date("Y-m-d")."' AND b.r_id = r.r_id AND b.b_id = br.b_id AND b.s_id = s.s_id  and su.sub_id = b.sub_id ORDER BY b.slot_no";
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
			<?php } ?>
		</table>

<form method="post" action="welcome.php">
<table style= "float:left; margin-left:30px; background-color:white;" width = '30%' cellspacing="1px" cellpadding="5px">
<caption style="color:navy;font-weight:bolder;">Book your resource</caption>
<tr>
<td>
<b><font color = 'navy'>Select the Date:</font></b>
<input type="date" placeholder="yyyy-mm-dd" id="date" name="date" min="<?=date('Y-m-d', strtotime("-1 day", time()))?>"/>
<br />
<font class="tdcolor">(Incase of IE & Firefox enter in [yyyy-mm-dd] format)<font>
</td>
</tr>
<tr><td>
<?php
$semquery = "select * from semester_data";
//echo hello;
			//echo $semquery;
			$semrun = mysql_query($semquery);
			//echo "sem run ".$semrun;

?>
<b><font color = 'navy'>Select Semester :</font></b> <select name="sem">
<?php 
		while($semrow = mysql_fetch_array($semrun))
			{
			//echo "sem is ".$semrow["s_name"];
				if($semrow[0]%2 == 0)
	echo "<option value='".$semrow[0]."'>".$semrow[1]."</option>";
			}
	echo "<option value='NA'>Not Applicable </option>";
?>
</select>
</td></tr>

<tr><td>
<?php
$brquery = "select * from branch_data";
//echo hello;
			//echo $semquery;
			$brrun = mysql_query($brquery);
			//echo "sem run ".$semrun;

?>
<b><font color = 'navy'>Select Branch :</font></b><select name="bnch">
<option id = "0" value="selbr">----Select Branch----</option>
<?php 
		while($brrow = mysql_fetch_array($brrun))
			{
			//echo "sem is ".$semrow["s_name"];			
	echo "<option value='".$brrow[0]."'>".$brrow[1]."</option>";
			}
?>
</select>
</td></tr>
<tr><td>

<b><font color = 'navy'>Select Slot :</font></b><select name="slt">
<option id = "0" value="selsl">----Select Slot----</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select>
</td></tr>
<tr><td>
<?php
$br=$_SESSION['br'];
$resquery = "select * from resource_data where b_id=$br";
//echo hello;
			//echo $semquery;
			$resrun = mysql_query($resquery);
			//echo "sem run ".$semrun;
?>
<b><font color = 'navy'>Select Resource :</font></b><select name="res">
<option id = "0" value="selres">----Select Resource----</option>
<?php 
	while($resrow = mysql_fetch_array($resrun))
	{	
	echo "<option value='".$resrow[0]."'>".$resrow[1]."</option>";
	}
?>
</select>
</td></tr>
<tr><td>
<?php
$br=$_SESSION['br'];
$subquery = "select * from subject_data r,branch_data b where r.b_id=b.b_id Order By sub_short";
//echo hello;
			//echo $semquery;
			$ressub = mysql_query($subquery);
			//echo "sem run ".$semrun;
?>
<b><font color = 'navy'>Subject</font></b><select name="sub">
<option id = "0" value="selsub">----Select Subject----</option>
<?php 
	while($subrow = mysql_fetch_array($ressub))
	{	
	echo "<option value='".$subrow[0]."'>".$subrow[1]."(".$subrow[5].")</option>";
	}
?>
</select>
</td></tr>
<tr><td>
<font class = "tdcolor" style="font-weight:bolder;">Remarks</font><input type = "text" name = "remarks" size = "30"/>
</td></tr>
<tr><td align="center">
<input type="submit" name="submit" value="Book Now"/>
</td></tr>
</form>
</table>

<?php
if(isset($_POST['submit']))
{

$dte = $_POST['date'];
$sem=$_POST['sem'];
$bnch=$_POST['bnch'];
$slt=$_POST['slt'];
$res = $_POST['res'];
$sub = $_POST['sub'];
if($_POST['remarks']=='')
{
$remark = "No remarks";
}
else
{
$remark = $_POST['remarks'];
}
$user = $_SESSION['email'];

		if($dte=='')
		 {
			echo "<script>alert('Please enter date!!')</script>";
			exit();
		 }
		 
		 if($sem=='selsem')
		 {
			echo "<script>alert('Please enter your sem!!')</script>";
			exit();
		 }
		 
		 if($bnch=='selbr')
		 {
			echo "<script>alert('Please enter your branch!!')</script>";
			exit();
		 }
		  if($slt=='selsl')
		 {
			echo "<script>alert('Please enter your slot!!')</script>";
			exit();
		 }
		 
		 if($res=='selres')
		 {
			echo "<script>alert('Please enter your resource!!')</script>";
			exit();
		 }
		
		 if($sub == 'selsub')
		 {
			echo "<script>alert('Please enter subject!!')</script>";
			exit();
		 } 
		$check_user = "select * from booking_info where date = '$dte' and slot_no = '$slt' and r_id ='$res' and User = '$user'";
		$user_check = mysql_query($check_user);
		//echo $check_user;
	$run_user = mysql_fetch_array($user_check);
	if($run_user)
	{
		echo "<script>alert('Resource already booked by you')</script>";
		exit();
	}
		 $check_res = "select count(*) from booking_info where date = '$dte' and slot_no = '$slt' and r_id ='$res' " ;
		 //echo "<script>alert('$check_res')</script>";
	$run = mysql_query($check_res);
	$run_check = mysql_fetch_array($run);
	$comp_res = "select r_quantity from resource_data where r_id ='$res' " ;
	//echo "<script>alert('$comp_res')</script>";
	$run2 = mysql_query($comp_res);
	$run_comp = mysql_fetch_array($run2);
	/* echo '$run_check is '.$run_check[0].'$run_comp is '.$run_comp[0];
	echo '$comp_res is '.$comp_res.'and $check_res is '.$check_res;
	echo "<script>alert('$comp_res')</script>";
	echo "<script>alert('$check_res')</script>"; */
	if($run_check[0] >= $run_comp[0])
	{
	echo"<script>alert('Hello')</script>";
	echo "<script>alert('Resource Not Available in that slot')</script>";
		exit();
	}else{
	$ins_query = "insert into booking_info(date,s_id,b_id,slot_no,r_id,sub_id,Remarks,User) values('$dte','$sem','$bnch','$slt','$res','$sub','$remark','$user')";
	echo $ins_query;
	$query=mysql_query($ins_query);
	echo "<script>alert('You have successfully booked!!!!!')</script>";
	if($query)
	{
	echo "<script>window.open('welcome.php','_self')</script>";
	}
	}
	
}
	?>
</div>
<div id="footer">
<?php include('footer.php'); ?>	
</div>
</div>
</body>
</html>