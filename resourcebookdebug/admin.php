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
<a href="add_subject.php">Add subjects</a>
<br/>
<br/>
<a href="add_faculty.php">Add faculty</a>
<br/>
<br/>
<a href="add_resource.php">Add resource</a>
<?php include('footer.php');?>
