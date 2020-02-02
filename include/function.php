<?php

include 'db.php';
function create_user(){
	global $connection;

	if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$username = mysqli_real_escape_string($connection,$username);
			$password = mysqli_real_escape_string($connection,$password);
			$rs = mysqli_query($connection,$check);
			$query = "INSERT into user(name,email,username,password) VALUES ('$name','$email','$username','$password')";
			$create_query = mysqli_query($connection,$query);
			if(!$create_query){

				die("connection problem". mysqli_error($connection));

			}
			echo "User Create Sucessful";
			header("location:create_user.php");
}
}
function show_user(){
	global $connection;
	$query = "SELECT * FROM user";
	$show_query = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($show_query)) {
		$id=$row['id'];
		$name = $row ['name'];
		$email = $row['email'];
		$username = $row['username'];
		$password = $row['password'];
		echo "<tr>";
		echo "<td>{$id}</td>";
		echo "<td>{$name}</td>";
		echo "<td>{$email}</td>";
		echo "<td>{$username}</td>";
		echo "<td>{$password}</td>";
		echo "<td><a href='create_user.php?edit={$id}'>Update</a></td>";
		echo "<td><a href='create_user.php?delete={$id}'>Delete</a></td>";
		echo "</tr>";
	}
}
function delete_user(){
	global $connection;
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$query ="DELETE FROM user WHERE id={$id}";
		$delete_query= mysqli_query($connection,$query);
		header("location:create_user.php");
	}	
}
?>