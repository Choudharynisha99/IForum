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
$thid = $_GET['threadid'];
$query = mysqli_query($con, "SELECT * FROM `threadlist` WHERE thread_id=$thid");
while ($row = mysqli_fetch_assoc($query)) {
  $idd = $row['thread_id'];
  ?>
<div class="container my-3">
  <div class="jumbotron mt-3 p-5 bg-secondary text-white rounded">
    <h1 class="dislay-4"><?php echo $row['thread_title']; ?></h1>
    <p class="lead"><?php echo $row['thread_description']; ?></p>
    <?php
  }
?>


<?php 
 $con = mysqli_connect("localhost","root","","iforum") or die("error");
$sql3 = mysqli_query($con, "SELECT signup.username FROM signup 
                             INNER JOIN threadlist
                             ON signup.id = threadlist.thread_user 
                             WHERE threadlist.thread_id = $idd");
  $userrow3 = mysqli_fetch_assoc($sql3);
  $ss_name = $userrow3['username'];
  
    echo '<hr class="my-4">
    <p>This forum is for sharing knowledge with each other.
    Do not start a topic in wrong category.
Do not cross-post the same thing in multiple topics.
Do not post no-content replies.
Do not divert a topic by changing it midstream.This is a Civilized Place for Public Discussion. Please treat this discussion forum with the same respect you would a public park. ...
Improve the Discussion. </p>
    <!-- <a href="" class="btn btn-lg btn-success">learn more</a> -->
    <p><b>Posted by: '.$ss_name.'</b></p> 
    <!-- Remider add user of thread also  -->
  </div>
</div>';
?>

<!-- comment box  -->
<?php 
if(isset($_SESSION['username'])){
 echo '<div class="container my-4 py-3">
<h1 class="h1 py-2">Post a Comment</h1>
<form method="post" >
  <!-- <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="p_title"> -->
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Write Your Concern</label>
  <textarea class="form-control" rows="3" id="desc" name="p_desc"></textarea>
  <input type="hidden" name="si" value="'.$_SESSION['id'].'">
  </div>
  <button type="submit" class="btn btn-secondary" name="p_add">Post Comment</button>
</form>
</div>';
}
else{
echo '<div class="container my-2">
  <h2 class="py-2 text-dark">Post a Comment</h2>
  <p class="lead text-dark">You are not logged in. Please login to be able to post a comment.</p>
</div>';
}
 ?>
 <!-- comment box  -->



 <!-- comment add -->
<?php 
$con = mysqli_connect("localhost","root","","iforum") or die("error");
$showalert = false;
$method = $_SERVER['REQUEST_METHOD']; 
if(isset($_REQUEST['p_add'])){
  $si = $_POST['si'];
  $p_dessc = $_POST['p_desc'];
  $sql_add = mysqli_query($con,"INSERT INTO `th_comment`(`comment_description`, `thread_id`, `comment_by`) VALUES ('$p_dessc','$thid', '$si')");
  $showalert = true;
  if($showalert){
    echo "<script>alert('comment added successfully')</script>";
  }else{
    echo "<script>alert('something went wrong')</script>";
  }
}

 ?>
<!-- comment add  -->


<!-- comment fetch  -->
<div class="container" id="ques">
  <h3 class="py-2">Discussions</h3>
 <?php 
$con = mysqli_connect("localhost","root","","iforum") or die("error");
$thid = $_GET['threadid'];
$noResult = true;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; 
$offset = ($page - 1) * $limit;

$sql = mysqli_query($con, "SELECT * FROM `th_comment` WHERE thread_id = $thid LIMIT $limit OFFSET $offset");

while ($threadrow = mysqli_fetch_assoc($sql)) {
  $noResult = false;
  $th_id = $threadrow['comment_id']; 
  // $title = $threadrow['comment_by'];
  $description = $threadrow['comment_description'];
  $sql2 = mysqli_query($con, "SELECT signup.username FROM signup 
                             INNER JOIN th_comment 
                             ON signup.id = th_comment.comment_by 
                             WHERE th_comment.comment_id = $th_id");

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
     <h5 class="h5"><a class="text-dark text-decoration-none">Commented by '.$user_row.'</a></h5>
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
    $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM `th_comment` WHERE thread_id = $thid");
    $total_threads = mysqli_fetch_assoc($result)['total'];
    $total_pages = ceil($total_threads / $limit);

    // Previous Page
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="?thid='.$thid.'&page='.($page - 1).'">&laquo;</a></li>';
    }

    // Display pages
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item"><a class="page-link" href="?thid='.$thid.'&page='.$i.'">'.$i.'</a></li>';
    }

    // Next Page
    if ($page < $total_pages) {
        echo '<li class="page-item"><a class="page-link" href="?thid='.$thid.'&page='.($page + 1).'">&raquo;</a></li>';
    }
    ?>
  </ul>
</nav>
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