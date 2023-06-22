<?php
  include '../header.php';
  include 'session.php';

  include 'navbar.php';
  
  if (isset($_GET['open']) && !empty($_GET['open']) ) { 
    $id = $_GET['open'];
    $payId = $_GET['id'];
    if (@$_GET[''] == 'tools') {
      $data = select('tools',"`id`='$id'");
      $arrayData = $data->fetch(PDO::FETCH_ASSOC);
      if ($arrayData < 1) {
        header("Location: request.php");
      }
    } else {

      $data = select('allin',"`id`='$id'");
      $arrayData = $data->fetch(PDO::FETCH_ASSOC);
      if ($arrayData < 1) {
        header("Location: request.php");
      }
    }
    $datanew = select('payment',"`id`='$payId'");
    $arrayDatanew = $datanew->fetch(PDO::FETCH_ASSOC);

    
  } else {
    header("Location: request.php");
  }
?>
  <div class="container mb-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="customt mt-4 text-center">
          <h6>Order details</h6>
        </div>
      <div class="custom mt-2">
        <div class="row">
          <div class="col-md-6">
            <div class="customt">
              <h6>Personal information</h6>
            </div>
            <div class="custom mt-2">
            
              <h6 class="">Name: <p class="d-inline-block"><?= $arrayDatanew['name'];?></p></h6>
              <h6 class="">Card number: <p class="d-inline-block"><?= $arrayDatanew['card']?></p></h6>
                <h6 class="">Expire date: <p class="d-inline-block"><?= $arrayDatanew['date']?></p></h6>
                <h6 class="">CVS: <p class="d-inline-block"><?= $arrayDatanew['cvs']?></p></h6>
            </div>
          </div>
          <div class="col-md-6">
              <div class="customt">
                <h6>Product information</h6>
              </div>
              <div class="custom mt-2 row">
                <div class="col-12">
                  <img width="60%" class="rounded-circle mx-auto d-block" src="<?= url('img/'.$arrayData['image'])?>" alt="">
                </div>
                <div class="col-12 mt-4">
                  <h6 class="">Name: <p class="d-inline-block"><?= $arrayData['title']?></p></h6>
                  <h6 class="">Address: <p class="d-inline-block"><?= $arrayData['address']?></p></h6>
                  <h6 class="">Description: <p class="d-inline-block"><?= $arrayData['description']?></p></h6>
                </div>
                
              
            
            </div>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
  

<?php 
include '../footer.php';

?>