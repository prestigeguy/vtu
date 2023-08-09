<?php 

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Update Price</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Update </li>
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
   			<h6 class="m-0 font-weight-bold"> Update Price </h6>
   		</div>
   		<form method="post">
   			<div class="card-body">
          <?php include '../errors.php';
           ?>
            <label class="normal"> Package</label>
           <div class="input-group mb-3">
           
           <input type="hidden" name="uid" value="<?php echo $uid ?>" />
           <input type="text"  class="form-control" value="<?php echo $unetwork; ?>" readonly />
         </div>
         <label class="normal"> Plan</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" value="<?php echo $uplan ?>" readonly >
         </div>
         
         <label class="normal"> Price</label>
          <div class="input-group mb-3">
         <input type="double" class="form-control" name="price" value="<?php echo $uprice ?>" required>
         </div>
         
           <input type="submit" class="btnn btn-primary" name="update" value="Update">
           
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