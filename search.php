<?php
include 'header.php';
if (!isset($_SESSION['id'])) {
  header("Location: login");
}
include './connection.php';
include './navbar.php';
?>


<?php

$data = null;
if (isset($_POST['search'])) {

  $searchValue = $_POST['searchValue'];

  $selectSearch = "SELECT * FROM `sessions` WHERE session_name like '%$searchValue%'";
  $data = mysqli_query($connect, $selectSearch);
}
?>

<head>

  <meta charset="utf-8">
  <title>Easy Kayaking</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>
<nav class="navbarI navbar navbar-expand-lg ">
  <div class="container">
    <!--Brand name-->

    <button class="navbar-toggler buttonI" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-chevron-down" style="line-height: 30px"></i></span>
    </button>
  </div>
</nav>


<!-- Navbar Start -->
<!-- <div class="container-fluid position-relative nav-bar p-0" style="width:100%;">
  <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5" width="100%">
      <a href="" class="navbar-brand">
        <h1 class="m-0 text-primary"><span class="text-dark">Easy</span>Kayaking</h1>
      </a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
        <div class="navbar-nav ml-auto py-0">

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">



              <li class="nav-item">
                <a class="nav-link" href="<?php echo url('session.php') ?>">Book Session</a>
              </li>

              <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
              <li class="nav-item mt-3">
                <a href="profile.php">
                  <img src="<?php echo url("img/$IMAGE") ?>" alt="photo" style="width:50px;height:50px" class="rounded-circle" data-toggle="tooltip" data-placement="bottom" title="Profile">
                </a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
  </div>
</div> -->
<!-- Navbar End -->


<!--Slider-->
<div class="slideri">
  <div class="overllay">
    <p class="text-center text-white">The best place to Find your request</p>
  </div>

</div>
<!--END slider-->
<center>
  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="./img/ad.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="./img/ad.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="./img/ad.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</center>

<section class="clients">
  <div class="container">
    <p class="text-center text-capitalize hee">kyaking sessions</p>
    <p class="text-center">Now, you can select any kyaking session .. choose anyone and click to see our over</p>
    <br>
    <br>
    <div class="container my-3">
      <div class="card">
        <div class="card-body">
          <form action="" method="post">
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <input name="searchValue" required type="text" placeholder="Search" class="form-control">
                </div>
              </div>
              <div class="col-md-3">
                <button name="search" class="btn btn-block btn-info">Search </button>
              </div>
              <div class="col-md-3">
                <button class="btn btn-block btn-info"> Sort</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>


    <?php if ($data != null) : ?>
      <div class="row">
        <?php foreach ($data as $sessions) : ?>
          <div class="col-md-4 mb-4">

            <div class="item-one">
              <div class="image-scale">
                <img src="img/<?php echo  $sessions['session_img'] ?>" alt="personal image" width="100%">
              </div>
              <div class="py-2 px-2">
                <div class="pt-3">
                  <div class="float-left h6">
                    <?php echo $sessions['session_name'] ?>
                  </div>
                  <?php

                  ?>
                  <div style="color:#f1c40f" class="text-right">

                  </div>
                </div>
                <div class="pb-3">
                  <?php echo $sessions['session_price']; ?>
                </div>
                <div class="pb-3">
                  <?php echo $sessions['session_description']; ?>
                </div>
                <div class=" mb-3">
                  <a href="payement.php?sessionId=<?=$sessions['session_id']?>" class="btn btn-block btn-success text-uppercase"> see details </a>
                </div>
              </div>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>



  

    </div>
  </div>
</section>


<?php
include './admin/footer.php';
?>