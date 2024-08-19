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
 <form enctype="multipart/form-data" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Upload</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="file">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="add">Add Banner</button>
</form>
 </div>
<!-- banner form -->




<?php include 'footer.php'; ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

<?php   

$con = mysqli_connect("localhost","root","","iforum") or die("error");

if(isset($_REQUEST['add'])){
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  // $desc = $_POST['desc'];
  $fileok = $_FILES['file'];

  // echo $email;ss
  // echo $furniture;
  // echo $price;
  // echo $pass;
  // print_r($fileok);
  // die();

        $img_name = $_FILES['file']['name'];
      $img_typ = $_FILES['file']['type'];
      $img_temp = $_FILES['file']['tmp_name'];


      $location = "image/";
      $file = $location.$img_name;

      $target = "image/";
      $finalImage = $target.$img_name;

      move_uploaded_file($img_temp, $finalImage);

      // echo $name . " " . $furniture . " ". $price . " ". $choose. " ".$finalImage;

      $query = mysqli_query($con, "INSERT INTO `slider`(`slider_email`, `slider_password`, `slider_image`) VALUES ('$email','$pass','$finalImage')");

      if($query){
        echo "<script>alert('successfully going');window.location.href='index.php'</script>";
      }
      else{
        echo "<script>alert('something went wrong');window.location.href='slider.php'</script>";
      }

     }
    






 ?>