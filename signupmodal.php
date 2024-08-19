<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCoder - Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<?php include 'header.php'; ?>

<!-- banner form -->
 <div class="container mt-3 mb-3">
 <form  method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="signup">Signup</button>
</form>
 </div>
<!-- banner form -->




<?php include 'footer.php'; ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>


<?php   

$con = mysqli_connect("localhost","root","","iforum") or die("error");

if(isset($_REQUEST['signup'])){
  $name = $_POST['name'];
  $email =$_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];

  // echo $name;
  // echo $email;
  // echo $passw;
  // echo $passs;
  $hash = password_hash($pass, PASSWORD_DEFAULT);
        $query = mysqli_query($con,"INSERT INTO `signup`(`email`, `username`, `pass`) VALUES ('$email','$name','$hash')");

  if($pass === $cpass && $query){

         echo "<script>alert('Successfully Registered');window.location.href='loginmodal.php';</script>";    
    }
    else{
      echo "<script>alert('Failed');window.location.href='signupmodal.php';</script>";
    }
  

  
}


 ?>