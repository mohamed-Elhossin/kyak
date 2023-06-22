<?php
  include 'header.php';
  include 'connection.php';
    include 'navbar.php';


?>
<?php if(isset($_SESSION['adminId'])){ 
     $select =  "SELECT `user`.`user_id`, `user`.`username`, `contactus`.`message`
     FROM `user`
     JOIN `contactus`
     ON `user`.`user_id` = `contactus`.`user_id`";
     $run = mysqli_query($connect , $select);?>
<div class="text-right py-2 px-5">
  <a href="addstaff.php">
    <button class="btn btn-primary"> Add new </button>
  </a>
</div>  
<div class="table-content bg-white py-5 px-5 rounded">
 
  <table class="table table-hover ">
  <p class="h3">Staff</p>
  <thead>


    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">MESSAGE</th>
      <!-- <th scope="col">Phone</th> -->

      
      <!-- <th scope="col">DELETE</th>
      <th scope="col">SUSPENED</th> -->
    </tr>
  </thead>
  <tbody>
  <?php foreach($run as $array){?>
    <tr>
      <td><?php echo $array['user_id'] ?></td>
      <td><?php echo $array['username'] ?></td>
      <td><?php echo $array['message'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php include 'footer.php'?>
<?php }else{
    header("locaion:login.php");
} ?>