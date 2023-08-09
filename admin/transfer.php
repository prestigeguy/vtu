<?php 

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Transfer</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Transfer</li>
							</ul>
						</div>
			</div>
		</div>
	</div>
		<!-- welcome end -->
		<!-- dashbord home -->
    <div class="container">
      <div class="row">
      	<div class="col-md-12">
      		<div class="wrapper-content">
      			<div class="wrap-inside">
                   <div class="container-fluid">
                     	<div class="card shadow form-box mb-4">
   		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   			<h6 class="m-0 font-weight-bold">Transfer to SubAndGain Wallet </h6>
   		</div>
   		<form method="post">
   			<div class="card-body">
          <?php include '../errors.php';
             echo $msg;
           ?>
   <div class="input-group mb-3">
           <input type="text" class="form-control" placeholder="Admin Wallet: &#8358;<?php echo $admwalwallet ?>" readonly>
         </div>
         
        
         <label class="normal"> Amount</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="amount" value="" placeholder="Amount" required="" >
         </div>
        
        
           <input type="submit" class="btnn btn-primary" name="update" value="Transfer">
           
       </div>
   </form>
  



                   </div>
               </div>
               
          

      			</div>
      		</div>
      	</div>
      </div>
  </div>

  <?php include 'foot.php' ?> 