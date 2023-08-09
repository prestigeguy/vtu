<?php 
include 'head.php'
?>
<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Electricity Prices</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">Account</a></li>
								<li>Electricity Prices</li>
							</ul>
						</div>
			</div>
		</div>
	</div>
		<!-- welcome end -->
		<div class="container">
      <div class="row">
      	<div class="col-md-12">
      		<div class="wrapper-content">
      			<div class="wrap-inside">
      				<div class="row">
               <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
      <div class="card-header py-3 bgcard-header">
        <h5 class="m-0 font-weight-bold">Discount </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th> Service</th>
                <th> Discount </th>
                   <th>Edit</th>
                 </tr>
               </thead>
                  <tbody>
                <?php 

              

 



                 $sql = "SELECT * FROM discount WHERE network = 'Electricity' ORDER BY id ASC ";
                 $result = mysqli_query($db, $sql);
                 while($user = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?php echo $user['network']; ?> </td>
                   
                    
                 <td>  <?php 
                    
                     echo $user['price']."%";
               
                     ?>   </td>
                  
                   <td>
                                     
                                     <a href="discount_master_elect.php?id=<?php echo $user['id'];?>"> 
                                     <span class="badge badge-me badge-pending">Edit </span> </a>
                                         </td>
                  </tr>

                <?php } 
               mysqli_close($db);
                ?>
               
                  </tbody>
             </table>
           </div>


         </div>
    </div>
   </div>
 </div>

 	</div>
      		</div>
      	</div>
      </div>
  </div>
  <?php include 'foot.php' ?>