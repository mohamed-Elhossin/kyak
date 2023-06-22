<?php 
include 'Connection.php';
if(isset($_POST['Add']))
{
  $file=$_FILES['file']; 
  $fileName = $_FILES['file']['name'];
  $fileTmpName= $_FILES['file']['tmp_name'];
  $fileSize= $_FILES['file']['size'];   
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $fileNameNew = uniqid('', true).".".$fileActualExt;
  $fileDestination = 'images/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $qu = "insert into `sessions` (session_name, session_price, session_description, session_img) values('$name', '$price', '$desc', '$fileNameNew')";
  mysqli_query($connect, $qu);
  echo "Added Successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .supplier, .client{
            display: none;
        }
    </style>
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

    <!-- Navbar Start -->
    <!-- <div class="container-fluid position-relative nav-bar p-0" style="width:100%;">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5" width="100%">
                <a href="" class="navbar-brand" >
                    <h1 class="m-0 text-primary"><span class="text-dark">Easy</span>Kayaking</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#service" class="nav-item nav-link">Services</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                        <a href="login.html" class="nav-item nav-link">Login</a>
                        <a href="signup.html" class="nav-item nav-link">Register</a>

                    </div>
                </div>
            </nav>
        </div>
    </div> -->
    <!-- Navbar End -->
    
    
    <title>add session</title>
</head>


  <body class="bg-gradient-success">
  <!-- <form  method="post" enctype="multipart/form-data">
    <section class="cards" id="services">
    
    <div class="sign-content">
  
        <div class="sign-card">
            <div class="sign">
              <p>Add session</p>
            </div>
           
            <div class="info">
              
                   
                    <input type="text" name="name" placeholder="session name" required>
                    <input type="text" name="desc" placeholder="description" >
                    <input type="text" name="price" placeholder="price" required>
                    <input type="file" name="file" placeholder="img" accept="image/png, image/jpeg" >
                    <br>
                    <input type="submit" name="submit" value="Add">
            </div>
           
        </div>
    </div>
        </form>  -->





        <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                       
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Session</h1>
                            </div>
                            <form class="user" enctype="multipart/form-data" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" required name="name" class="form-control form-control-user" id="name"
                                            placeholder="Session Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" required name="price" class="form-control form-control-user" id="name"
                                        placeholder="session price">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" required name="desc" class="form-control form-control-user"
                                            id="name" placeholder="Session Description">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="file" name="file" required class="form-control form-control-user" id="name"
                                            placeholder="Session Image"  accept="image/png, image/jpeg">
                                    </div>
                                </div>

                                
                                <input type="submit" value="Add" name="Add" class="btn btn-success btn-user btn-block">
                                    
                                </input>

                                


                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   <!-- Footer Start -->
   <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">Easy</span>Kayaking</h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed vero lorem dolor dolor</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Packages</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Guides</a>
                    <a class="text-white-50 mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Testimonial</a>
                    <a class="text-white-50" href="#"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
                <div class="w-100">
                    <div class="input-group">
                        <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-3">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#"></a>. All Rights Reserved to BIS Easy Kayaking Team.</a>
                </p>
            </div>
          
        </div>
    </div>
    <!-- Footer End -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        $('.type').change(function(){
            if($('.type:checked').val() == 'supplier'){
                $('.supplier').css('display', 'block');
                $('.client').css('display', 'none');
            }
            else{
                $('.supplier').css('display', 'none');
                $('.client').css('display', 'block');
            }
        });
    </script>

</body>

</html>
<?php include 'footer.php';?>
