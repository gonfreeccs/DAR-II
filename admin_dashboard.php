<?php
session_start();
include 'db_conn.php';

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

</br>

  <?php

    if(isset($_POST["import"])){
      $fileName = $_FILES["excel"]["name"];
      $fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
      $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
      $targetDirectory = "./excel" . $newFileName;
      move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
      // error_reporting(0);
      // ini_set('display_errors', 0);
      require_once './excelReader/excel_reader2.php';
      require_once './excelReader/SpreadsheetReader.php';
      $reader = new SpreadsheetReader($targetDirectory);
      $flag = 0;
      foreach($reader as $excel_file){
        $flag+=1;
        if($flag > 3){
          if ((count($excel_file) > 20)) {
            foreach ($excel_file as $cell) {
              $counter = 0;
              if (empty($cell)) {
                $counter+=1;
              } else {
                continue;
              }
            }
          }

          if($counter == 0){
            $municipality = $excel_file[4];
            $brgy = $excel_file[5];
            mysqli_query($conn, "INSERT INTO `property_location` VALUES('', '$municipality', '$brgy')");
            $location_id = $conn->insert_id;
            $date_notarized = $excel_file[12];
            $notary_public = $excel_file[13];
            mysqli_query($conn, "INSERT INTO `notary` VALUES('', '$date_notarized', '$notary_public')");
            $notary_id = $conn->insert_id;
            $title_num = $excel_file[14];
            $tax_dec_num = $excel_file[15];
            $area = $excel_file[16];
            mysqli_query($conn, "INSERT INTO `land_data_info` VALUES('', '$title_num', '$tax_dec_num', '$area')");
            $land_data_info_id = $conn->insert_id;
            $lastname = $excel_file[17];
            $firstname = $excel_file[18];
            $middlename = $excel_file[19];
            $address = $excel_file[20];
            mysqli_query($conn, "INSERT INTO `personal_info` VALUES('', '$firstname', '$middlename', '$lastname', '$address')");
            $transferee_id = $conn->insert_id;
            $lastname = $excel_file[6];
            $firstname = $excel_file[7];
            $middlename = $excel_file[8];
            $address = $excel_file[9];
            mysqli_query($conn, "INSERT INTO `personal_info` VALUES('', '$firstname', '$middlename', '$lastname', '$address')");
            $transferor_id = $conn->insert_id;
            $seller_type = $excel_file[10];
            mysqli_query($conn, "INSERT INTO `seller` VALUES('', '$transferor_id', '$seller_type')");
            $ltc_num = $excel_file[0];
            $admin_order = $excel_file[1];
            $clearance_status = $excel_file[2];
            $date_approved = $excel_file[3];
            $deed_type = $excel_file[11];
            mysqli_query($conn, "INSERT INTO `land_transfer_certificate` VALUES('', '$ltc_num', '$admin_order', '$clearance_status', '$date_approved', '$location_id', '$transferor_id', '$deed_type', '$notary_id', '$land_data_info_id', '$transferee_id')");
          }
        }
      }
        // Redirect back to the form
        header('Location: admin_dashboard.php');
        exit();
  }
    ?></br>
  <form method="post" enctype="multipart/form-data" >
  
  <input type="file" name="excel" accept=".csv,.xls,.xlsx" required >
</br>
</br>
<button type="submit" name="import" value="submit">Save changes</button>
<table class="table-sm" id="datatablesSimple" border="1px">
    <thead class="small">
     <tr>
      <th rowspan="2">LTC No.</th>
      <th rowspan="2">DAR Admin Order</th>
      <th rowspan="2">Status of DAR Clearance</th>
      <th rowspan="2">Date Approved</th>
      <!-- <th rowspan="1" colspan="2">Location of the Property</th> -->
      <th rowspan="1" colspan="1">Municipality</th>
      <th rowspan="1" colspan="1">Barangay</th>
      <!-- <th rowspan="1" colspan="4">Name of Transferor</th> -->
      <th rowspan="1" colspan="1">Last Name</th>
      <th rowspan="1" colspan="1">First Name</th>
      <th rowspan="1" colspan="1">Middle Name</th>
      <th rowspan="1" colspan="1">Address</th>
      <th rowspan="2">Type of Seller</th>
      <th rowspan="2">Type of Deed</th>
      <th rowspan="2">Date Notarized</th>
      <th rowspan="2">Notary Public</th>
      <!-- <th rowspan="1" colspan="3">Land Data Information</th> -->
      <th rowspan="1" colspan="1">Title No.</th>
      <th rowspan="1" colspan="1">Tax Dec No.</th>
      <th rowspan="1" colspan="1">Area(Has.)</th>
      <!-- <th rowspan="1" colspan="4">Name of Transferee</th> -->
      <th rowspan="1" colspan="1">Last Name</th>
      <th rowspan="1" colspan="1">First Name</th>
      <th rowspan="1" colspan="1">Middle Name</th>
      <th rowspan="1" colspan="1">Address</th>
      </tr>      
     </thead>
