<?php 
session_start();
include "../conn.php";
$msg = $success = "";
if(isset($_SESSION['ADMIN'])){

  $usernameph = $_SESSION['ADMIN'];

  $sql = "SELECT wallet, status FROM admin WHERE username = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  
  $wallets = $usrdetails['wallet'];
  $status = $usrdetails['status'];
 

}else{
  header("location: index.php");
  die();
}


}else{

  header("location: index.php");
  die();

}



include 'head.php'
?>
<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Airtime VTU Prices</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">Account</a></li>
								<li>Airtime VTU Prices</li>
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
               $i = 1;
                  $sql1 = "SELECT * FROM discount WHERE type = 'vtu' ORDER BY id DESC";
                  $res1 = mysqli_query($conn, $sql1);
                  while($vtuhistory = mysqli_fetch_assoc($res1)){

                  

?>
                <tr>
                    <td> <?php echo $vtuhistory['network']; ?> </td>
                   
                    
                 <td>    <?php echo $vtuhistory['discount']; ?>% </td>
                  
                   <td>
                   <a href="discount_master.php?id=<?php echo $vtuhistory['id'];?>"> <span style="
    background-color: #4242eb;
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
"> Edit </span> </a>              
                                      </td>
                  </tr>
<?php } ?>
              
               
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