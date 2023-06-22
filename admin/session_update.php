<?php
ob_start();
  include 'header.php';
  include 'session.php';
  include 'connection.php' ;
  include 'navbar.php';
  

  if(isset($_SESSION['adminId'])){ 


    $sessionName = "";
      $price = "";
      $descriptionn = "";


      if(isset($_GET['editt'])){
        $id = $_GET['editt'];
        $select = "SELECT * FROM `sessions` WHERE `session_id` = $id";
        $selectQuery = mysqli_query($connect, $select);
        $fetchRow = mysqli_fetch_assoc($selectQuery);
        $userName = $fetchRow["session_name"];
        $email = $fetchRow["session_price"];
        $password = $fetchRow["session_description"];
      
      
        
      }



      if(isset($_POST['update'])) {

        $user_name = $_POST['session_name'];
        $e_mail = $_POST['session_price'];
        $pass = $_POST['session_description'];
      
       
        
        $s= "SELECT *FROM `sessions` WHERE `session_name` ='$user_name'";
        $run_select = mysqli_query ($connect, $s);
        $num = mysqli_num_rows($run_select);
      if ($num== 1){
        echo "session name already taken";
      }
      else{
      
        $update ="UPDATE `sessions`
        SET `session_name`= '$user_name',
        `session_price`='$e_mail',
        `session_description`='$pass'
       
       
        WHERE `session_id` = $id ";
        $run_update=mysqli_query($connect , $update);
        
        header("location:/easy kayaking graduatiopn project/admin/addsession.php"); 
      }
      
        }


    
?>

<div class="login-form-home">
  <div class="login-form" style="width: 500px;">
    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
      <h3>Update Session</h3>

      
        <label for="">Name </label>
        <input type="text" name="session_name" class="form-control" placeholder='Name' value="<?php echo $sessionName; ?>">
        <label for="">Price</label>
        <input type="text" name="session_price" class="form-control" placeholder='price' value="<?php echo $price; ?>">
        
        <label for="">Description</label>
        <input type="text" name="session_description" class="form-control" placeholder='description' value="<?php echo $descriptionn; ?>">
        
      
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