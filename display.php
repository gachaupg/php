<?php
include 'connect.php';

session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Croud operation</title>

</head>
<body>
   <div class="container my-5" >
    <h2>Welcome 
      <?php
      echo $_SESSION['email']
      ?>
    </h2>

    <div class="container">
      <a href="logout.php">
        Logout
      </a>
    </div>
    <a href="user.php">
    <button class="btn btn-primary" >Add user</button>
    </a>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql="select * from `craud`";;
$result=mysqli_query($con,$sql);
if($result){
    // $row=mysqli_fetch_assoc($result);
    // echo $row['name'];
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $password=$row['password'];
        echo '
        <tr>
        <th scope="row">'.$id.'</th>
        <a href="item.php?itemid='.$id.'">
        <td>'.$name.'</td>
        </a>
        <td>'.$email.'</td>
        <td>'.$mobile.'</td>
        <td>'.$password.'</td>
        <td>
        
            <button  type="submit" class="btn btn-primary">
            <a href="update.php?updateid='.$id.'">
               Update
               </a>
            </button>
            <a href="item.php?itemid='.$id.'">
            item
            </a>
         </button>
           
            <button  type="submit" class="btn btn-danger">
            <a href="delete.php?deleteid='.$id.'">
          Delete
          </a>
      </button>
      
        
    </td>
      </tr>
        
        ';
    }
}

?>
















   
   
   
   
   
   
    <!-- <tr> -->
      <!-- <th scope="row">2</th> -->
      <!-- <td>Jacob</td> -->
      <!-- <td>Thornton</td> -->
      <!-- <td>@fat</td> -->
    <!-- </tr> -->
    <!-- <tr> -->
      <!-- <th scope="row">3</th> -->
      <!-- <td colspan="2">Larry the Bird</td> -->
      <!-- <td>@twitter</td> -->
    <!-- </tr> -->
  </tbody>
</table>

   </div> 
</body>
</html>