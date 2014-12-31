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
include('header.php');
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
<body>
<form method = "post" action = "add_resource.php">
<table width = '40%' align = 'left' border = '5'>
<tr>
<th>branch</th>
<th>Resource</th>
<th>Quantity</th>
<th>Edit</th>
</tr>
			<?php
			$query = "select r.r_id, r.r_name,r.r_quantity, b.b_name from resource_data r, branch_data b where r.b_id=b.b_id";
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run))
			{
				$r_id = $row[0];
				$r_name = $row[1];
				$r_quantity = $row[2];
				$branch = $row[3];
			?>
			<tr>
			<td><?php echo $branch;?></td>
			<td><?php echo $r_name;?></td>
			<td><?php echo $r_quantity;?></td>
			<td><a href="edit_resource.php?id=<?php echo $r_id;?>"> Edit Resource</a></td>
			</tr>
			<?php } ?>
		</table>
<form method = "post" action = "add_resource.php">
<table width = '40%' align = 'left' border = '5'>
<tr>
<td>
Resource name
</td>
<td><input type="text" name="res"/>
</td>
</tr>
<tr>
<td>
Quantity
</td>
<td><input type="text" name="qty"/>
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
<td colspan="2"><input type="submit" name="add" value="add"></td>
</tr>
<table>
<form>		
<?php include('footer.php');?>
</body>
<?php
	if(isset($_POST['add']))
	{ 
	
		 $res = $_POST['res'];
		 $qty = $_POST['qty'];
		 $branch = $_POST['branch'];
		 
		 if($res =='')
		 {
			echo "<script>alert('Please enter resource!!')</script>";
			exit();
		 }
		 
		 if($qty=='')
		 {
			echo "<script>alert('Please enter Quantity')</script>";
			exit();
		 }
		 
		$check_res = "select * from resource_data where r_name = '$res' AND b_id='$branch'";
		//echo $check_res;
		$run3 = mysql_query($check_res);
		$result = mysql_affected_rows();
			//echo $result;
			if($result > 0){
			echo "<script>alert('Resource already exists in database')</script>";
			exit();
			}
			$query = "insert into resource_data(r_name,r_quantity,b_id) values ('$res','$qty','$branch')";
			//echo $query;
			if(mysql_query($query)){
			echo "<script>alert('Successfully entered!!!')</script>";
			echo "<script>window.open('add_resource.php','_self')</script>";
			}
}?>