<?php
  // include 'session.php';
  include 'header.php';
include 'connection.php';
  include 'navbar.php';

  $selectQuery = "SELECT * FROM `suspendedusers`"; 
$runSelect = mysqli_query($connect , $selectQuery);

// $selectQuery1 = "SELECT * FROM `suspendedusers`";
//  retruive all data for the suspended users
// $runSelect1 = mysqli_query($conn , $selectQuery1);

if(isset($_GET['unsuspend'])){
  $uId = $_GET['unsuspend'];
  $selectQuery2 = "SELECT * FROM `suspendedusers` WHERE `id`=$uId"; 
  $runSelect2 = mysqli_query($connect , $selectQuery2);
  $array1 = mysqli_fetch_assoc($runSelect2);
  $email = $array1['email'];
  $password = $array1['password'];
  $updateQuery = "UPDATE `user` SET `suspended`='NO' WHERE `email`='$email' AND `password`='$password'"; 
  $runUpdate = mysqli_query($connect , $updateQuery);
  $deleteQurey = "DELETE FROM `suspendedusers` WHERE `id`=$uId";
  $runDelete = mysqli_query($connect , $deleteQurey);
  echo ' <script type="text/javascript">window.location.replace("staff.php");</script>';
}
?>
<?php if(isset($_SESSION['adminId'])){?>
<div class="text-right py-2 px-5">
  <a href="addstaff.php">
    <button class="btn btn-primary"> Add new </button>
  </a>
</div>  
<div class="table-content bg-white py-5 px-5 rounded">
 
  <table class="table table-hover ">
  <p class="h3">SuspendedUsers</p>
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>

      
      <!-- <th scope="col">DELETE</th> -->
      <th scope="col">UNSUSPENED</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($runSelect as $array){?>
    <tr>
      <td><?php echo $array['id'] ?></td>
      <td><?php echo $array['username'] ?></td>
      <td><?php echo $array['email'] ?></td>
      <td><?php echo $array['phone'] ?></td>
      <td><a class="btn btn-danger"href="suspendedusers.php?unsuspend=<?php echo $array['id']?>" class="btn">UnSuspend</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php 
include 'footer.php';
?>
<?php }else{
  header("location:login.php");
} ?>