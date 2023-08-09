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

if(isset($_POST['update'])){

  $pixel = $_POST["pixel"];

  if($pixel != ""){

   $sql = "UPDATE admin SET pixel = '$pixel'";
   $result = mysqli_query($conn,$sql);

   if($result){
    $success = "Pixel submitted successfully";
   }else{
    $msg = "  Something went wrong. Please try again";
   }


  }else{
    $msg = "Please insert pixel code";
  }

}

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Facebook Pixel</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Facebook Pixel</li>
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
   			<h6 class="m-0 font-weight-bold">Facebook Pixel </h6>
   		</div>
   		<form method="post" >
   			<div class="card-body">
         <?php if($msg != ""){
				echo '<div class="alert alert-danger">'.$msg.'</div>';

					 } 
           if($success != ""){
            echo '<div class="alert alert-success">'.$success.'</div>';
    
               } 
           
           ?>
            <label class="normal">Facebook Pixel</label>
           <div class="input-group mb-3">

           <textarea name="pixel" id="pixel" class="form-control" placeholder="Paste Facebook Pixel Here"></textarea>
         </div>
         
         
       <div id="loader">
           <input type="submit" class="btnn btn-primary" name="update" value="Update Pixel">
           </div>
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