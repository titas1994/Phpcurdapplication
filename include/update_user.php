<?php include 'db.php'; ?>
<form action="include/update_user.php" method="post">
<div class="form-group">
<label for="user"><h1>Update User</h1></label>
<?php
    if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $query ="SELECT * from user WHERE id=$id";
    $select_user_id=mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_user_id)) {
        $id =   $row['id'];
        $name =   $row['name'];
        $email =   $row['email'];
        $username =   $row['username'];
        $password =   $row['password'];
?> 
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $name;  ?>">
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
</div>
<div class="form-group">
    <label for="username">UserName</label>
    <input type="text" name="username" class="form-control" value="<?php echo $username;  ?>">
</div>
<div class="form-group">
    <label for="name">Password</label>
    <input type="password" name="password" class="form-control" value="<?php echo $password;  ?>">
</div>
<?php 

    } }
                                
?>

<?php 

    //update query

    //update_user();
if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        //$query = "UPDATE user SET $name ='{$name}',$email ='{$email}',$username ='{$username}',$password ='{$password}' WHERE id = {$id}";
        $query = "UPDATE user SET name ='$name',email ='$email',username ='$username',password ='$password' WHERE id = $id";
        $update_query = mysqli_query($connection,$query);
        if(!$update_query){

            die("Query Failed". mysqli_error($connection));
        }else{
            echo "Update Succesfull";
        }
        
           header("Location: ../create_user.php");
        }


?>
</div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="submit" value="Update User">
    </div>

</form>
