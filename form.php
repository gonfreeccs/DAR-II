<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 link/script -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Fontawesome script -->
    <script src="https://kit.fontawesome.com/4beab97406.js" crossorigin="anonymous"></script>
    <!-- Google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@0;1&family=Noto+Sans&display=swap" rel="stylesheet">
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
        background-size:cover;
        /* position: relative; */
        /* background-size: cover;  */
        background-position: center;
        background-repeat: no-repeat;
        /* background-attachment: fixed; */
      }

      .overlay {
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        background-color: rgba(0, 0, 0, 0.5); 
      }

      .latoFonts {
        font-family: 'Lato', sans-serif;
      }
      
      .fonts {
        font-family: 'Noto Sans', sans-serif;
      }
    </style>
</head>
<body class="bg-success background-container fonts">
    <!-- Header content -->
    <header class="d-flex justify-content-between col-12 navbar-light justify-content-between py-2 px-5 bg-light mb-2 col-auto">
        <div class="d-inline-flex col-sm-auto">
            <a href="" class="navbar-brand active"><h3 class="fw-bolder text-uppercase">Dashboard</h3></a>
            <a href="" class="nav-link text-dark"><h4 class="fw-bold text text-success-uppercase text-secondary">Form</h4></a>
        </div>
        <div class="col-sm-auto">
            <div class="float-start mx-2">
                <h6><strong>Josephine B. Roxas</strong></h6>
                <span class="badge rounded-pill bg-secondary d-flex justify-content-center">DAR Employee</span>
            </div>
            <div class="btn-group border-0">
                <button type="button" class="p-0 m-0 bg-transparent border-0"><img src="img/logo.png" alt="" width="50" height="50"></button>
                <button type="button" class="dropdown-toggle dropdown-toggle-split bg-transparent border-0 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu ">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                    <li><a class="dropdown-item" href="#">Form</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"><i class="fa-sharp fa-solid fa-grip-dots-vertical"></i> Log out</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main content -->
    <div class="container bg-light py-5 px-5 background-container-v2">
        <h2 class="fw-bolder text-uppercase">DAR Clearance Form</h2>
        <div class="mb-3 px-1">
            <p class="text-danger my-3 fs-6 fst-italic">Note: Fields with * (asterisk) are required fields</p>
        </div>
        <form action="" method="POST" class="text-uppercase needs-validation" novalidate>
            <!-- This is a required field -->
            <div class="d-flex justify-content-between px-2 row">
                <div class="mb-3 col-lg-3 px-1">
                    <label for="ltcNo" class="form-label">LTC Number <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="ltcNo" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-3 px-1">
                    <label class="form-label" for="adminOrder">DAR Admin Order <strong class="text-danger">*</strong></label>
                    <select class="form-select" id="adminOrder" aria-label="Default select example" aria-describedby="userHelp" required>
                        <option selected>Open this select menu</option>
                        <option value="1">DAR AO4, s2021</option>
                        <option value="2">DAR AO6, s2016</option>
                        <option value="3">DAR AO1, s1989</option>
                        <option value="3">DAR AO8, s1995</option>
                    </select>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                  </div>
                <div class="mb-3 col-lg-3 px-1">
                    <label for="statOfClearance" class="form-label">Status of DAR Clearance <strong class="text-danger">*</strong></label>
                    <select class="form-select" id="statOfClearance" aria-label="Default select example" aria-describedby="userHelp" required>
                        <option selected>Open this select menu</option>
                        <option value="1">Approved</option>
                        <option value="2">Denied</option>
                        <option value="3">Ongoing Review</option>
                    </select>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-3 px-1">
                    <label for="dateApproved" class="form-label">Date Approved <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="dateApproved" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
            </div><hr>
            <!-- This is a required field -->
            <h5 class="fw-bold py-2 text-success">Location of the Property</h5>
            <div class="d-flex justify-content-between px-2 row">
                <div class="mb-3 col-lg-6 px-1">
                    <label for="municipality" class="form-label">Municipality <strong class="text-danger">*</strong></label>
                    <input type="text" name="" id="municipality" class="form-control" list="datalistOptions" placeholder="Type to search..." required>
                    <datalist class="" id="datalistOptions" aria-label="Default select example" aria-describedby="userHelp">
                        <option selected>Open this select menu</option>
                        <option value="Naga City"></option>
                        <option value="Canaman"></option>
                        <option value="Camaligan"></option>
                        <option value="Magarao"></option>
                        <option value="Bombon"></option>
                        <option value="Calabanga"></option>
                        <option value="Tinambac"></option>
                        <option value="Siruma"></option>
                        <option value="Goa"></option>
                        <option value="San Jose"></option>
                        <option value="Lagonoy"></option>
                        <option value="Presentacion"></option>
                        <option value="Garchitorena"></option>
                        <option value="Caramoan"></option>
                        <option value="Tigaon"></option>
                        <option value="Sagnay"></option>
                        <option value="Ocampo"></option>
                        <option value="Pili"></option>
                    </datalist>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div><div class="mb-3 col-lg-6 px-1">
                    <label for="barangay" class="form-label">Barangay <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="barangay" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
            </div>
            <div><hr>
                <h5 class="fw-bold py-2 text-success">Name of Transferor</h5>
                <!-- This is a required field -->
                <div class="d-flex justify-content-between px-2 row">
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="lastname" class="form-label">Last Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="firstname" class="form-label">First Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="midName" class="form-label">Middle Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="midName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="civilStat" class="form-label">Civil Status <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="civilStat" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                </div>
                <!-- This is an optional field -->
                <div class="d-flex justify-content-between px-2 row">
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="m_2_lastName" class="form-label">M_2_Lastname <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="m_2_lastName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="m_2_firstname" class="form-label">M_2_Firstname <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="m_2_firstname" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="m_2_midName" class="form-label">M_2_Middlename <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="m_2_midName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                </div>
                <!-- This is a required field -->
                <div class="d-flex justify-content-between px-2 row">
                    <div class="mb-3 col-lg-8 px-1">
                        <label for="address" class="form-label">Address <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="address" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="typeOfSeller" class="form-label">Type of Seller <strong class="text-danger">*</strong></label>
                        <select class="form-select" id="typeOfSeller" aria-label="Default select example" aria-describedby="userHelp" required>
                            <option selected>Open this select menu</option>
                            <option value="1">Landowner</option>
                            <option value="2">ARB</option>
                            <option value="3">Corporation</option>
                            <option value="3">Bank</option>
                        </select>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                </div>
            </div>
            <!-- This is a required field -->
            <div class="d-flex justify-content-between px-2 row">
                <div class="mb-3 col-lg-4 px-1">
                    <label for="typeOfOwnership" class="form-label">Type of Ownership <strong class="text-danger">*</strong></label>
                    <select class="form-select" id="adminOrder" aria-label="Default select example" aria-describedby="userHelp" required>
                        <option selected>Open this select menu</option>
                        <option value="1">Individual</option>
                        <option value="2">Co-owners</option>
                    </select>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-2 px-1">
                    <label for="noOfCoowners" class="form-label">No. of Co-owners <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="noOfCoowners" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-2 px-1">
                    <label for="typeOfDeed" class="form-label">Type of Deed <strong class="text-danger">*</strong></label>
                    <select class="form-select" id="typeOfDeed" aria-label="Default select example" aria-describedby="userHelp" required>
                        <option selected>Open this select menu</option>
                        <option value="1">Absolute Sale</option>
                        <option value="2">Inheritance</option>
                    </select>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-2 px-1">
                    <label for="dateNotarized" class="form-label">Date Notarized <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="dateNotarized" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-2 px-1">
                    <label for="notaryPublic" class="form-label">Notary Public <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="notaryPublic" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
            </div><hr>
            <!-- This is a required field -->
            <h5 class="fw-bold py-2 text-success">Land Data Information</h5>
            <div class="d-flex justify-content-between px-2 row">
                <div class="mb-3 col-lg-4 px-1">
                    <label for="titleNo" class="form-label">Title Number <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="titleNo" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-4 px-1">
                    <label for="taxdecNo" class="form-label">TAXDEC Number <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="taxdecNo" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-4 px-1">
                    <label for="areaHas" class="form-label">Area (Has.) <strong class="text-danger">*</strong></label>
                    <input type="text" class="form-control" id="areaHas" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
            </div><hr>
            <div>
                <h5 class="fw-bold py-2 text-success">Name of Transferee</h5>
                <!-- This is a required field -->
                <div class="d-flex justify-content-between px-2 row">
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="t_lastName" class="form-label">Last Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_lastName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="t_firstName" class="form-label">First Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_firstname" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="t_midName" class="form-label">Middle Name <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_midName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-3 px-1">
                        <label for="t_civilStat" class="form-label">Civil Status <strong class="text-danger">*</strong></label>
                        <select class="form-select" id="adminOrder" aria-label="Default select example" aria-describedby="userHelp" required>
                            <option selected>Open this select menu</option>
                            <option value="1">Married</option>
                            <option value="2">Single</option>
                            <option value="3">Widow</option>
                            <option value="3">Widower</option>
                            <option value="3">Separated</option>
                            <option value="3">Heir</option>
                        </select>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                </div>
                <!-- This is an optional field -->
                <div class="d-flex justify-content-between px-2 row">
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="t_m_2_lastName" class="form-label">M_2_Lastname <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_m_2_lastName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="t_m_2_firstname" class="form-label">M_2_Firstname <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_m_2_firstname" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-4 px-1">
                        <label for="t_m_2_midName" class="form-label">M_2_Middlename <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_m_2_midName" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                </div>
                <!-- This is a required field -->
                <div class="d-flex justify-content-between px-2 row">
                    <div class="mb-3 col-lg-8 px-1">
                        <label for="t_address" class="form-label">Address <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="t_address" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-2 px-1">
                        <label for="typeOfTransferee" class="form-label">Type of Transferee <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="typeOfTransferee" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-2 px-1">
                        <label for="noOfTransferee" class="form-label">No. of Transferee <strong class="text-danger">*</strong></label>
                        <input type="text" class="form-control" id="noOfTransferee" aria-describedby="userHelp" required>
                        <div class="invalid-feedback text-lowercase">
                            Please fill up the blank input fields.
                        </div>
                    </div>
                </div>
            <div class="d-flex justify-content-between px-2 row">
                <div class="mb-3 col-lg-4 px-1">
                    <label for="scnClearance" class="form-label">Upload the scanned clearance here <strong class="text-danger">*</strong></label>
                    <input type="file" class="form-control" id="scnClearance" aria-describedby="userHelp" required>
                    <div class="invalid-feedback text-lowercase">
                        Please fill up the blank input fields.
                    </div>
                </div>
                <div class="mb-3 col-lg-4 px-1"></div>
                <div class="m-3 col-lg-3 px-1">
                    <input type="submit" class="btn-success border-0 px-5 py-2 m-1 rounded text-white text-uppercase" value="Register">
                </div>
            </div>
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