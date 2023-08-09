<?php
session_start();
include "../conn.php";
$msg = $success = "";
$date = date("Y-m-d H:s:i");
$tnx = uniqid('ID');
if(isset($_SESSION['uname'])){

  $usernameph = $_SESSION['uname'];
  
  $sql = "SELECT * FROM users WHERE username = '$usernameph' OR phone_number = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  $username = $usrdetails['username'];
  $wallets = $usrdetails['wallets'];

}else{
  header("location: ../login.php");
  die();
}

}else{

  header("location: ../login.php");
die();
}

$wdate = date("H:i:s");
if($wdate < "22:00:00" && $wdate > "07:00:00"){

if(isset($_POST['waltowal'])){


    $receiver = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
    
    
    if($receiver == ""){
      $msg = "Please input receiver username";
    }
    if($amount == ""){
      $msg = "Please input amount";
    }
   
    if($amount < 0){
        $msg = "Negative amount not allowed";
    }
    
    $sql = "SELECT * FROM users WHERE username = '$receiver' OR phone_number = '$receiver'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) > 0){
        $sqlfetch = mysqli_fetch_assoc($res);
        $receiveruname = $sqlfetch['username'];
    }else{
      $msg = "User not found";
    }
    
    if($wallets >= $amount){
    
    }else{
      $msg = "Insufficient balance. Kindly fund your wallet";
    }
    
    
    if($msg == ""){
    
      $sql1 = "UPDATE users SET wallets = wallets - '$amount' WHERE username = '$username'";
      $res1 = mysqli_query($conn, $sql1);
   //   echo $sql1;
    
      if($res1){
    
        $sql2 = "INSERT INTO history (uname, amount, transid, date, status) VALUES ('$username','$amount','$tnx','$date','Approved')";
        $res2 = mysqli_query($conn, $sql2);
        if($res2){
    
            
      $sql1 = "UPDATE users SET wallets = wallets + '$amount' WHERE username = '$receiveruname'";
      $res1 = mysqli_query($conn, $sql1);

      $sql2 = "INSERT INTO history (uname, amount, transid, date, status) VALUES ('$receiveruname','$amount','$tnx','$date','Approved')";
      $res2 = mysqli_query($conn, $sql2);

          $success = "Your transfer has been processed successfully";
    
        }
      }
    
    }
    
    }

}
    
    $sql = "SELECT * FROM users WHERE username = '$usernameph' OR phone_number = '$usernameph' LIMIT 1";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
$usrdetails = mysqli_fetch_assoc($res);

$wallets = $usrdetails['wallets'];

}


include "header.php";?>
		<!-- header end --><!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Transfer</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="dashboard.php">My Account</a></li>
								<li>Transfer</li>
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
            
   			<h6 class="m-0 font-weight-bold">Select Method </h6>
   		</div>
         <div style="margin-bottom: -20px;">
         <?php if($msg != ""){
echo "<div class='alert alert-danger'> $msg </div>";
        }
        if($success != ""){
          echo "<div class='alert alert-success'> $success </div>";
        }

          ?>
   			<div class="card-body">
                              <div class="input-group mb-3">
           <input type="text" name="wallet" id="phone1" value="" placeholder="Wallet: &#8358;<?php echo $wallets;?>" class="form-control" readonly>
         </div>
   			<div class="input-group mb-3">
               <select id="trans_method" class="form-control" onchange="transferCheck()">
                <option value="">Select Method</option>
                <?php 
                $wdate = date("H:i:s");
                if($wdate > "22:00:00" && $wdate < "07:00:00"){?>
               	<option value="waltowal">Wallet To Wallet(others)</option>
                <?php }?>
               </select>
           </div>
         </div>
       </div>
   <form id="CTW" method="post" style="display: none;">
        <div class="card-body">
        
            <div class="input-group mb-3">
               <input type="number" class="form-control" name="amount" placeholder="Amount" />
           </div>
           
           <input type="submit" class="btnn btn-primary" value="Transfer" name="comtowal">
           
       </div>
   </form>
   <form id="WTW" method="post" style="display: none;">
        <div class="card-body">
        
            <div class="input-group mb-3">
               <input type="text" class="form-control" name="user" placeholder="Recipent Username/Phone Number" />
           </div>
            <div class="input-group mb-3">
               <input type="number" class="form-control" name="amount" placeholder="Amount" />
           </div>
           
           <input type="submit" class="btnn btn-primary" value="Transfer" name="waltowal">
           
       </div>
   </form>



                   </div>
               </div>
   

      			</div>
      		</div>
      	</div>
      </div>
  </div>
  <footer>
			<div class="footer-bottom-area">
				<div class="container">
					<div class="social-icons text-center">
						<label>Find Us:</label>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						
					</div>
					<div class="copyright text-center">
						<p>SubForMe - All rights reserved - 2022 ©. </p>
						<a href="#"></a>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer end -->
		<script src="selecty.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
		    <script>

function toggleElement(id,uid)
{
    if(document.getElementById(id).style.display == 'none')
    {
        document.getElementById(id).style.display = '';
        document.getElementById(uid).innerHTML = 
    " <i class='fa fa-minus'></i> ";
    }
    else
    {
        document.getElementById(id).style.display = 'none';
        document.getElementById(uid).innerHTML = 
    " <i class='fa fa-plus'></i> ";
    }
}


</script>
		<!-- all js here -->
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap.bundle.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/jquery.mixitup.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
   
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    <script>

   //transfer
   var transplan = document.getElementById("trans_method");
   function transferCheck(){

    if (transplan.value == ""){
document.getElementById("CTW").style.display = "none";
    document.getElementById("WTW").style.display = "none";
 }
if (transplan.value == "comtowal"){
document.getElementById("CTW").style.display = "block";
    document.getElementById("WTW").style.display = "none";
 }
 if (transplan.value == "waltowal"){
document.getElementById("CTW").style.display = "none";
    document.getElementById("WTW").style.display = "block";
 }
}
</script>
    <script src="datacheck.js"></script>
    <script src="billcheck.js"></script>
    <script src="electchecks.js"></script>
      <script src="epinchecks.js"></script>
    </body>
</html>