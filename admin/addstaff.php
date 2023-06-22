<?php
  include 'header.php';
  include 'connection.php';
  include 'navbar.php';
?>
<?php if(isset($_SESSION['adminId'])){?>
<div class="login-form-home">
  <div class="login-form">
    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
      <h3>Adding</h3>
      <p>Add new member</p>
      <?php 
      if(isset($_POST['addstaff'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['conpassword'];

        if(empty($fname)) {
          echo "firstname is required";
        } elseif(!preg_match("/^[a-zA-Z0-9_]*$/", $fname)) {
          echo "adminName should only contain letters, numbers and underscores";
        }elseif(empty($lname)){
          echo "last name is required";
        } elseif(empty($email)) {
          echo "please enter your email";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "invalid email format";
        } elseif(empty($password)) {
          echo "please enter your password";
        } elseif(strlen($password) < 8) {
          echo "Password should be at least 8 characters long.";
        } elseif(!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)) {
          echo "Password should contain at least one special character.";
        } elseif(empty($confirmPassword)){
          echo "please enter your confirm password";
        } elseif($confirmPassword != $password){
          echo "passwords isnot match";
        } else {
          // Check if email already exists in the database
          $checkQuery = "SELECT * FROM `admins` WHERE `email` = '$email'";
          $result = mysqli_query($connect, $checkQuery);
          if(mysqli_num_rows($result) > 0) {
            echo "Email already exists. Please choose a different email.";
          } else {
            // Hash the password and insert new admin data into the database
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO `admins` VALUES (NULL, '$fname', '$lname', '$email', '$password' , '$phone')";
            $runQuery = mysqli_query($connect, $insertQuery);
          }
      }
    }
        // if (isset($status)) {
        //   echo $status;
        // }
        // if (isset($_POST['addstaff'])) {

        //   $firstname = $_POST['firstname'];
        //   $lastname = $_POST['lastname'];
        //   $email = $_POST['email'];
        //   $phone = $_POST['phone'];
        //   $password = $_POST['password'];
        //   $conpassword = $_POST['conpassword'];
        //   $role = 'admin';
        //   $image = moveimageadmin('image');
        //   $nameN = $firstname ." ".$lastname;
        //   if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($conpassword) || empty($role)) {
        //     echo "<div class='alert alert-danger'>wrong data</div>";
        //   } else {
        //     if ($password === $conpassword) {

        //       $old = select("`users`","`email`='$email' AND `type`='$role'");
        //       if ($old->rowCount() < 1) {
        //         if(insert('`users`','`name`,`email`,`phone`,`password`,`profile`,`type`',"'$nameN','$email','$phone','$password','$image','$role'"))
        //         {
        //           echo "<div class='alert alert-success'>Added</div>";
        //         }
        //       } else {
        //         echo "<div class='alert alert-danger'>User is exist</div>";

        //       }
              
        //     } else {
        //       echo "<div class='alert alert-danger'>wrong data</div>";
        //     }
        //   }
        // }
      ?>
      <div class="row">
        <div class="col-md-6">
          <label for="">Frist name</label>
          <input type="text" name="firstname" class="form-control" placeholder='First name'>
        </div>
        <div class="col-md-6">
          <label for="">Last name</label>
          <input type="text" name="lastname" class="form-control" placeholder='Last name'>
        </div>
      </div>
      <label for="" class="mt-3">Email</label>
      <input type="email" class="form-control " name='email' placeholder="Email">
      <label for="" class="mt-3">Phone</label>
      <input type="text" class="form-control " name='phone' placeholder="Phone">
    
      <div class="row">
        <div class="col-md-6">
          <label for="">Password</label>
          <input type="password" name="password" class="form-control" placeholder='Password'>
        </div>
        <div class="col-md-6">
          <label for="">Confirm password</label>
          <input type="password" name="conpassword" class="form-control" placeholder='Password'>
        </div>
      </div>
      
      
      <button type="submit" name="addstaff" class="btn btn-block btn-primary">Add</button>
    </form>
  </div>
</div>

<?php 
include 'footer.php';

?>
<?php }else{
  header("location:login.php");
} ?>