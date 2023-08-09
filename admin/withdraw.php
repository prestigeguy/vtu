<?php 
session_start();
include "../conn.php";
$msg = $success = "";
if(isset($_SESSION['ADMIN'])){

  $usernameph = $_SESSION['ADMIN'];

  $sql = "SELECT * FROM admin WHERE username = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  
  $wallets = $usrdetails['wallet'];
  $status = $usrdetails['status'];
  $accname = $usrdetails['accname'];
  $accno = $usrdetails['accno'];
  $bank = $usrdetails['bank'];
 

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

  $sql2 = "SELECT * FROM wth WHERE id = '$uid'";
  $res2 = mysqli_query($conn,$sql2);
  if(mysqli_num_rows($res2) > 0){
    
    $sql3 = "UPDATE wth SET status = 'SUCCESSFUL' WHERE id = '$uid'";
    $res3 = mysqli_query($conn,$sql3);
    if($res3){
      echo "
      <script> alert('Withdrawal updated successfully!'); </script>
      ";
    }
  }


}

if(isset($_POST['update'])){

	$amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);

  if($amount < 100){
    $msg = "Minimum withdrawal is N100";
  }

  if($amount == ""){
    $msg = "Please input amount";
  }
  if($wallets < $amount){
    $msg = "Insufficient balance";
  }

  if($bank == "" || $accno == "" || $accname == ""){
    $msg = "Please input your bank details in the settings page. Click <a href='settings.php'>HERE</a> to update your bank details.";
  }

  if($msg == ""){
    $sql = "UPDATE admin SET wallet = wallet - $amount";
    $res = mysqli_query($conn,$sql);

    if($res){
   $tnx = uniqid();
      $sql = "INSERT INTO wth (transid,status,amount,bank,accno,accname) VALUES('$tnx','PENDING','$amount','$bank','$accno','$accname')";
      $res4 = mysqli_query($conn,$sql);
      if($res4){
        $success = "Withdrawal placed successfully. The money will be disbursed within 24hours.";
      }else{
        $msg = "Something went wrong";
      }

    }else{
      $msg = "Something went wrong";
    }
  }


}


include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Withdrawal</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Withdrawal</li>
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
                     	     <div class="alert alert-info alert-dismissible fade show" role="alert" style="border-left: 5px solid blue;">
                  <b>NOTE: Charge fee of N11 applied to withdrawal of N10,000 and below, Charge fee of N50 applied to withrawal above N10,000.</b> 
                   <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                     <span aria-hidden="true">&times; </span>
                   </button>
                        </div>
   		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   			<h6 class="m-0 font-weight-bold">Withdrawal </h6>
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
   <div class="input-group mb-3">
           <input type="text" class="form-control" placeholder="Admin Wallet: &#8358;<?php echo $wallets;?>" readonly>
         </div>
         
        
         <label class="normal"> Amount</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="amount" value="" placeholder="Amount (minimum 100)" required="" >
         </div>
        
        
           <input type="submit" class="btnn btn-primary" name="update" value="Withdraw">
           
       </div>
   </form>
  



                   </div>
               </div>
               
               <div class="row">
               <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
      <div class="card-header py-3 bgcard-header">
        <h5 class="m-0 font-weight-bold">Withdrawal History </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th> Bank </th>
                <th> Account No. </th>
                 <th> Account Name. </th>
                <th> Amount </th>
                <th> Bank Charge </th>
                <th> You Receive </th>
                 <th> Status </th>
                  <th> Trans ID. </th>
                  <th> Date </th>
                  <th> Action </th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                 $sql = "SELECT * FROM wth  ORDER BY `id` DESC";
                 $result = mysqli_query($conn, $sql);
                 while($user = mysqli_fetch_assoc($result)) { ?>
                <tr>
                   <td> <?php echo $user['bank']; ?> </td>
                   <td> <?php echo $user['accno']; ?> </td>
                   <td> <?php echo $user['accname']; ?> </td>
                  <td> &#8358;<?php echo $user['amount']; ?> </td>
                  <td> &#8358;<?php if($user['amount'] <= 10000){ echo "11";}else{ echo "50";} ?> </td>
                  <td> &#8358;<?php if($user['amount'] <= 10000){ echo $user['amount']-11;  }else{ echo $user['amount']-50; } ?> </td>
                  
                  <?php if($user['status'] == "PENDING"){ ?>
                  <td style="color: red;"><b> <?php echo $user['status']; ?> </b></td>
                <?php } if($user['status'] == "SUCCESSFUL"){ ?>
                  <td style="color: green;"><b> <?php echo $user['status']; ?> </b></td>
                <?php } ?>
                <td> <?php echo $user['transid']; ?> </td>
                <td> <?php $wdate = $user['date'];
                       echo date("D d F, Y; g:i A", strtotime($wdate));
                   ?></td>
                      <td><a href="?id=<?php echo $user['id'];?>"> <span style="
    background-color: #4242eb;
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
"> SUCCESSFUL </span> </a> </td>
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