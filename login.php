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
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap 5 link/script -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Fontawesome script -->
      <script src="https://kit.fontawesome.com/4beab97406.js" crossorigin="anonymous"></script>
      <title>Document</title>
      <style>
        .background-container {
          min-height:100%;
          background:linear-gradient(0deg, rgba(0, 0, 0, 0.801), rgba(0, 0, 0, 0.801)), url(img/cover.jpg);
          background-size:cover;
          position: relative;
          background-size: cover; 
          background-position: center;
          background-repeat: no-repeat;
          background-attachment: fixed;
        }

        .background-container-v2 {
          min-height:100%;
          background:linear-gradient(0deg, rgba(255, 255, 255, 0.950), rgba(255, 255, 255, 0.950)), url(img/logo.png);
          /* background-size:cover; */
          /* position: relative; */
          /* background-size: cover;  */
          background-position: center;
          background-repeat: no-repeat;
          background-attachment: fixed;
        }

        .overlay {
          position: absolute; 
          top: 0; 
          left: 0; 
          width: 100%; 
          height: 100%; 
          background-color: rgba(0, 0, 0, 0.5); 
        }
      </style>
  </head>
  <body class="bg-success background-container">
    <div class="container content mx-auto p-0 d-flex justify-content-center align-items-center min-vh-100 col-12 col-lg-4 bg-white flex-column background-container-v2">
      <div class="text-left lh-1 d-flex justify-content-center align-items-center">
        <img src="img/DAR Header.png" alt="" width="auto" height="90" class="mb-5">
      </div>
      <form action="" method="POST" class="col-lg-9 needs-validation" novalidate>
        <p class="fw-bolder fs-4 text-center">Sign in to your account</p><hr/>
        <p class="text-danger my-3 fs-6 fst-italic">Note: Fields with * (asterisk) are required fields</p>
        <div class="mb-3">
          <label for="username" class="form-label">Username <strong class="text-danger">*</strong></label>
          <input type="text" class="form-control" id="username" aria-describedby="userHelp" required>
          <div class="invalid-feedback">
            Please fill up the blank input fields.
          </div>
        </div>  

        <div class="mb-3">
          <label for="password" class="form-label">Password <strong class="text-danger">*</strong></label>
          <input type="password" class="form-control" id="password" aria-describedby="userHelp" required>
          <div class="invalid-feedback">
            Please fill up the blank input fields.
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary form-control bg-success border-0 fw-bold"><i class="fa-sharp fa-solid fa-right-to-bracket"></i> Login</button><hr>
        <a href="#" class="d-flex justify-content-center">Forgot your password?</a>
      </form>
    </div>

    <script>
      var forms = document.querySelectorAll(".needs-validation");

      Array.prototype.slice.call(forms).forEach(function(form){
        form.addEventListener("submit", function(event){
          if (!form.checkValidity()){
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        }, false);
      });
    </script>
  </body>
</html>
