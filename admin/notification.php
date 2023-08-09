<?php 
include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Notification</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Notification</li>
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
      			<div class="wrap-inside" style="padding: 0px;">
                   <div class="container-fluid" style="padding-left: 0px; padding-right: 0px;">
                     	<div class="card shadow form-box mb-4">
   		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   			<h6 class="m-0 font-weight-bold"> Add Notification </h6>
   		</div>
   		<form method="post">
   			<div class="card-body">
          <?php include '../errors.php';
             echo $msg;
           ?>
            <script src="ckeditor/ckeditor.js" ></script>
            <div class="input-group mb-3">
           
           <textarea name="message" id="editor"  />
           
           </textarea>
         </div>
         
           <div class="input-group mb-3">
           
           <select class="form-control" name="type" />
           <option value="">Select Page</option>
           <option value="Dashboard">Dashboard</option>
           <option value="Buy Data">Buy Data Page</option>
           <option value="Airtime VTU">Airtime VTU Page</option>
           <option value="Electricity">Electricity Page</option>
           <option value="Fund Wallet">Fund Wallet Page</option>
           <option value="Cable TV">Cable TV Page</option>
           <option value="Education">Education Page</option>
           </select>
         </div>
         
           <input type="submit" class="btnn btn-primary" name="update" value="Add">
           
       </div>
   </form>
  



                   </div>
               </div>

                <div class="row">
               <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
      <div class="card-header py-3 bgcard-header">
        <h5 class="m-0 font-weight-bold">Notifications </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
              <tr>
                <th> Message </th>
                 <th> Page </th>
                  <th> Status </th>
                    <th> Action </th>
                     <th> Action </th>
                   <th> Action </th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                 $sql = "SELECT * FROM notify ORDER BY status";
                 $result = mysqli_query($db, $sql);
                 while($user = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td>  <?php 
                    echo $user['message'];
                     ?>   </td>
                  <td> <?php echo $user['type']; ?> </td>
                  <td> <?php  if($user['status'] == 1){ echo "Hidden";}else{ echo "Visible"; } ?> </td>
              
                 <td>     
                                     <a href="notification.php?id=<?php echo $user['id'];?>&action=show"> 
                                      <button type="submit" class="btnn btn-info"> Show </button> </a>
                                    
                                  </td>
                                  
                                   <td>     
                                     <a href="notification.php?id=<?php echo $user['id'];?>&action=hide"> 
                                      <button type="submit" class="btnn btn-danger"> Hide </button> </a>
                                    
                                  </td>
                                   <td>     
                                     <a href="notification.php?id=<?php echo $user['id'];?>&action=delete"> 
                                      <button type="submit" class="btnn btn-primary"> Delete </button> </a>
                                    
                                  </td>
                  </tr>
            
                <?php  } ?>
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

<script>
    CKEDITOR.replace('editor');
</script>
  <?php include 'foot.php' ?> 