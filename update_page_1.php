<?php include('header.php'); ?>
<?php include('crud.php');  ?>

<?php

if (!isset($_GET['id_new'])) {
    die("ID not found.");
}

$id = $_GET['id_new'];

$query = "SELECT * FROM users WHERE id='$id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
      die("Query Failed: " . mysqli_error($connection));
    }
    else{

       $row = mysqli_fetch_assoc($result);

if (!$row) {
    die("No record found.");
}

    

}

?>

<?php

if(isset($_POST['update_students'])){

    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];


    $query = "update `users` set `name` = '$name', `age` = '$age', `city` = '$city' where `id` =$id";

$result = mysqli_query($connection, $query);

if(!$result){
  die("Query Failed: " . mysqli_error($connection));
}

else{
    header('location:index.php?update_msg=you have successfully updated the data');
}
}

?>

 

    <form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post"> 
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" value="<?php echo $row['age']?>">
        </div>

        <div class="form-group">
            <label for="city">city</label>
            <input type="text" name="city" class="form-control" value="<?php echo $row['city']?>">
        </div>
        <input type="submit" class="btn btn-success" name="update_students" value="Edit">
</form>




<?php include('footer.php'); ?>