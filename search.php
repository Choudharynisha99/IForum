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

<div class="container my-3" id="ques">
  <h1 class="h1 py-3">Search results for <em><?php echo $_GET['search']; ?></em></h1>
  <?php 
  $noResult = true;
   $search_id = $_GET["search"];
   $con = mysqli_connect("localhost", "root","","iforum");
   $query = mysqli_query($con, "SELECT * FROM `threadlist` WHERE match(thread_title, thread_description) against('$search_id')");
   while($row = mysqli_fetch_assoc($query)){
    $noResult = false;
     $idd = $row['thread_id']; 
  $title = $row['thread_title'];
  $description = $row['thread_description'];
  $url = "thread.php?threadid=".$idd;
     
     echo '<div class="container">
         <h3 class="h3 text-dark">
          <a href="'.$url.'" class="text-dakr">'.$title.'</>
         </h3>
         <p>'.$description.'</p>
     </div>';
   }
if($noResult){
 echo '<div class="jumbotron jumbotron-fluid bg-secondary text-white rounded p-4 mt-3">
  <div class="container">
    <h1 class="display-5">No Results Found</h1>
    <p class="lead">Suggestion : Best tips to find quick answers
    <ul>
<li>Put define in front of any word to find its definition.</li> 
<li>Enter any conversion, like dollars </li>
<li>Search for the name of related context and more.</li>

    </ul>
    </p>
  </div>
</div>';
}

   ?>
</div>

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