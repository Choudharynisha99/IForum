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
 <?php 
$con = mysqli_connect("localhost","root","","iforum") or die("error");
$cid = $_GET['cid'];
$query = mysqli_query($con, "SELECT * FROM `category` WHERE category_id=$cid");
while ($row = mysqli_fetch_assoc($query)) {
  ?>
<div class="container my-3">
  <div class="jumbotron mt-3 p-5 bg-secondary text-white rounded">
    <h1 class="dislay-4">Welcome to <?php echo $row['category_name']; ?></h1>
    <p class="lead"><?php echo $row['category_desc']; ?></p>
    <?php
  }
?>
    <hr class="my-4">
    <p>This forum is for sharing knowledge with each other.
    Don't start a topic in wrong category.
Don't cross-post the same thing in multiple topics.
Don't post no-content replies.
Don't divert a topic by changing it midstream.This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same respect you would a public park. ...
Improve the Discussion. </p>
    <a href="" class="btn btn-lg btn-success">learn more</a>
  </div>
</div>



<?php 
if(isset($_SESSION['username'])){ 
 echo '<div class="container my-4 border border-start-0 border-4 border-secondary py-3">
<h1 class="h1 py-2">Start a Discussion</h1>
<form method="post" action="'. $_SERVER['REQUEST_URI'].'">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Problem Title</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="p_title">
    <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
  </div>
  <input type="hidden" name="si" value="'. $_SESSION['id'].'">
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Elaborate Your Concern</label>
  <textarea class="form-control" rows="3" id="desc" name="p_desc"></textarea>
  </div>
  <button type="submit" class="btn btn-secondary" name="p_add">Submit</button>
</form>
</div>';
}
else{
  echo '<div class="container my-2">
  <h2 class="py-2 text-dark">Start a Discussion</h2>
  <p class="lead text-dark">You are not logged in. Please login to be able to start a discussion.</p>
</div>';
}
?>
<!-- add threads -->



<!-- threadlist add  -->
<?php 
$con = mysqli_connect("localhost","root","","iforum") or die("error");
$showalert = false;
$method = $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
  $p_title = $_POST['p_title'];
  $p_dessc = $_POST['p_desc'];
  $si = $_POST['si'];
  $sql_add = mysqli_query($con,"INSERT INTO `threadlist`(`thread_title`, `thread_description`, `thread_cat_id`, `thread_user`) VALUES ('$p_title','$p_dessc','$cid',$si)");
  $showalert = true;
   if($showalert){
    echo "<script>alert('comment added successfully')</script>";
  }
  else{
    echo "<script>alert('something went wrong')</script>";
  }
}

 ?>
 <!-- threadlist add  -->



<!-- threadlist fetch  -->
<div class="container" id="ques">
  <h3 class="py-2">Browse Question</h3>
<?php 
$con = mysqli_connect("localhost","root","","iforum") or die("error");
$cid = $_GET['cid'];
$limit = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$noResult = true;
$sql = mysqli_query($con, "SELECT * FROM `threadlist` WHERE thread_cat_id=$cid LIMIT $limit OFFSET $offset");
while ($threadrow = mysqli_fetch_assoc($sql)) {
  $noResult = false;
  $idd = $threadrow['thread_id']; 
  $title = $threadrow['thread_title'];
  $description = $threadrow['thread_description'];

  $sql2 = mysqli_query($con, "SELECT signup.username FROM signup 
                             INNER JOIN threadlist 
                             ON signup.id = threadlist.thread_user 
                             WHERE threadlist.thread_id = $idd");

  // Check if a result is returned
  if ($jorow = mysqli_fetch_assoc($sql2)) {
    $user_row = $jorow['username'];
  } else {
    $user_row = 'Unknown User';  // Default value if no match found
  }
echo '<div class="d-flex">
  <div class="flex-shrink-0">
    <img src="user-139.png" alt="..." width="30px">
  </div>
  <div class="flex-grow-1 ms-3 mt-0 mb-3" style="line-height: 1;">
    <h5 class="h5"><a class="text-dark text-decoration-none" href="thread.php?threadid='.$idd.'">
    <h4>'.$user_row.'</h4>
    '.$title.'</a></h5>
    '.$description.'
  </div>
</div>';

}
if($noResult){
 echo '<div class="jumbotron jumbotron-fluid bg-secondary text-white rounded p-4 mt-3">
  <div class="container">
    <h1 class="display-5">No Threads Found</h1>
    <p class="lead">Be the first person to ask a question.</p>
  </div>
</div>';
}
?>

<!-- pagination  -->
<!-- Pagination Controls -->
<nav aria-label="Page navigation example" class="container d-flex justify-content-center mb-3 my-3">
  <ul class="pagination">
    <?php 
    // Get the total number of threads for this category
    $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM `threadlist` WHERE thread_cat_id=$cid");
    $total_threads = mysqli_fetch_assoc($result)['total'];
    $total_pages = ceil($total_threads / $limit);

    // Previous Page
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="?cid='.$cid.'&page='.($page - 1).'">&laquo;</a></li>';
    }

    // Display pages
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item"><a class="page-link" href="?cid='.$cid.'&page='.$i.'">'.$i.'</a></li>';
    }

    // Next Page
    if ($page < $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="?cid='.$cid.'&page='.($page + 1).'">&raquo;</a></li>';
    }
    ?>
  </ul>
</nav>

<!-- pagination end  -->
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