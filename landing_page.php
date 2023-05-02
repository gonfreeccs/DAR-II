<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
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
</head>
<body>
    <!-- Header content -->
    <header class="d-flex justify-content-between col-12 navbar-light justify-content-between py-2 px-5 bg-light mb-0 col-auto border-bottom border-5 border-success row">
        <div class="col-lg-4 d-flex justify-content-start align-items-center">
            <img src="img/headerLogo.png" width="45 rem" alt="">
            <div class="lh-1 ms-2">
                <small class="fw-bold">Republic of the Philippines</small><br>
                <strong class="fw-bolder text-uppercase">Department of Agrarian Reform</strong><br>
                <small><i class="fw-light">Tunay na Pagbabago sa Repormang Agraryo</i></small>
            </div>
        </div>
        <div class="col-lg-5 d-flex justify-content-end align-items-center">
            <a href="dashboard_v3.html" class="fs-6 p-2 me-3 hoverButton rounded-3 border-0 active">Home</a>
            <a href="#mvcv" class="fs-6 p-2 me-3 hoverButton rounded-3 border-0">Vision</a>
            <a href="#orgChart" class="fs-6 p-2 me-3 hoverButton rounded-3 border-0">Organizational Chart</a>
            <!-- <a class="fs-6 p-2 me-3 hoverButton rounded-3 border-0">Footer</a> -->
        </div>
        <div class="col-lg-3 d-flex justify-content-end align-content-center">
            <a href="login.html" type="submit" class="fs-6 p-2 me-3 hoverButton rounded-3 border-0">Log in</a>
        </div>
    </header>
    <main>
        <article class="background-container d-flex justify-content-center align-content-center p-5 land-page container-fluid">
            <div class="text-white text-center">
                <h4 class="text-uppercase lh-0">Department of Agrarian Reform</h4><br>
                <h6 class="text-uppercase lh-0">Clearance Management System</h6>
                <p class="mt-5 mx-5 px-5">Lorem ipsum was conceived as filler text, formatted in a certain way to enable the presentation of graphic elements in documents, without the need for formal copy. Using Lorem Ipsum allows designers to put together layouts and the form of the content before the content has been created, giving the design and production process more freedom.</p>
            </div>
            <div class="position-absolute top-50 start-50 translate-middle">
                <a href="" class="get-started p-3">GET STARTED</a>
            </div>
        </article>
        <article class="" id="mvcv">
            <div class="card text-center rounded-0 border-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner mvcv">
                      <div class="carousel-item active">
                        <h2 class="text-uppercase mb-3">Vision</h2>
                        <p class="fs-5">A just, safe and equitable society that upholds the rights of tillers to own, control, secure, cultivate and enhance their agricultural land, improve their quality of life towards rural development and national industrialization.</ class="fs-5">
                      </div>
                      <div class="carousel-item">
                        <h2 class="text-uppercase mb-3">Mission</h2>
                        <p class="fs-5">DAR is the lead government agency that upholds and implements comrehensive and genuine agrarian reform actualizes equitable land distribtuion, ownership, agricultural productivity, and tenurial security for, of, and with tillers of the land towards the improvement of their quality of life.</p>
                      </div>
                      <div class="carousel-item">
                        <h2 class="text-uppercase mb-3">Core Values</h2>
                        <p class="fs-5">DAR is commited to the principles of transparency, accountability, gender equality, fariness and justice.</p>
                        <p class="fs-5">Our employees are models of unity, integrity, dedication and innovativeness.</p>
                        <p class="fs-5">Our managers and executives are examplars of vision, compassion, decisiveness, humility and inspiration.</p>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </article>
        <article id="orgChart">
            <div class="bg-light d-block justify-content-center align-content-center py-5 org-container">
                <h2 class="text-uppercase text-center mb-5">Organizational Chart</h2>
                <div class="container-mod d-flex justify-content-center align-content-center">
                    <img src="img/orgChart.png" alt="Product Image" class="image-zoom">
                    <div class="zoom-1" style="background-image: url('img/orgChart.png');"></div>
                </div>
            </div>
        </article>
    </main>

    <script src="script.js"></script>
</body>
</html>