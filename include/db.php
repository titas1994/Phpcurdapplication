<?php

$connection = mysqli_connect('localhost','root','','curd');
if(!$connection){

	die("Database not connected". mysqli_error());
}


?>