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

<?php include('header.php');
include('com/config_db.php');
 ?>
<?php
session_start();

if(isset($_SESSION['email']))
{
if($_SESSION['email'] !='nandish.chauhan@saffrony.ac.in')
header("location: welcome.php");
}
else
{
header("location: index.php");
}
?>
<form method = "post" action = "edit_resource.php">
<?php 
if(isset($_GET['id']))
{$id = $_GET['id'];
//echo $id;
$query = "select * from resource_data where r_id = $id";
//echo $query;
$run = mysql_query($query);
$result = mysql_affected_rows(); 
//echo $result;
if($result <= 0)
{
echo "<script>alert('wrong resource id')</script>";
echo "<script>window.open('add_resource.php','_self')</script>";
exit();
}
$row = mysql_fetch_array($run);
?>
<br />
<table align="center" width = '40%' align = 'left' border = '5'>
<tr>
<td>
Resource name
</td>
<td><input type="text" name="res" value="<?php echo $row[1];?>"/>
</td>
</tr>
<tr>
<td>
Quantity
</td>
<td><input type="text" name="qty" value="<?php echo $row[2];?>" />
</td>
</tr>
<tr>
<td>
Branch
</td>
<td><select name="branch">
<?php 
$query2 = "select * from branch_data";
$run2 = mysql_query($query2);
while($row2 = mysql_fetch_array($run2))
{
?>
<option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
<?php } ?>
</select>
</td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="edit" value="edit"></td>
</tr>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table>
<form>
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
}
if(isset($_POST['edit']))
	{
	$branch = $_POST['branch'];
	$qty = $_POST['qty'];
	$res = $_POST['res'];
	$id = $_POST['id'];
	$update = "update resource_data set r_name='$res', r_quantity= $qty, b_id=$branch where r_id = $id";
	//echo $update;
	if(mysql_query($update))
	{
	echo "<script>alert('Successfully Registered!!!')</script>";
	echo "<script>window.open('add_resource.php','_self')</script>";
	}
	}
?>

<?php include('footer.php');?>