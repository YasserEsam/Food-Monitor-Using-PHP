<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = 'foodmonitor';


$conn = @mysqli_connect($server,$username,$password,$db_name) or die ("Connect Error");

?>