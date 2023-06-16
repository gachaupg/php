<?php
$succes=0;
$user=0;


include 'connect.php';
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql= "Select * from `registration` where 
 email='$email'";
 $result=mysqli_query($con,$sql);
 if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
       $user=1;

    }else{

        $sql="insert into `registration`(username,email,password)
        values('$username','$email','$hashedPassword')";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "data inserted successfully";
        $succes=1;
     header('location:login.php');

    }else{
        die(mysqli_error($con));
    
    }
    }
    // header('location:display.php');
}










}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>

<?php
if($user){
    echo '
    <div class="alert alert-danger" role="alert">
 user already exist!
</div>';
}elseif($succes){
    echo '
    <div class="alert alert-primary" role="alert">
  registration succes!
</div>';
}

?>

    <div class="container my-5">
    <form method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
   <label for="exampleInputEmail1" class="form-label">email</label>
   <input type="email" name="email" class="form-control" id="exampleInputEmai">
 </div>

  <!-- <div class="mb-3"> -->
    <!-- <label for="exampleInputPassword1" class="form-label">number</label> -->
    <!-- <input type="number" name='mobile' class="form-control" id="exampleInputPassword1"> -->
  <!-- </div> -->
  
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">number</label>
  <input type="password" name='password' class="form-control" id="exampleInputPa">
</div>
  <a href="display.php">
  <button name='submit' type="submit" class="btn btn-primary">Submit</button>
  </a>
</form>
    </div>
  </body>
</html>