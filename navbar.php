<?php 

include './connection.php';
$selectt = "SELECT * FROM `user` where `user_id` = '{$_SESSION['id']}'";
$run_selectt = mysqli_query($connect, $selectt);
$array = mysqli_fetch_assoc($run_selectt);
?>
<!DOCTYPE html>
<html lang="en">
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
    <link href="stylestyle.css" rel="stylesheet">

    
</head>

<body>

    <!-- Navbar Start -->   
    <div class="container-fluid position-relative nav-bar p-0" style="width:100%;">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5" width="100%">
                <a href="" class="navbar-brand" >
                    <h1 class="m-0 text-primary"><span class="text-dark">Easy</span>Kayaking</h1></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                    <?php
          
                      if(isset($_SESSION['id'])){?>
                      
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="updateprofile.php?edit=<?php echo $array['user_id']; ?>" class="nav-item nav-link">Edit Profile</a>
                        <a href="index.php#about" class="nav-item nav-link">About Us</a>
                        <!-- <a href="#service" class="nav-item nav-link">Sessions</a> -->
                        <a href="index.php#contact" class="nav-item nav-link">Contact Us</a>
                        <!-- <a href="#contact" class="nav-item nav-link">Contact</a> -->

                        <!-- <a href="" class="nav-item nav-link" name="logout">Logout</a> -->
                        <a href="search.php" class="nav-item nav-link">Sessions</a>
                        <a href="logout.php" class="nav-item nav-link">Logout</a>
                          
                        <?php } else {?>

                        <!-- <a href="#contact" class="nav-item nav-link">Contact</a>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                        <a href="register.php" class="nav-item nav-link">Register</a> -->
                        <!-- <a href="add_session.php" class="nav-item nav-link">Add Session</a> -->
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#service" class="nav-item nav-link">Services</a>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                        <a href="register.php" class="nav-item nav-link">Register</a>

                                    <?php
                                    }
                                    ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>