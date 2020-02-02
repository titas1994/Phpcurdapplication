<?php include 'include/header.php'; ?>
<?php

	create_user();

?>
<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
	<div class="col-10 col-md-8 col-lg-6">
<form action="" method="post">
	<h1>Create User</h1>
	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label for="username">UserName</label>
		<input type="text" name="username" class="form-control" pattern="[a-z]{4,8}" title="4 to 8 letters">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
	</div>
	<input class="btn btn-success" type="Submit" name="submit" value="Create User">
</form>
<table class="table table-bordered table-hover">
	<h1>Show User Details</h1>
<thead>
	<th>Id</th>
	<th>Name</th>
	<th>Email</th>
	<th>Username</th>
	<th>Password</th>
	<th>Edit</th>
	<th>Delete</th>
</thead>
<?php show_user(); ?>
<?php delete_user(); ?>

</table>
<?php

if(isset($_GET['edit'])){

    $id = $_GET['edit'];

    include "include/update_user.php";
    
    }

?>
</div>
</div>
</div>


<?php include 'include/footer.php'; ?>




