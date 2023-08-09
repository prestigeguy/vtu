<?php
session_start();
include "../conn.php";

if(isset($_SESSION['uname'])){

  $usernameph = $_SESSION['uname'];
  
  $sql = "SELECT * FROM users WHERE username = '$usernameph' OR phone_number = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  $username = $usrdetails['username'];
  $wallets = $usrdetails['wallets'];
  $ugtbacc = $usrdetails['gtbacc'];
  $usteracc = $usrdetails['steracc'];
  $uwemaacc = $usrdetails['wemaacc'];

}else{
  header("location: ../login.php");
  die();
}

}else{

  header("location: ../login.php");
die();
}


include "header.php";
?>

		<!-- header end --><!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Welcome to dashboard</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="dashboard.php">My Account</a></li>
								<li>dashboard</li>
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
      			<div class="alert alert-info alert-dismissible fade show" role="alert" style="border-left: 5px solid blue;">
      			
            <?php 
            $sql7 = "SELECT * FROM notify WHERE status = 'show' AND type = 'Dashboard'";
            $res7 = mysqli_query($conn,$sql7);
            if(mysqli_num_rows($res7)>0){
              $fecthnotify = mysqli_fetch_assoc($res7);
              $notifictaion = $fecthnotify['message'];

              echo $notifictaion;
            }
            
            ?>

      			
              <hr/> <a href="" class="btnn btn-primary" style="background: #31C847;"> Join Our WhatsApp Group</a>
                
                     
                 
                    
                        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <h1 class="page-title" style="text-transform: uppercase;">
 <?php echo $username;?>'s Account (<a href="logout.php"><i class="fa fa-power-off" style="color: #245456;"></i></a>)
</h1>
            
          </div>
                 
              </div>
            </div>
          </div> <br/>
           
          <!-- wallet-->
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              Wallet
            </div> 
            <div class="state-value">
                     &#8358;<?php echo $wallets;?>            </div>
            <a href="fund_wallet.php" class="btnn btn-primary">FUND WALLET</a>
          </div>
                 
              </div>
            </div>
           
          </div> <br/>
          <!-- wallet end -->
          	<!-- alert section -->
      <div class="alert alert-info" role="alert"> 
      	<h3 class="alert-heading" style="font-size: 20px;"><strong><span style="color: blue;">**NEW!**</span> UNIQUE ACCOUNT DETAILS</strong></h3>
      	   	    <button  class="btnn btn-primary" id="gtb" onclick="showgtb()">GTBank account</button>  <button  class="btnn " disabled id="sterling" onclick="showsterling()">Sterling account</button>
      <button  class="btnn  btn-primary"  onclick="showema()" id="wema">Wema account</button>
 <br/> 
  <p id="wemadetail" style="margin-top: 9px; display: none;">
      <img src="Wema_Bank_Plc.jpg"  style="
    width: 113px;
    height: 60px;
"/>
 <br/>
 <br/>     <b> BANK: &nbsp;&nbsp;<span style="font-weight: 600;">Wema bank</span></b><br/>
      <b>ACCOUNT NAME:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $username;?></span></b> <br/>
      <b>ACCOUNT NUMBER:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $uwemaacc;?></span></b> 
  
  </p>
   <p id="sterlingdetail" style="margin-top: 9px;">
       <img src="Sterling-Bank-logo.jpg" height="60" style="
    width: 113px;
    height: 60px;
"/>
        <br/> <br/>
     <b> BANK: &nbsp;&nbsp;<span style="font-weight: 600;">Sterling bank</span></b><br/>
      <b>ACCOUNT NAME:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $username;?></span></b> <br/>
      <b>ACCOUNT NUMBER:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $usteracc;?></span></b> 
  
  </p>
   <p id="gtbdetail" style="margin-top: 9px; display: none;">
       <img src="gtbank.jpg" height="60" style="
    width: 113px;
    height: 60px;
"/>
        <br/> <br/>
     <b> BANK: &nbsp;&nbsp;<span style="font-weight: 600;">GTBank</span></b><br/>
      <b>ACCOUNT NAME:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $username;?></span></b> <br/>
      <b>ACCOUNT NUMBER:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $ugtbacc;?></span></b> 
  
  </p>
  <p style="font-size: 14px;">
      <b>AUTOMATED WALLET FUNDING</b><br/>
