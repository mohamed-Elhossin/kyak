<?php

  include 'header.php';
  include 'session.php';

  include 'navbar.php';
?>
  
<div class="table-content bg-white mt-5 py-5 px-5 rounded">
  <div class="row">
    <div class="col-6">
      <p class="h3">All Kyaking Programs</p>
    </div>
    <div class="col-6 text-right">
      <a href="addprogram.php">
        <button class="btn btn-primary"> Add new </button>
        </a>
    </div>
    <div class="col-12 mt-4">
      <div class="row">
      
            <div class="col-md-6">
            
              <div class="card">

                <img src="" class="card-img-top" >
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h5 class="card-title"><b>Program Name: </b></h5>
                    </div>
                    <div class="col-6">
                      <div class="card-text"><b>Address: </b></div>
                      <div class="card-text"><b>Price: </b></div>
                      <div class="card-text"><b>Duration: </b> </div>
                    </div>
                    <div class="col-6">
                      <div class="card-text"><b>Transfers: </b> </div>
                      <div class="card-text"><b>Rally point: </b> </div>
                      <div class="card-text"><b>Return point: </b> </div>
                    </div>
                  </div>
                  <br>
                  <div class="card-text"><b>Description: </b></div>
                  <div class="text-right">
                    <a href="" class="btn btn-danger" onClick="javascript: return confirm('Please confirm deletion');">Delete</a>
                  </div>
                </div>
              </div>

            </div>
           
      </div>
    </div>
  </div>
    
  
  
</div>

<?php 
include 'footer.php';

?>
