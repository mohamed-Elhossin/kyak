<?php
  include 'navbar.php';
  include 'header.php';
  include 'session.php';

include 'Connection.php';
if(isset($_POST['add']))
{
  $file=$_FILES['file']; 
  $fileName = $_FILES['file']['name'];
  $fileTmpName= $_FILES['file']['tmp_name'];
  $fileSize= $_FILES['file']['size'];   
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $fileExt = explode('.',$fileName);
  $fileActualExt=strtolower(end($fileExt));
  $fileNameNew = uniqid('', true).".".$fileActualExt;
  $fileDestination = '../img/'.$fileNameNew;
  move_uploaded_file($fileTmpName,$fileDestination);
  
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $qu = "insert into `sessions` (session_name, session_price, session_description, session_img) values('$name', '$price', '$desc', '$fileNameNew')";
  mysqli_query($connect, $qu);
  echo "Added Successfully";
}
?>


<div class="login-form-home">
  <div class="login-form" style="width: 500px;">
    <form action="" class="form-group" method="POST" enctype="multipart/form-data">
      <h3>Add new Session</h3>

      
        <label for="">Name </label>
        <input type="text" name="name" class="form-control" placeholder='Name' id="name">
        <label for="">Price</label>
        <input type="text" name="price" class="form-control" placeholder='price' id="name">
        
        <label for="">Description</label>
        <input type="text" name="desc" class="form-control" placeholder='description' id="name">


        
      
      <label for="">Image</label>
      <input type="file" name="file" class="form-control" placeholder='image' accept="image/png, image/jpeg" id="name">
  
      <button type="submit" name="add" class="btn btn-block btn-success">Add</button>
      
    </form>
  </div>
</div>

<?php 
include '../footer.php';

?>