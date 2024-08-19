<?php 


session_start();

session_unset();

session_destroy();

echo "<script>alert('See You Later'); window.location.href='loginmodal.php'</script>";

 ?>