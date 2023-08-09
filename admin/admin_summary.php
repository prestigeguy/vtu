<?php 
include 'head.php'
?>
<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Admin Wallet Summary</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">Account</a></li>
								<li>Admin Wallet Summary</li>
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
        <h5 class="m-0 font-weight-bold">Transactions </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th> Service </th>
                 <th> Amount </th>
                 <th> Before </th>
                 <th> After </th>
                 <th> Trans. Id </th>
                   <th> Date </th>
                   <th>Query</th>
                 </tr>
               </thead>
                  <tbody>
              

                <tr>
                  
                 <td>   </td>
                  <td>  </td>
                   <td> </td>
                    <td> </td>
                  
             

                  <td>  </td>
                <td></td>
                   <td>
                                     
                                    
                                     <a href=""> 
                                     <span class="badge badge-me badge-error" onClick="return confirm('Do you really want to delete');"> Delete </span></a>
                                  </td>
                  </tr>

                
               
                  </tbody>
             </table>
           </div>
           <div style='padding: 10px 10px 0px; border-top: dotted 1px #CCC;'>

</div>
<ul class="pagination">
 
</ul>

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