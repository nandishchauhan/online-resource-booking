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
<form method = "post" action = "add_subject.php">
<table width = '800' align = 'center' border = '5'>
			<tr bgcolor = 'green'>
				<td><font color = 'red'></font></td>
				<td></td>
			</tr>
			
			<tr>
			<td>Select Branch</td>
			<td>
			<select name="branch">
			<?php
			$query = "select * from branch_data";
			$run = mysql_query($query);
			while($row = mysql_fetch_array($run))
			{
				$b_id = $row[0];
				$b_name = $row[1];
			?>
			
			<option value="<?php echo $b_id;?>"><?php echo $b_name; ?></option>
			<?php } ?>
			</select>
			</td>
			</tr>
			<tr>
			<td>Enter subject Short form</td>
			<td><input type="text" name="subshort" /></td>
			</tr>
			<tr>
			<td>Enter subject full name</td>
			<td><input type="text" name="sub" /></td>
			</tr>
			<tr>
			<td colspan="2"><input type="submit" name="add" value="submit" />
			<input type="reset" value="reset" /></td>
			</tr>
		</table>
<form>
<?php include('footer.php');?>
<?php
	if(isset($_POST['add']))
	{ 
	
		 $br_id = $_POST['branch'];
		 $subsh = $_POST['subshort'];
		 $sub = $_POST['sub'];
		//echo "hello"; 
		 if($br_id =='')
		 {
			echo "<script>alert('Please enter your branch!!')</script>";
			exit();
		 }
		 
		 if($subsh=='')
		 {
			echo "<script>alert('Please enter subject short form!!')</script>";
			exit();
		 }
		 
		$check_sub = "select * from subject_data where sub_short = '$subsh' and sub_name = '$sub' and b_id = '$br_id'";
		$run = mysql_query($check_sub);
		
			if(mysql_num_rows($run)>0){
			echo "<script>alert('Subject $subsh is already there in database')</script>";
			exit();
			}
			$query = "insert into subject_data(sub_short,sub_name,b_id) values ('$subsh','$sub','$br_id')";
			//echo $query;
			if(mysql_query($query)){
			echo "<script>alert('Successfully Registered!!!')</script>";
			echo "<script>window.open('add_subject.php','_self')</script>";
			}
}?>