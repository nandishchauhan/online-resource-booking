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

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'user_db';
mysql_select_db($dbname) or die("database not available");
?>