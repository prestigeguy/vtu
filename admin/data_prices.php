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


if(isset($_GET['id']) && $_GET['id'] != ""){
  $uid = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

  $sql2 = "SELECT * FROM data_bundles WHERE id = '$uid'";
  $res2 = mysqli_query($conn,$sql2);
  if(mysqli_num_rows($res2) > 0){
    
    $sql3 = "DELETE FROM data_bundles WHERE id = '$uid'";
    $res3 = mysqli_query($conn,$sql3);
    if($res3){
      echo "
      <script> alert('Data bundle deleted successfully!'); </script>
      ";
    }
  }


}


include 'head.php'
?>
<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Data Bundle Prices</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">Account</a></li>
								<li>Data Bundle Prices</li>
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
        <h5 class="m-0 font-weight-bold">Data Bundles </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th> Network </th>
                <th> Plan </th>
                 <th> Price </th>
                 <th> Type </th>
                 <th> Duration </th>
                   <th>Edit</th>
                   <th>Action</th>
                 </tr>
               </thead>
                  <tbody>
             
                  <?php
               $i = 1;
                  $sql1 = "SELECT * FROM data_bundles ORDER BY id DESC";
                  $res1 = mysqli_query($conn, $sql1);
                  while($datahistory = mysqli_fetch_assoc($res1)){

                  

?>
                <tr>
                    <td><?php echo $datahistory['network']; ?>  </td>
                 <td>  <?php echo $datahistory['bundle']; ?>  </td>
                  <td><?php echo $datahistory['price']; ?>  </td>
                   <td><?php echo $datahistory['type']; ?>   </td>
                    <td> <?php echo $datahistory['duration']; ?>  </td>
                   <td>
                   <a href="data_update.php?id=<?php echo $datahistory['id'];?>"> <span style="
    background-color: #4242eb;
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
"> Edit </span> </a>          
                                       </td>
                                       <td>
                   <a href="?id=<?php echo $datahistory['id'];?>" onclick="return confirm('Are you sure you want to delete this data bundle?');"> <span style="
    background-color: #af0606;
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
"> Delete </span> </a>          
                                       </td>
                  </tr>

              <?php } ?>
               
                  </tbody>
             </table>
           </div>
           <div style='padding: 10px 10px 0px; border-top: dotted 1px #CCC;'>

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