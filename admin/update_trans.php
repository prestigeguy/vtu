<?php 

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Update Transaction</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Update</li>
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
   			<h6 class="m-0 font-weight-bold"> Transaction </h6>
   		</div>
   		<form method="post">
   			<div class="card-body">
          <?php include '../errors.php';
             echo $msg;
           ?>

           <div class="input-group mb-3">
           
           <input type="hidden" name="uid" value="<?php echo $uid ?>" />
           <input type="text"  class="form-control" value="<?php echo $uname; ?>" readonly />
         </div>
         <label class="normal"> Service</label>
         <div class="input-group mb-3">
           <input type="text" name="package" class="form-control" value="<?php echo $upack ?>" >
         </div>
         <label class="normal"> Number</label>
          <div class="input-group mb-3">
         <input type="text" class="form-control" name="client" value="<?php echo $uclient ?>" >
         </div>
         
         <label class="normal"> Amount</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="amount" value="<?php echo $uamount ?>" required >
         </div>
       
         <?php
         if($admwalisamb == 1){ ?>
         <label class="normal"> Status</label>
         <div class="input-group mb-3">
         <select class="form-control" name="status" required> 
          <option value=""> Select Category </option>
          <?php
              if($ustatus=="successful"){
              echo "<option value='successful' selected> successful </option>
                      <option value='pending'> pending </option> 
                      <option value='cancelled'> cancelled</option>
                      <option value='SUCCESSFUL'> SUCCESSFUL</option> ";
              }elseif($ustatus=="pending"){
              echo "
              <option value='successful'> successful </option>
                      <option value='pending' selected> pending </option> 
                      <option value='cancelled'> cancelled</option>
                      <option value='SUCCESSFUL'> SUCCESSFUL</option> ";
              }elseif($ustatus=="cancelled"){
                echo "<option value='successful'> successful </option>
                <option value='pending'> pending </option> 
                <option value='cancelled' selected> cancelled</option>
                <option value='SUCCESSFUL'> SUCCESSFUL</option>";
                }elseif($ustatus=="SUCCESSFUL"){
                  echo "
                  <option value='successful'> successful </option>
                      <option value='pending'> pending </option> 
                      <option value='cancelled'> cancelled</option>
                      <option value='SUCCESSFUL' selected> SUCCESSFUL</option> ";
                  }else{
                      echo "
                      <option value='successful'> successful </option>
                      <option value='pending'> pending </option> 
                      <option value='cancelled'> cancelled</option>
                      <option value='SUCCESSFUL'> SUCCESSFUL</option>";
                    }
              
          
          ?>
          
          </select>
           
         </div>
         
         <?php } ?>
         <label class="normal"> Transaction ID</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" value="<?php echo $utrans ?>" readonly >
         </div>
         <label class="normal"> Date</label>
          <div class="input-group mb-3">
           <input type="date" class="form-control" name="date" value="" >
         </div>
         <label class="normal"> Time</label>
          <div class="input-group mb-3">
           <input type="time" class="form-control" name="time" value=""  >
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