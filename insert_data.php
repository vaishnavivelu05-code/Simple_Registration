<?php
include 'crud.php';
if(isset($_POST['add_students'])){
   
 $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];

    if($name == "" || empty($name)){
    header('location:index.php?message=You need to fill in the name!');
}

else{
   $query = "INSERT INTO users (`name`, `age`, `city`)
VALUES ('$name', '$age', '$city')";

$result=mysqli_query($connection,$query);


if(!$result){
  die("Query Failed: " . mysqli_error($connection));
}
else{
    header('location:index.php?insert_msg=you data has been added successfully');
}
    }

}

?>
