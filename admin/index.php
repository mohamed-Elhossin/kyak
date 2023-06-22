<?php

  include 'header.php';
  include 'session.php';

  include 'navbar.php';
?>
  <?php if(isset($_SESSION['adminId'])){?>
<div class="table-content bg-white mt-5 py-5 px-5 rounded">
  <div class="row">
    <div class="col-6">
      <p class="h3">allin</p>
    </div>
    <div class="col-6 text-right">
      <a href="<?php echo url('admin/addhotel.php')?>">
        <button class="btn btn-primary"> Add new </button>
        </a>
    </div>
    <div class="col-12 mt-4">
      <div class="row">
      <?php 
        if (isset($_GET['id'])) {
          $idn = $_GET['id'];
          if(delete("allin",$idn)) {
            echo "<div class='alert alert-success col-12'>Deleted</div>"; 
            header("Refresh:2; url=index");
          }
        }
        $new = select("allin","`type`='allin'");
        if ($new->rowCount() == 0) {
          echo "<div class='alert alert-danger col-12'>No Items added</div>";
        } else {
          while($item = $new->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="col-md-6">
              <div class="card">
                <img src="<?= url('img/'.$item['image'])?>" class="card-img-top" >
                <div class="card-body">
                  <h5 class="card-title"><b>Name: </b><?= $item['title']?></h5>
                  <div class="card-text"><b>Address: </b><?= $item['address']?></div>
                  <div class="card-text"><b>Price: </b><?= $item['price']?></div>
                  <div class="card-text"><b>Description: </b><?= $item['description']?></div>
                  <div class="text-right">
                    <a href="<?= url('admin/index.php?id='.$item['id'])?>" class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion');">Delete</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
      ?>
      </div>
    </div>
  </div>
    
  
  
</div>

<?php 
include 'footer.php';
?>
<?php }else{
  header("location:login.php");
} ?>
