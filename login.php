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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Department of Agrarian Reform, Camarines Sur II</title>
</head>
<body class="bg-slate-900 bg-no-repeat bg-center bg-cover bg-fixed">
    <div class="container mx-auto p-4 flex justify-center h-screen w-full items-center max-w-md">
      <?php if(isset($error)) echo "<p>$error</p>"; ?>
        <form action="" method="POST" class="border-solid border-0  min-w-[100%]">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <fieldset  class="border-solid border-2 bg-slate-50 p-5 rounded-md">
                <legend class="mx-auto"><img src="img/randomLogo.png" width="100vw" height="100vh" alt="" class="mx-auto"></legend>
                <p class="mb-4 text-2xl font-bold space text-center">Sign in to your account</p><hr/>
                <label class="block mt-5">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                      Username
                    </span>
                    <input type="text" name="text" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="you@example.com" />
                </label>
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                      Password
                    </span>
                    <input type="password" name="password" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="password" />
                    <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 my-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                          <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                          </svg>
                        </span>
                        Sign in
                    </button>
                </label><hr/>
                <a href="" class="text-sm font-medium mt-3 text-center flex justify-center hover:text-sky-400/100">Forgot password</a>
            </fieldset>
        </form>
    </div>
</body>
</html>
