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

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $package = filter_var($_POST['package'], FILTER_SANITIZE_STRING);
  $client = filter_var($_POST['client'], FILTER_SANITIZE_STRING);
  $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
  $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
  $transaction = filter_var($_POST['transaction'], FILTER_SANITIZE_STRING);
  $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
  $time = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
  
	  if($username == ""){
		  $msg = "username is required";
	  }
    if($package == ""){
		  $msg = "service is required";
	  }
    if($client == ""){
		  $msg = "number is required";
	  }
    if($type == ""){
		  $msg = "category is required";
	  }
    if($amount == ""){
		  $msg = "amount is required";
	  }
    if($status == ""){
		  $msg = "status is required";
	  }
    if($transaction == ""){
		  $msg = "transaction ID is required";
	  }
    if($date == ""){
		  $msg = "date is required";
	  }
    if($time == ""){
		  $msg = "time is required";
	  }
    
    if($msg == ""){
      $realdate = "$date $time";

      $sql = "INSERT INTO history (uname,network,phone,type,amount,status,transid,date) VALUES('$username','$package','$client','$type','$amount','$status','$transaction','$realdate')";
      $res4 = mysqli_query($conn,$sql);
      if($res4){
        $success = "Transaction has been added successfully";
      }else{
        $msg = "Transaction not added";
      }
    }



  }


include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Add Transaction</h4>
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
   			<h6 class="m-0 font-weight-bold">Add Transaction </h6>
   		</div>
   		<form method="post">
   			<div class="card-body">
         <?php if($msg != ""){
echo "<div class='alert alert-danger'> $msg </div>";
        }
        if($success != ""){
          echo "<div class='alert alert-success'> $success </div>";
        }

          ?>
  <label class="normal"> Username</label>
           <div class="input-group mb-3">

           <input type="text" name="username" class="form-control" value="" placeholder="Username" required="" />
         </div>
         <label class="normal"> Service</label>
         <div class="input-group mb-3">
           <input type="text" name="package" class="form-control" value="" placeholder="Service" required="">
         </div>
         <label class="normal"> Number</label>
          <div class="input-group mb-3">
         <input type="text" class="form-control" name="client" value="" placeholder="Number" required="">
         </div>
         <label class="normal"> Category</label>
         <div class="input-group mb-3">
         <select class="form-control" name="type" required> 
          <option value=""> Select Category </option>
         
                      <option value='data'> Data </option>
                      <option value='vtu'> Airtime VTU </option> 
                      <option value='bill'> Cable TV</option>
                      <option value='edu'> Education Bills</option> 
                      <option value='elect'> Electricity</option> 
                      <option value='comm'> Transfer</option>
              
          
          
          
          </select>
         </div>
         <label class="normal"> Amount</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="amount" value="" placeholder="Amount" required="" >
         </div>
         <label class="normal"> Status</label>
         <div class="input-group mb-3">
         <select class="form-control" name="status" required> 
          <option value=""> Select Category </option>
          <?php
                      echo "
                      <option value='successful'> successful </option>
                      <option value='pending'> pending </option> 
                      <option value='cancelled'> cancelled</option>
                      <option value='SUCCESSFUL'> SUCCESSFUL</option>";
              
          
          ?>
          
          </select>
         </div>
         <label class="normal"> Transaction ID</label>
         <div class="input-group mb-3">
         <input type="text" class="form-control" name="transaction" value="" placeholder="Transaction ID" required >
         </div>
         <label class="normal"> Date</label>
          <div class="input-group mb-3">
           <input type="date" class="form-control" name="date"  value="" required="">
         </div>
         <label class="normal"> Time</label>
          <div class="input-group mb-3">
           <input type="time" class="form-control" name="time" value="" required="">
         </div>
           <input type="submit" class="btnn btn-primary" name="update" value="Add">
           
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