Make transfer to the account above to fund your wallet. <b>(1.08% Charge fee)</b>
  </p>

 </div>
<!-- pages section -->
<div class="row">
	<div class="col-md-4">
		<div class="list-group">
		<a class="list-group-item active" style="background-color: #245456; border-color: #245456; color: #fff;"> Quick Links </a>
		<a href="buy_data.php" class="list-group-item"> Buy Data </a>
		<a href="airtime_vtu.php" class="list-group-item"> Airtime VTU </a>
		<a href="bills.php" class="list-group-item"> Pay Bills </a>
		<a href="electricity.php" class="list-group-item"> Electricity Bills </a>  
		<a href="transfer.php" class="list-group-item"> Transfer </a>
    <a href="transaction.php" class="list-group-item"> Transactions </a>

	</div>
</div>
   <div class="col-md-8">
   	<div class="card shadow mb-4" style="padding: 0;">
   		<div class="card-header py-3 bgcard-header">
   			<h5 class="m-0 font-weight-bold">Recent transaction </h5>
   		</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                <th> Service </th>
                 <th> Number </th>
                  <th> Price </th>
                   <th> Status </th>
                    <th> Trans. Id </th>
                   <th> Date </th>
                 </tr>
               </thead>
               <tbody>
                               <tr>
                  <td>  MTN   </td>
                  <td> 09033834777 </td>
                  <td> &#8358;100 </td>
                  
                                    <td style="color: red;"><b> pending </b></td>
                
                  <td> 6488894966 </td>
                <td> Wed 17 May, 2023; 1:38 PM</td>
                  </tr>

                              
                                  </tbody>
             </table>
             <a href="transaction.php"> <button type="submit" class="btnn btn-primary"> View All </button> </a>
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
</div>

		<!-- dashboard home end -->
		<script>
		      function showema(){
              
               document.getElementById("wemadetail").style.display = 'block';
               document.getElementById("sterlingdetail").style.display = 'none';
               document.getElementById("gtbdetail").style.display = 'none';
               
                document.getElementById("wema").setAttribute('disabled', 'disabled');
                document.getElementById("sterling").removeAttribute('disabled');
                document.getElementById("gtb").removeAttribute('disabled');
                 document.getElementById("wema").classList.remove("btn-primary");
                 document.getElementById("sterling").classList.add("btn-primary");
                   document.getElementById("gtb").classList.add("btn-primary");
               
          }
          function showsterling(){
              
               document.getElementById("sterlingdetail").style.display = 'block';
               document.getElementById("wemadetail").style.display = 'none';
                 document.getElementById("gtbdetail").style.display = 'none';
               
                document.getElementById("sterling").setAttribute('disabled', 'disabled');
                document.getElementById("wema").removeAttribute('disabled');
                document.getElementById("gtb").removeAttribute('disabled');
                 document.getElementById("sterling").classList.remove("btn-primary");
                 document.getElementById("wema").classList.add("btn-primary");
                 document.getElementById("gtb").classList.add("btn-primary");
               
          }
                 function showgtb(){
                document.getElementById("gtbdetail").style.display = 'block';
               document.getElementById("sterlingdetail").style.display = 'none';
               document.getElementById("wemadetail").style.display = 'none';
               
                document.getElementById("sterling").removeAttribute('disabled');
                document.getElementById("wema").removeAttribute('disabled');
                document.getElementById("gtb").setAttribute('disabled','disabled');
                 document.getElementById("sterling").classList.add("btn-primary");
                 document.getElementById("wema").classList.add("btn-primary");
                 document.getElementById("gtb").classList.remove("btn-primary");
               
          }
		</script>	
		<!-- footer start -->
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
		<script src="js/modernizr-2.8.3.min.js"></script>
        <script src="js/jquery-1.12.0.min.js"></script>
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
    
    <script src="datacheck.js"></script>
    <script src="billcheck.js"></script>
    <script src="electchecks.js"></script>
      <script src="epinchecks.js"></script>
    </body>
</html>