<?php
// mysqli_query($conn, "INSERT INTO `property_location` VALUES('', '$municipality', '$brgy')");
// mysqli_query($conn, "INSERT INTO `notary` VALUES('', '$date_notarized', '$notary_public')");
// mysqli_query($conn, "INSERT INTO `land_data_info` VALUES('', '$title_num', '$tax_dec_num', '$area')");
// mysqli_query($conn, "INSERT INTO `personal_info` VALUES('', '$firstname', '$middlename', '$lastname', '$address')");
// mysqli_query($conn, "INSERT INTO `personal_info` VALUES('', '$firstname', '$middlename', '$lastname', '$address')");
// mysqli_query($conn, "INSERT INTO `seller` VALUES('', '$transferor_id', '$seller_type')");
// mysqli_query($conn, "INSERT INTO `land_transfer_certificate` VALUES('', '$ltc_num', '$admin_order', '$clearance_status', '$date_approved', '$location_id', '$transferor_id', '$deed_type', '$notary_id', '$land_data_info_id', '$transferee_id')");
      $rows = mysqli_query($conn, "SELECT * FROM `seller` INNER JOIN `personal_info` ON personal_info.personal_info_id = seller.seller_info INNER JOIN land_transfer_certificate ON personal_info.personal_info_id = land_transfer_certificate.transferor INNER JOIN land_data_info ON land_data_info.land_data_info_id = land_transfer_certificate.land_data_info");
      // foreach($rows as $row) :
        // $result = mysqli_fetch_all($rows);
        foreach($rows as $res){
          print_r($res);
          echo '<br>';
          echo '<br>';
          $res1 = $res["property_location"];
          $location = mysqli_query($conn, "SELECT * FROM `property_location` WHERE property_location.property_location_id = $res1 LIMIT 1");
          $resultt = mysqli_fetch_assoc($location);
          echo '<tr>';
          echo '<td>'.$res["ltc_num"].'</td>';
          echo '<td>'.$res["dar_admin_order"].'</td>';
          echo '<td>'.$res["clearance_status"].'</td>';
          echo '<td>'.$res["date_approved"].'</td>';
          echo '<td>'.$resultt["municipality"].'</td>';
          echo '<td>'.$resultt["barangay"].'</td>';
          echo '<td>'.$res["lastname"].'</td>';
          echo '<td>'.$res["firstname"].'</td>';
          echo '<td>'.$res["middlename"].'</td>';
          echo '<td>'.$res["address"].'</td>';
          echo '<td>'.$res["seller_type"].'</td>';
          echo '<td>'.$res["deed_type"].'</td>';
          echo '<td>'.$res["notary"].'</td>';
          echo '<td>'.$res["notary"].'</td>';
          echo '<td>'.$res["title_num"].'</td>';
          echo '<td>'.$res["tax_dec_num"].'</td>';
          echo '<td>'.$res["area"].'</td>';
          echo '<td>'.$res["transferee"].'</td>';
          echo '<td>'.$res["transferee"].'</td>';
          echo '<td>'.$res["transferee"].'</td>';
          echo '<td>'.$res["transferee"].'</td>';
          // print_r($res);
          echo '</tr>';
        }
      ?>
      <!-- <tr> 
        <td> <?php echo $row["name"]; ?> </td><br>
        <td> <?php echo $row["age"]; ?> </td><br>
        <td> <?php echo $row["address"]; ?> </td>
        <td> <?php echo $row["count"]; ?> </td> -->
     
