<?php
session_start();
// Check if the user is logged in and is an admin
if(!isset($_SESSION['user_id']) && $_SESSION['user_type'] != 'administrator'){
  header("Location: login.php");
  exit;
}
// Logout function
function logout(){
  session_destroy();
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
</head>
<body>
  <h2>Welcome <?php echo $_SESSION['user_type'] ?></h2>
  <a href="#" onclick="logout()">Logout</a>

  <script>
    function logout(){
      if(confirm("Are you sure you want to logout?")){
        window.location.href = "login.php";
      }
    }
  </script>
</body>
</html>
