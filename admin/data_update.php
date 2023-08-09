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
    $userdetails = mysqli_fetch_assoc($res2);

    $network = $userdetails['network'];
    $plan = $userdetails['bundle'];
    $price = $userdetails['price'];
  $type = $userdetails['type'];

  }else{
    header("location: data_prices.php");
    die();
  
  }


}else{
  header("location: data_prices.php");
  die();

}


if(isset($_POST['update'])){

  $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
	$type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);

	if($price == ""){
		$msg = "price is required";
	}

	if($type == ""){
		$msg = "type is required";
	}

  if($msg == ""){

    $sql3 = "UPDATE data_bundles SET price = '$price', type = '$type' WHERE id = '$uid'";
    $res3 = mysqli_query($conn, $sql3);
    if($res3){
      $success = "Data bundle updated successfully";
    }else{
      $msg = "Something went wrong. Please try again";
    }

  }

}


if(isset($_GET['id']) && $_GET['id'] != ""){
  $uid = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

  $sql2 = "SELECT * FROM data_bundles WHERE id = '$uid'";
  $res2 = mysqli_query($conn,$sql2);
  if(mysqli_num_rows($res2) > 0){
    $userdetails = mysqli_fetch_assoc($res2);

    $network = $userdetails['network'];
    $plan = $userdetails['bundle'];
    $price = $userdetails['price'];
  $type = $userdetails['type'];

  }else{
    header("location: data_prices.php");
    die();
  
  }


}else{
  header("location: data_prices.php");
  die();

}

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
                 
         <?php if($msg != ""){
				echo '<div class="alert alert-danger">'.$msg.'</div>';

					 } 
           if($success != ""){
            echo '<div class="alert alert-success">'.$success.'</div>';
    
               } 
           
           ?>
            <label class="normal"> Package</label>
           <div class="input-group mb-3">
           
           <input type="text"  class="form-control" value="<?php echo $network;?>" readonly />
         </div>
         <label class="normal"> Plan</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" value="<?php echo $plan;?>"  readonly>
         </div>
         
          <label class="normal"> Type</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="type" value="<?php echo $type;?>"  >
         </div><label class="normal"> Price</label>
          <div class="input-group mb-3">
         <input type="double" class="form-control" name="price" value="<?php echo $price;?>" >
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