</form>

    <header class=" bg-slate-100">
        <div class="container inline-flex justify-between items-center mx-auto px-5">
            <nav class="">
                <ul class="flex">
                    <img src="img/randomLogo.png" width="40" height="40" alt="" class="mx-auto py-3 mx-0 text-base leading-7 me-4">
                    <li class="flex-auto p-2"><a href="" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Dashboard</a></li>
                    <li class="flex-auto p-2"><a href="" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Form</a></li>
                </ul>
            </nav>
            <div class="flex items-center pe-5">
                <div class="block p-2">
                    <strong class="block">Andrew Alfred</strong>
                    <span class="block hover:text-green-700">Technical advisor</span>
                </div>
                <img src="img/randomLogo.png" width="40" height="40" class="">
                <div class="hidden lg:flex lg:flex-1 lg:justify-end ms-3">
                  <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log out <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
    </header>
    <main class="block">
      <div class="container justify-end items-center flex mt-5">
        <th colspan="6" class="px-5">
          <label class="relative block flex">
            <button class="rounded bg-blue-400 px-2 py-1 mx-1 text-slate-100 font-semibold">Import</button>
            <span class="sr-only">Search</span>
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
              <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">...</svg>
            </span>
            <input class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search for anything..." type="text" name="search"/>
          </label>
        </th>
      </div>
      <div class="container text-sm px-3 table-responsive overflow-x-auto flex justify-center mt-5">
              <table class="border-collapse table table-auto border rounded-t-lg divide-y w-full sm:w-auto md:w-1/2 lg:w-1/3">
                <!-- <caption class="caption-top">
                  Table 3.1: Professional wrestlers and their signature moves.
                </caption> -->
                <thead>
                  <tr>
                    <th colspan="15" class="text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900 ms-5 mt-1">Applicant Information</h3>
                        <p class="ms-5 mt-1 mb-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                    </th>
                  </tr>
                  <tr class="text-sm font-medium text-gray-900 font-sans">
                    <th rowspan="2" class="border p-2 rounded-tl-lg">LTC Number</th>
                    <th rowspan="2" class="border p-2">DAR Admin Order</th>
                    <th rowspan="2" class="border p-2">Status of DAR Clearance</th>
                    <th rowspan="2" class="border p-2">Date Approved</th>
                    <th colspan="2" class="border p-2">Location of the Property</th>
                    <th colspan="4" class="border p-2">Name of Transferor</th>
                    <th rowspan="2" class="border p-2">Type of Seller</th>
                    <th rowspan="2" class="border p-2">Type of Deed</th>
                    <th rowspan="2" class="border p-2">Date Notarized</th>
                    <th rowspan="2" class="border p-2">Notary Public</th>
                    <th colspan="3" class="border p-2">Land Data Information</th>
                    <th colspan="4" class="border p-2 rounded-tr-lg">Name of Transferee</th>
                  </tr>
                  <tr>
                    <th class="border p-2">Municipality</th>
                    <th class="border p-2">Barangay</th>
                    <th class="border p-2">Last Name</th>
                    <th class="border p-2">First Name</th>
                    <th class="border p-2">Middle Name</th>
                    <th class="border p-2">Address</th>
                    <th class="border p-2">Tile Number</th>
                    <th class="border p-2">TAXDEC Number</th>
                    <th class="border p-2">Area (HAS.)</th>
                    <th class="border p-2">Last Name</th>
                    <th class="border p-2">First Name</th>
                    <th class="border p-2">Middle Name</th>
                    <th class="border p-2">Address</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="border p-1">The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                    <td class="border p-1">Malcolm Lockyer</td>
                    <td class="border p-1">1961</td>
                  </tr>
                  <tr>
                    <td class="border p-1">Witchy Woman</td>
                    <td class="border p-1">The Eagles</td>
                    <td class="border p-1">1972</td>
                  </tr>
                  <tr>
                    <td class="border p-1">Shining Star</td>
                    <td class="border p-1">Earth, Wind, and Fire</td>
                    <td class="border p-1">1975</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </main>


















  <script>
    function logout(){
      if(confirm("Are you sure you want to logout?")){
        window.location.href = "login.php";
      }
    }
  </script>
</body>
</html>
