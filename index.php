<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iCoder - Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
      #ques{
        min-height: 433px;
      }
    </style>
</head>
<body>

<?php include 'header.php'; ?>



<!-- slider banner  -->
<?php 

$con = mysqli_connect("localhost","root","","iforum") or die("error");
$query = mysqli_query($con, "SELECT * FROM `slider`");
if($query){



 ?>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" ></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
        <?php 
             foreach ($query as $key => $value) {
              // code...
              if($value['slider_id'] == '1'){

       ?>
    <div class="carousel-item active">
      <img src="<?=$value['slider_image'];?>" class="d-block w-100" alt="..." height="400px">
    </div>
   <?php 

  }else{
     echo ' <div class="carousel-item">
      <img src="'.$value['slider_image'].'" class="d-block w-100" alt="..." height="400px">
    </div>';
   }
   }
 }
   ?>
  </div>

 <!--  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button> -->
<!--   <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>
<!-- slider banner end -->

<!-- cateogry card  -->
<div class="container my-4" id=ques>
    <h2 class="h2 my-4 text-center">iCoder - Categories</h2>
   <div class="row my-4">
<?php 
$con = mysqli_connect("localhost","root","","iforum") or die("error");

                    $sql = "SELECT * FROM `category`";
                    $result = mysqli_query($con, $sql);
                  while($row = mysqli_fetch_assoc($result)) {
                      # code...
                     $cid = $row['category_id'];
          $cat = $row['category_name'];
          $desc = $row['category_desc'];
          $image  = $row['category_image'];
 ?>
     <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
  <img src="<?php echo $image; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <a class="card-title h5 text-decoration-none" href="threadlist.php?cid=<?php echo $cid;?>"><?php echo $cat; ?></a>
    <p class="card-text"><?php echo substr($desc, 0, 30); ?>....</p>
    <a href="threadlist.php?cid=<?php echo $cid;?>" class="btn btn-primary">View Thread</a>
  </div>
</div>
     </div>
     <?php
                        }
                      
                      ?>

   </div>
 </div>
<!-- cateogry card end  -->

<?php include 'footer.php'; ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</html>