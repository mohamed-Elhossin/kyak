<?php
ob_start();
include 'connection.php' ;
if(isset($_SESSION['email'])){ 


$userName = "";
  $email = "";
  $password = "";
  
  
  $phone_no = "";
  

if(isset($_GET['editt'])){
  $id = $_GET['editt'];
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
  
  header("location:/easy kayaking graduatiopn project/index.php"); 
}

  }

?>
<!DOCTYPE html>
<html lang="eng">
    <head>

        </title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="assets/css/SystemLogin.css"> 
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="formstyle.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<style>
  ul {
    padding-left: 0 !important;   
  }
</style>
</head>
<body>

<!--Sign In Page-->
<div class="body">
    <div class="container py-5">
 <img src="Logo_3-removebg-preview.png" alt="" id="logoImg">

        <div class=" p-5 m-auto text-center form-container " id="formContainer">
           
            
       <form action="#" method="post" class="signin_form hide">
            
            <div class="txt ">
                <label  >User Name</label>
                <div class="inputContainer">
                 
                    <input type="text" value="<?php echo $userName; ?>" class="form-control bg-transparent "  placeholder="User Name" name="username" required>
                </div>
</div>

                <div class="txt ">
                  <label  >email</label>
                  <div class="inputContainer">
                     
                      <input type="text" value="<?php echo $email; ?>" class="form-control bg-transparent "  placeholder="email" name="email"  required>
                  </div>
</div>

            <div class="txt">
                <label for="password">Password</label>
                <div class="inputContainer">
                    <input type="password" value="<?php echo $password; ?>" class="form-control bg-transparent" placeholder="********" name="password" minlength="8" required >
                </div>
            </div>



                <div class="txt ">
                  <label  >Phone Number</label>
                  <div class="inputContainer">
                      <input type="tel" value="<?php echo $phone_no; ?>" class="form-control bg-transparent "  placeholder="01xxxxxxxxx" name="phone" minlength="11" maxlength="11" required>
                  </div>
</div>
<style>
  ul {
    margin-bottom: 20px !important;   
  }
</style>

               
            <?php if(isset($_GET["editt"])){ ?>
              <button class="btn btn-outline-dark" name="update" style="background-color:FF9100;">Update</button> 

            <?php } ?>
        </form>
        </div>
    </div>
</div>
<!--=================== end SIGN IN ===================-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
 <script>
    const loginBtn = document.getElementById("loginBtn");
    const formContainer = document.getElementById("formContainer");
    const closeBtn = document.getElementById("closeBtn");
    const logoImg = document.getElementById("logoImg");
    loginBtn.addEventListener("click", function(e) {
        e.preventDefault();
        formContainer.classList.add("active");
        logoImg.classList.add("active");
    })
    closeBtn.addEventListener("click", function() {
        formContainer.classList.remove("active");
        logoImg.classList.remove("active");
    })
 </script>
</body>
</html>
    <?php }else{
        header("location:/easy kayaking graduatiopn project/index.php");
    } ?>