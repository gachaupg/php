<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];


    $sql="insert into `craud`(name,email,mobile,password)
    values('$name','$email','$mobile','$password')";
$result=mysqli_query($con,$sql);
if($result){
    // echo "data inserted successfully";
    header('location:display.php');
}else{
    die(mysqli_error($con));

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
    <div class="container my-5">
    <form method='post'>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
   <label for="exampleInputEmail1" class="form-label">email</label>
   <input type="email" name="email" class="form-control" id="exampleInputEmai">
 </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">number</label>
    <input type="number" name='mobile' class="form-control" id="exampleInputPassword1">
  </div>
  
  <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">password</label>
  <input type="password" name='password' class="form-control" id="exampleInputPa">
</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">file</label>
<input type="file" name='file' class="form-control" id="exampleInp">
</div>
  <a href="display.php">
  <button name='submit' type="submit" class="btn btn-primary">Submit</button>
  </a>
</form>
    </div>
  </body>
</html>