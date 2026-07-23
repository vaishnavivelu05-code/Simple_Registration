<?php include('header.php'); ?>
<?php include('crud.php');  ?>

    <div class="box1">
        <h2> All Students </h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Students</button>
    </div>

<table class="table table-hover table-bordered table-striped">
    
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>City</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr> 
    </thead>

    <tbody>
        
        <?php

            $query = "select * from users";
            $result = mysqli_query($connection, $query);
                if(!$result)
                    {
                        die("query failed".mysqli_error());
                    }
                else
                    {       
                        while($row = mysqli_fetch_assoc($result)){
        ?>
    
        <tr>
           <td><?php echo $row['id']; ?></td>
           <td><?php echo $row['name']; ?></td>
           <td><?php echo $row['age']; ?></td>
           <td><?php echo $row['city']; ?></td>
           <td>
  <a href="update_page_1.php?id_new=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
    
</td>

<td>
    <a href="delete_page.php?id=<?php echo $row['id']; ?>" 
       class="btn btn-danger"
       onclick="return confirm('Are you sure you want to delete this record?')">
        Delete
    </a>
</td>
        </tr>

        <?php
         
         
           }


        }
        ?>
       
       
    </tbody>
</table>
<?php
if(isset($_GET['message'])) {
    echo "<h6>".$_GET['message']."</h6>";
}

?>

<?php
if(isset($_GET['insert_msg'])) {
    echo "<h6>".$_GET['insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['update_msg'])) {
    echo "<h6>".$_GET['update_msg']."</h6>";
}
?>

<?php
if(isset($_GET['delete_msg'])) {
    echo "<h6>".$_GET['delete_msg']."</h6>";
}
?>




<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control">
        </div>

        <div class="form-group">
            <label for="city">city</label>
            <input type="text" name="city" class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<?php include('footer.php'); ?>  