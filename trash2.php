<?php
ob_start();
include 'connection.php' ;
if(isset($_SESSION['id'])){ 


$userName = "";
  $email = "";
  $password = "";
  
  
  $phone_no = "";
  

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $select = "SELECT * FROM `user` WHERE `user_id` = $id";
  $selectQuery = mysqli_query($connect, $select);
  $fetchRow = mysqli_fetch_assoc($selectQuery);
  $userName = $fetchRow["username"];
  $email = $fetchRow["email"];
  $password = $fetchRow["password"];

 
  $phone_no = $fetchRow["phone"];

  
}

if(isset($_POST['update'])) {

  $user_name = $_POST['username'];
  $e_mail = $_POST['email'];
  $pass = $_POST['password'];

  $phone_num = $_POST['phone'];
  
  $s= "SELECT *FROM `user` WHERE `username` ='$user_name'";
  $run_select = mysqli_query ($connect, $s);
  $num = mysqli_num_rows($run_select);
if ($num== 1){
  echo "user name already taken";
}
else{

  $update ="UPDATE `user`
  SET `username`= '$user_name',
  `email`='$e_mail',
  `password`='$pass',
  `phone`='$phone_num'
 
  WHERE `user_id` = $id ";
  $run_update=mysqli_query($connect , $update);
  
  header("location:C:/kyak-main/index.php");
}

  }

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update</title>

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
<body class="bg-gradient-success">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                       
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Your Account!</h1>
                            </div>
                            <form class="user" enctype="multipart/form-data" method="POST" >
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text"  name="username" class="form-control form-control-user"
                                            placeholder="User Name" value="<?php echo $userName; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email"  name="email" class="form-control form-control-user"
                                        placeholder="Email Address" value="<?php echo $email; ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password"  name="password" class="form-control form-control-user"
                                             placeholder="Password" minlength="8" value="<?php echo $password; ?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password"  name="confirmpass" class="form-control form-control-user"
                                             placeholder="confirmpasword">
                                    </div>
                                </div> -->
                            
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="tel" name="phone"  class="form-control form-control-user"
                                            placeholder="Phone" value="<?php echo $phone_no; ?>" minlength="11" maxlength="11">
                                    </div>
                                </div>

                                <?php if(isset($_GET["edit"])){ ?>
                                <input type="submit" value="Update" name="update" class="btn btn-success btn-user btn-block">
                                    
                                </input>
                                <?php } ?>

                                


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
<?php }else{
        header("location:C:/kyak-main/index.php");
    } ?>




// get all data from DB
  function selectall($table)
  {
    $sql = "SELECT * FROM $table ";
    $stmt = conn()->query($sql);
    return $stmt;
  }

  // get all data from DB with condeyion
  function select($table,$condition)
  {
    $sql = "SELECT * FROM $table WHERE $condition";
    $stmt = conn()->query($sql);
    return $stmt;
  }
  function moveimage($name) {
    $target_dir = 'img/';
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
      return $_FILES[$name]["name"];
    } 
  }
  function moveimageadmin($name) {
    $target_dir = '../img/';
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
      return $_FILES[$name]["name"];
    } 
  }

  //insert in DB
  function insert($table, $column, $data)
  {
    $stmt = conn()->query("INSERT INTO $table ($column) VALUES ($data)");
    if ($stmt) {
      return true;
    }
  }
  //update in DB
  function update($table, $columns, $id)
  {
    $sql = "UPDATE $table SET $columns  WHERE `id`='$id'";
    $stmt = conn()->query($sql);
    if ($stmt) {
      return true;
    }
  }
  //delete item
  function delete($table , $id)
    {
      $sql = "DELETE FROM $table WHERE `id`='$id'";
      $stmt = conn()->query($sql);
      if ($stmt) {
        return true;
      } else {
        return false;
      }
    }
/////////////////////////////////////////////////////
  
?>