<?php
  include 'header.php';
  // include 'session.php';
include 'connection.php';
  include 'navbar.php';

  $seletQuery = "SELECT * FROM `user` WHERE `suspended`='NO'";
  $runSelect = mysqli_query($connect , $seletQuery);
  
  if(isset($_GET['delete'])){
      $userId = $_GET['delete'];
      $deleteQuery ="DELETE FROM `user` WHERE `user_id`=$userId";
      $runDelete = mysqli_query($connect , $deleteQuery); 
      header("location:staff.php");
  }
  
  if(isset($_GET['suspend'])){
    $userid = $_GET['suspend'];
    // after gettin the id of the user i want to suspend
    // i update his suspended statue in user table to be YES that he cannot login for a while
    $updateQuery = "UPDATE `user` 
    SET `suspended`= 'YES' WHERE `user_id` = $userid ";
    $runUpdate = mysqli_query($connect , $updateQuery);
  
  // here iam trying to insert the data of the suspended users to suspended users table in my databse
      $select = "SELECT * FROM `user` WHERE `user_id` = $userid";
      $runSelect = mysqli_query($connect , $select);
      $fetchArray = mysqli_fetch_assoc($runSelect);
  
      $email = $fetchArray['email'];
      $username = $fetchArray['username'];
      $password = $fetchArray['password'];
      $phone = $fetchArray['phone'];

  
      $inserQuery = "INSERT INTO `suspendedusers`
      VALUES (NULL ,'$username' ,'$email' , '$password' , '$phone')";
    $runInsert = mysqli_query($connect , $inserQuery);
    echo '
    <script type="text/javascript">
  window.location.replace("staff.php");
    </script>
    ';
    // $deleteQuery = "DELETE FROM `users` WHERE `id` = $userid";
    // $runDelete1 = mysqli_query($conn, $deleteQuery);
    }
?>
<?php if(isset($_SESSION['adminId'])){?>
<div class="text-right py-2 px-5">
  <!-- <a href="addstaff.php">
    <button class="btn btn-primary"> Add new </button>
  </a> -->
</div>  
<div class="table-content bg-white py-5 px-5 rounded">
 
  <table class="table table-hover ">
  <p class="h3">Users</p>
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>

      
      <th scope="col">DELETE</th>
      <th scope="col">SUSPENED</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($runSelect as $array){?>
    <tr>
      <td><?php echo $array['user_id'] ?></td>
      <td><?php echo $array['username'] ?></td>
      <td><?php echo $array['email'] ?></td>
      <td><?php echo $array['phone'] ?></td>
      <td><a class="btn btn-danger"href="staff.php?delete=<?php echo $array['user_id'] ;?>" class="btn btn-danger">DELETE</a></td>
      <td><a class="btn btn-danger"href="staff.php?suspend=<?php echo $array['user_id']?>" class="btn">Suspend</a></td>
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
}  ?>