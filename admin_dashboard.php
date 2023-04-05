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



















  <script>
    function logout(){
      if(confirm("Are you sure you want to logout?")){
        window.location.href = "login.php";
      }
    }
  </script>
</body>
</html>
