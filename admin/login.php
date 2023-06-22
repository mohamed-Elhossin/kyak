<?php
include 'connection.php';
include 'header.php';
// if (isset($_SESSION['dash'])) {
//     header("Location: index.php");
//   } 
?>
<div class="login-form-home">
  <div class="login-form">
    <form action="" class="form-group" method="POST">
      <h3>login as admin</h3>
      <p>complete the following form </p>
      <?php 

      if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $selectQuery = "SELECT * FROM `admins` WHERE `email`='$email' AND `password`='$pass'";
    $runQuery = mysqli_query($connect,$selectQuery);
    $numRows=mysqli_num_rows($runQuery);
    $array = mysqli_fetch_assoc($runQuery);


    if($numRows == 1){
        $_SESSION['adminId'] = $array['id'];
        header("location:adminData.php");
        // echo"welcome ";
    }else{
      echo "<script>alert('the data you entered is wrong please try again')</script>";
}
      
      }
      //   if (empty($email) || empty($pass)) {
      //     echo "<div class='alert alert-danger'>email or password is wrong</div>";
      //   } else {
      //     $old = select("`users`","`email`='$email' AND `password`='$pass'");
      //     if ($old->rowCount() < 1) {
      //       echo "<div class='alert alert-danger'>email or password is wrong</div>";
      //     } else {
      //       $data = $old->fetch(PDO::FETCH_ASSOC);
            
      //       $_SESSION['email'] = $data['email'];
      //       $_SESSION['dash'] = true;
      //       echo "<div class='alert alert-success'>Login successfully</div>";
      //       if ($data['type'] == 'admin') {

      //         header("Refresh:2; url=addsession.php");
      //       } elseif ($data['type'] == 'delivery') {
              
      //         header("Refresh:2; url=delivery.php");
      //       } 
      //     }
      //   }
      // }

      ?>
      <label for="">Email</label>
      <input type="email" name="email" class="form-control" placeholder='Email'>
      <label for="" class="mt-3">Password</label>
      <input type="password" name="password" class="form-control" placeholder='Password'>
      
      <button type="submit" name="login" class="btn btn-block btn-success">Login</button>

    </form>
  </div>
</div>