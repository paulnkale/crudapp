<?php
include "db_conn.php";
if(isset($_POST['submit'])){
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $email= $_POST['email'];
    $gender= $_POST['gender'];
    $sql ="INSERT INTO `crud`(`id`, `first_name`, `Last_name`, `email`, `gender`) 
    VALUES (Null,'$fist_name','$Last_name','$email','$gender')";
    $result=mysqli_query($conn, $sql);
    if($result){
        header("Location: index.php?msg=New record created successfully");
    }
    else{
        echo "Failed: " .mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <!--fontawasome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <title>CRUD APP</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" 
    style="background-color: #00ff5573;">
      CRUD Appliation
    </nav>
    <div class="container">
    <?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show"
         role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add new</a>

        <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    <?php
    include "db_conn.php";

    $sql = "select * from crud";
    $result=mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <tr>
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['first_name']?></td>
      <td><?php echo $row['last_name']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['gender']?></th>
      
      <td>
        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"> <i class="fa-solid fa-pen-to-square
        fs-5 me-3"></i></a>
        <a href="delete.php?id=<?php echo $row['id'] ?>" 
        class="link-dark"> <i class="fa-solid fa-trash fs-5"></i></a>
      </td>
    <?php
    }
    ?>
  </tbody>
</table>
    </div>
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>