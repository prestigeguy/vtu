<?php 

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Change Password</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Change Password</li>
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
   			<h6 class="m-0 font-weight-bold">Change Password </h6>
   		</div>
   		<form method="post">
   			<div class="card-body">
       
            <label class="normal">Old Password</label>
           <div class="input-group mb-3">

           <input type="password" name="opassword" class="form-control" value="" placeholder="Old Password" required="" />
         </div>
         
         <label class="normal">New Password</label>
           <div class="input-group mb-3">

           <input type="password" name="password" class="form-control" value="" placeholder="New Password"  />
         </div>
         <label class="normal"> Confirm New Password</label>
           <div class="input-group mb-3">

           <input type="password" name="cpassword" class="form-control" value="" placeholder="Confirm New Password"/>
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