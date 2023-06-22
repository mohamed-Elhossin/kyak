<?php
ob_start();
  include 'header.php';
  include 'session.php';
  include 'connection.php' ;
  include 'navbar.php';
  

  if(isset($_SESSION['adminId'])){ 


    $fullName = "";
      $email = "";
      $password = "";
      $phone = "";


      if(isset($_GET['editt'])){
        $id = $_GET['editt'];
        $select = "SELECT * FROM `admins` WHERE `id` = $id";
        $selectQuery = mysqli_query($connect, $select);
        $fetchRow = mysqli_fetch_assoc($selectQuery);
        $fullName = $fetchRow["fullname"];
        $email = $fetchRow["email"];
        $password = $fetchRow["password"];
        $phone = $fetchRow["phone"];
      
      
        
      }



      if(isset($_POST['update'])) {

        $fullName2 = $_POST['fullname'];
        $email2 = $_POST['email'];
        $password2 = $_POST['password'];
        $phone2 = $_POST['phone'];
      
       
        
        $s= "SELECT *FROM `admins` WHERE `email` ='$email2'";
        $run_select = mysqli_query ($connect, $s);
        $num = mysqli_num_rows($run_select);
      if ($num== 1){
        echo "email already taken";
      }
      else{
      
        $update ="UPDATE `admins`
        SET `fullname`= '$fullName2',
        `email`='$email2',
        `password`='$password2',
        `phone`='$phone2'
       
       
        WHERE `id` = $id ";
        $run_update=mysqli_query($connect , $update);
        
        header("location:/easy kayaking graduatiopn project/admin/adminData.php"); 
      }
      
        }


    
?>

<div class="login-form-home">
  <div class="login-form" style="width: 500px;">
    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
      <h3>Update My Data</h3>

      
        <label for="">FullName</label>
        <input type="text" name="fullname" class="form-control" placeholder='FullName' value="<?php echo $fullName; ?>">
        <label for="">Email</label>
        <input type="email" name="email" class="form-control" placeholder='Email' value="<?php echo $email; ?>">
        
        <label for="">password</label>
        <input type="password" name="password" class="form-control" placeholder='Password' value="<?php echo $password; ?>">
        
        <label for="">phone</label>
        <input type="number" name="phone" class="form-control" placeholder='PhoneNumber' value="<?php echo $phone; ?>">
        
      
      <!-- <label for="">Description</label>
      <textarea name="details" cols="30" rows="4" class="form-control" placeholder='Details'></textarea> -->
      <?php if(isset($_GET["editt"])){ ?>
      <button type="submit" name="update" class="btn btn-block btn-success">Update</button>
      <?php } ?>
    </form>
  </div>
</div>
<?php } ?>
<?php 
include '../footer.php';

?>