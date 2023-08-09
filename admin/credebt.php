<?php 
session_start();
include "../conn.php";
$msg = $success = "";
$tnx = uniqid();
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
  $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
  $date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
  $time = filter_var($_POST['time'], FILTER_SANITIZE_STRING);
  
	  if($username == ""){
		  $msg = "username/phone number is required";
	  }
    if($type == ""){
		  $msg = "type is required";
	  }
    if($amount == ""){
		  $msg = "amount is required";
	  }
    if($date == ""){
		  $msg = "date is required";
	  }
    if($time == ""){
		  $msg = "time is required";
	  }

    $sql3 = "SELECT * FROM users WHERE username = '$username' OR phone_number = '$username'";
    $res3 = mysqli_query($conn, $sql3);

    if(mysqli_num_rows($res3) > 0){
      $usrdetails3 = mysqli_fetch_assoc($res3);
$realusername = $usrdetails3['username'];
    }else{
      $msg = "User not found.";
    }

    if($msg == ""){

      $realdate = "$date $time";

      if($type == "credit"){
        $sql5 = "UPDATE users SET wallets = wallets + '$amount' WHERE username = '$realusername'";
        $res5 = mysqli_query($conn,$sql5);
        if($res5){

          $sql = "INSERT INTO history (uname,type,amount,status,transid,date) VALUES('$realusername','wallet','$amount','SUCCESSFUL','$tnx','$realdate')";
          $res4 = mysqli_query($conn,$sql);
          if($res4){
            $success = "User wallet credited successfully";
          }else{
            $msg = "User wallet not credited";
          }

        }else{
          $msg = "User wallet not credited";
        }

      }else{

        $sql5 = "UPDATE users SET wallets = wallets - '$amount' WHERE username = '$realusername'";
        $res5 = mysqli_query($conn,$sql5);
        if($res5){

          $sql = "INSERT INTO history (uname,type,amount,status,transid,date) VALUES('$realusername','wallet','$amount','SUCCESSFUL','$tnx','$realdate')";
          $res4 = mysqli_query($conn,$sql);
          if($res4){
            $success = "User wallet debited successfully";
          }else{
            $msg = "User wallet not debited";
          }

        }else{
          $msg = "User wallet not debited";
        }

      }


    }


  }
include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Credit/Debit User</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Credit/Debit User</li>
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
   			<h6 class="m-0 font-weight-bold">Credit/Debit User </h6>
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
  <label class="normal"> Username/Phone Number</label>
           <div class="input-group mb-3">

           <input type="text" name="username" class="form-control" value="" placeholder="Username/Phone Number" required="" />
         </div>
         
         <label class="normal"> Method</label>
         <div class="input-group mb-3">
         <select class="form-control" name="type" required> 
          <option value=""> Select Method </option>
         
                      <option value='credit'> Credit </option>
                      <option value='debit'> Debit </option> 
              
          
          
          
          </select>
         </div>
         <label class="normal"> Amount</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="amount" value="" placeholder="Amount" required="" >
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