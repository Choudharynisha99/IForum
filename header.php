<?php  
$con = mysqli_connect("localhost","root","","iforum") or die("error");
 
   
session_start();
if(isset($_SESSION['username'])){
$query= mysqli_query($con, "SELECT * from  signup WHERE username = '".$_SESSION['username']."'");
 $row = mysqli_fetch_assoc($query);
 $id = $row['id'];
echo '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iCoder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More Info
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="category.php">Add Cateogry</a></li>
            <li><a class="dropdown-item" href="slider.php">Add Banner</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="update.php?id='.$id.'">Update Your Info</a></li>
          </ul>
        </li>
      </ul>
      <div class="row mx-3">
        <form class="d-flex" role="search" method="get" action="search.php">
         <p class="text-light my-0 mx-2 "><b>Welcome '.$_SESSION['username'].' </b></p>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-success" type="submit">Search</button>
        <a href="logout.php" class="btn btn-danger ms-2">LogOut</a>
       </form>
       </div>
          </div>
            </div>
          </nav>';
      }
 else{
  echo 
  '<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iCoder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <ul class="dropdown-menu">';


               $sql = mysqli_query($con, "SELECT category_name, category_id FROM `category` LIMIT 3");
               while($row2 = mysqli_fetch_assoc($sql)){
                echo '<a class="dropdown-item text-dark" href="threadlist.php?cid='.$row2['category_id'].'">'.$row2['category_name'].'</a>';
                }
            
         
        echo '</ul>
        </li>
      </ul>
      <div class="row mx-3">
       <form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-success" type="submit">Search</button>
        <a href="loginmodal.php" class="btn btn-outline-success ms-2">Login</a>
        <a href="signupmodal.php" class="btn btn-outline-success ms-2">Signup</a>
      </form>
       </div>
          </div>
            </div>
          </nav>';
}
 ?>



 