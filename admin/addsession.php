<?php
ob_start();
  include 'header.php';
  include 'session.php';
  include 'navbar.php';
  include 'connection.php';

  if(isset($_SESSION['adminId'])){ 
  $select = "SELECT * FROM `sessions`";
$run_select = mysqli_query($connect, $select);

//delete
if(isset($_GET['delete'])){ 
    $id =$_GET ['delete'] ;
    $delete="DELETE FROM `sessions` WHERE `session_id` =$id" ;
    $run_delete = mysqli_query ($connect , $delete) ;
    header("location: /easy kayaking graduatiopn project/admin/addsession.php");

}


$searched = false ;
if(isset($_POST['filter'])) {
    $searched = true ;
    $search =$_POST['search'];
    $select_search = "SELECT * FROM `sessions` WHERE `session_name`LIKE '%$search%'";
    $run_search =mysqli_query ($connect ,$select_search);
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>All Sessions</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
 
}

#customers tr:nth-child(even){
  background-color:#f0e1d6;
 }
#customers tr:hover {background-color:#f0e1d6 ;
}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#FF9100;
  color: white;
}
form{
   
   display: flex;
}
.ere{
  outline:none;
  padding:10px;
   width: 240px;
   height: 40px;
   margin-top: 15px;
   border-color: #ff9100;
   border-radius: 7px;
}
.er{
   margin-left: 7px;
   background-color:#ff9100;
   width: 120px;
   height: 40px;
   border:none;
   margin-top: 15px;
   border-color: #ff9100;
   border-radius: 7px;
   color:#fff;
   font-weight:600 !important;
   display: flex;
  align-items: center;
  justify-content: center;
}
.header{
  align-items:center;
  margin-right:2em;
  margin-left:2em;
   margin-top:2em;
   margin-bottom: 2em;
   display: flex;
   justify-content: space-between;
}
.left{
   display: flex;
   gap: 15px;
}
td a{
  padding-top:5px!important;
  color:black !important;
   font-weight:500 !important;
  background-color:#ff9100 !important;
  width : 100px;
  height:40px;
  border:none !important;
  border-radius:7px !important;
  display: inline-flex !important;
  align-items: center;
  justify-content: center;

}
table tr td:last-child {
  text-align: center;
}
table tr td:last-child a {
  color: #fff !important;
}
.tableContainer {
  padding: 0 1rem;
}
</style>
</head>
<body>

<div class="header">
<h1 >SESSION TABLE</h1>
<form method ="POST" >
    <input class="ere" type = "text" name = "search" >
    <button class="er" type = "submit" name ="filter" > Search </button>
    <button class="er" type="submit" name="refresh">Reset</button>
    <li class="er" style="color: white; text-decoration: none;">
        <a class="" href="addnsession.php" style="color: white; text-decoration: none;">Add Session</a>
      </li>
</form>
</div>

<?php if($searched) {?> 

<div class="tableContainer">
  <table id="customers">
<tr>
<th>Session Name</th>
<th> Price</th>
<th>Description</th>
<th>Delete</th>
<th>Update</th>
<!-- <th>Salary</th>
<th>Address</th>
<th>phone-Number</th>
<th>NATIONAL-ID</th>
<th>Actions</th> -->

</tr>


<?php foreach ($run_search as $data) { ?>





<tr>
<td> <?php echo $data['session_name'];?></td>
<td><?php echo $data['session_price'];?></td>
<td><?php echo $data['session_description'];?></td>

  <td>
    <a class="btn btn-dark badge-pill " href= "/easy kayaking graduatiopn project/admin\addsession.php?delete=<?php echo $data['session_id'];?>"> Delete</a>

</td>
  <td>
  <a class="btn btn-dark badge-pill " href= "/easy kayaking graduatiopn project/admin\session_update.php?editt=<?php echo $data['session_id'];?>"> Update</a>

</td>
</tr>

<?php } ?>
 
</table>
  </div>

<?php } else { ?>

<div class="tableContainer">
  <table id="customers">
  <tr>
    <th>Session Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Delete</th>
    <th>Update</th>
    <!-- <th>Salary</th>
    <th>Address</th>
    <th>phone-Number</th>
    <th>NATIONAL-ID</th>
    <th>Actions</th> -->
    
  </tr>



<?php foreach ($run_select as $record) { ?>





  <tr>
  <td> <?php echo $record['session_name'];?></td>
  <td><?php echo $record['session_price'];?></td>
  <td><?php echo $record['session_description'];?></td>

    <td >
      <a class="btn btn-dark badge-pill " href= "/easy kayaking graduatiopn project/admin/addsession.php?delete=<?php echo $record['session_id'];?>"> Delete</a>
</td>
    <td >
    <a class="btn btn-dark badge-pill " href="/easy kayaking graduatiopn project/admin/session_update.php?editt=<?php echo $record['session_id'];?>"> Update</a>
</td>
  </tr>

 <?php } ?>
   
</table>
</div>
<?php } ?>

</body>
</html>
    <?php } else{
        header("location:/easy kayaking graduatiopn project/admin/login.php");
    } ?>

<?php 
include 'footer.php';

?>
