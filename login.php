<?php
include 'db_conn.php';
session_start();

// Check if the user is already logged in
if(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'admin'){
  header("Location: admin_dashboard.php");
  exit;
}
elseif(isset($_SESSION['user_id']) && $_SESSION['user_type'] == 'user'){
  header("Location: user_dashboard.php");
  exit;
}
//csrf token
if(!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = uniqid();
}

// Check if the form was submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
//   $user_name = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  // Check if the user exists in the database
  $sql = "SELECT * FROM users WHERE password = '$password' AND user_type = 'administrator'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Check if the password is correct
    if($password == $row['password']) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_type'] = $row['user_type'];

      if($_SESSION['user_type'] === 'administrator'){
        header("Location: admin_dashboard.php");
        exit;
      }
      else{
        header("Location: user_dashboard.php");
        exit;
      }
    }
    else {
      $error = "Invalid password";
    }
  }
  else {
    $error = "User not found";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
<style>
.center {
margin: auto;
margin-top:10%;
width: 19%;
border: 3px solid green;
padding: 10px;
}
</style>
<div class="center"> 

  <h2>teddy</h2>

  <?php if(isset($error)) echo "<p>$error</p>"; ?>
  <form method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <!-- <label>Username:</label> -->
    <p>
    Administrator

    </p>
    <!-- <input type="text" name="username" value="Administrator" required><br> -->
    <label for="password">Password:</label>
    <input type="password" name="password" style="margin-top:.5vh;" required id="password"><br>
    <input type="submit" value="Login" style="margin-top:3px;">
  </form>
</div>
<!-- <div>
<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7988548.433986384!2d119.19248596216049!3d12.13550806467034!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1680503639011!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div> -->

</body>
</html>
