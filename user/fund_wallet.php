<?php 
session_start();
//error_reporting(0);
include "../conn.php";
$msg =  $success = "";
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
  $ugtbacc = $usrdetails['gtbacc'];
  $usteracc = $usrdetails['steracc'];
  $uwemaacc = $usrdetails['wemaacc'];
  $email = $usrdetails['email'];
  $firstname = $usrdetails['fname'];
  $lastname = $usrdetails['lname'];
  $uphone = $usrdetails['phone_number'];
}else{
  header("location: ../login.php");
  die();
}


}else{

  header("location: ../login.php");
die();
}


if(isset($_POST['paywithcard'])){


    $amount= filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
    
    
    if($amount == ""){
      $msg = "Please input amount";
    }
    
    if($amount < 100 || $amount > 9500){
        $msg = "Minimum amount is #100 and maximum is #9500";
    }

    if($msg == ""){
$trans = uniqid("id");
$currency = "NGN";
$redirect = "http://localhost/vtu/user/pay.php";
$customer = ['email'=> $email];

$request = json_encode([
  'tx_ref' => $trans,
  'amount' => $amount,
  'currency' => $currency,
  'redirect_url' => $redirect,
  'customer' => $customer
]);

      $url = "https://api.flutterwave.com/v3/payments";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
  'Authorization: Bearer FLWSECK_TEST--X',
  'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

curl_close($ch);

$array = json_decode($response, true);
//echo $response;
if(array_key_exists("status", $array) && $array['status'] == "success"){

$link = $array['data']['link'];

  header("location: ".$link);
}

    }



}


$sql = "SELECT * FROM users WHERE username = '$usernameph' OR phone_number = '$usernameph' LIMIT 1";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
$usrdetails = mysqli_fetch_assoc($res);

$wallets = $usrdetails['wallets'];

}



//echo date("Y-m-d H:i:s");
include "header.php";
?>
<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>fund wallet</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="dashboard.php">My Account</a></li>
								<li>Fund Wallet</li>
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
                 
                     	     <div class="alert alert-info" role="alert"> 
      	<h3 class="alert-heading" style="font-size: 20px;"><strong><span style="color: blue;">**NEW!**</span> UNIQUE ACCOUNT DETAILS</strong></h3>
      	    <button  class="btnn  btn-primary"  onclick="showema()" id="wema">Wema account</button> <button  class="btnn " disabled id="sterling" onclick="showsterling()">Sterling account</button>
 <br/> 
  <p id="wemadetail" style="margin-top: 9px; display: none;">
      <img src="Wema_Bank_Plc.jpg"  style="
    width: 113px;
    height: 60px;
"/>
 <br/>
 <br/>     <b> BANK: &nbsp;&nbsp;<span style="font-weight: 600;">Wema</span></b><br/>
      <b>ACCOUNT NAME:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $usernameph; ?></span></b> <br/>
      <b>ACCOUNT NUMBER:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $uwemaacc; ?></span></b> 
  
  </p>
   <p id="sterlingdetail" style="margin-top: 9px;">
       <img src="Sterling-Bank-logo.jpg" height="60" style="
    width: 113px;
    height: 60px;
"/>
        <br/> <br/>
     <b> BANK: &nbsp;&nbsp;<span style="font-weight: 600;">Sterling</span></b><br/>
      <b>ACCOUNT NAME:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $usernameph; ?></span></b> <br/>
      <b>ACCOUNT NUMBER:&nbsp;&nbsp;<span style="font-weight: 600;"><?php echo $usteracc; ?></span></b> 
  
  </p>
  <p style="font-size: 14px;">
      <b>AUTOMATED WALLET FUNDING</b><br/>
Make transfer to the account above to fund your wallet. <b>(1.08% Charge fee)</b>
  </p>

 </div>
                     	    <!--<div class="alert alert-info" role="alert"><center><b>
                    NOTE:</b> Maximum of &#8358;2,450 per transaction at a time when funding wallet with ATM Card. </center> </div> -->
                    <div class="alert alert-info alert-dismissible fade show" role="alert" style="border-left: 5px solid blue;">
                   If after making payment with ATM Card and your wallet is not funded instantly, click <a href="wallet_history.php"><b>HERE</b></a> to Query.
                   <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                     <span aria-hidden="true">&times; </span>
                   </button>
                        </div>
   		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   			<h6 class="m-0 font-weight-bold">Fund Wallet </h6>
   		</div>
       <div style="margin-bottom: -20px;">
        <div class="card-body">
    <?php echo $msg; ?>

          <div class="input-group mb-3">
               <select id="fund_method" class="form-control" onchange="fundCheck()">
                <option value="">Select Method</option>
                 <!--<option value="paycard">Fund Wallet With ATM Card(paystack - N100 to N2,450) </option> -->
               <option value="paycard">Fund Wallet With ATM Card(flutterwave - N100 to N9,500)</option>
               <option value="paybank">Fund Wallet With Bank Transfer (Automated)</option>
               </select>
           </div>
         </div>
       </div>
   		<form id="BANK" action="paydetails.php" name="paywallet2" method="post" style="display: none;" onsubmit="return validate();">
   			<div class="card-body">
          
           <div class="input-group mb-3">
           <input type="number" name="amount"  class="form-control" value="" placeholder="Enter Amount (minimum 50)" required>
         </div>
          <input type="submit" class="btnn btn-primary" value="Fund wallet" />
          
           
       </div>
   </form>
   <form id="FLUTTER" name="paywallet" method="post" style="display: none;" >
   			<div class="card-body">
          
           <div class="input-group mb-3">
           <input type="number" name="amount" id="amount" class="form-control" value="" placeholder="Enter Amount (minimum 100 to 9500)" required>
         </div>
         

       <!--   
        For flutterwave inline api
       <input type="button" class="btnn btn-primary"  value="Fund wallet" onclick="paywithcard()"/> -->
          
       <!-- For flutterwave standard api -->
       <input type="submit" class="btnn btn-primary" name="paywithcard" value="Fund wallet" /> 

       </div>
   </form>
   
   



                   </div>
               </div>
  <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
                     
        <h1 class="page-title" style="color: #007bff; font-size: 22px;">
 <b>Frequently Asked Questions  </b>
</h1>
<p> Below are the questions frequently asked by our customers about funding via bank through the unique account details.</p>
<br/>
                 <p> <a href="javascript:toggleElement('a1','sag')" class="faq-content">&nbsp; <span id="sag"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; Can I pay into my  unique account number using another bank.</a> </p>
<div id="a1" style="display: none;" class="hide_content"> 
 Yes, you can pay using any bank of your choice.

</div>

 <p> <a href="javascript:toggleElement('a2','sag1')" class="faq-content">&nbsp; <span id="sag1"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; How much is the charges if I fund my wallet using my unique account number.</a> </p>
<div id="a2" style="display: none;" class="hide_content">
  There is a charge of 1.08% for payment made into your  unique account. For instance, if you made a payment of N100 into your unique account number, you will be credited with N98.92 into your wallet. 
  </div>
  
   <p> <a href="javascript:toggleElement('a7','sag7')" class="faq-content">&nbsp; <span id="sag7"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; Do I have to login before sending money into my  unique account number.</a> </p>
<div id="a7" style="display: none;" class="hide_content">
   No, you don't need to login into your account. You can send money to your account number and get credited automatically without login.
  </div>

  <p> <a href="javascript:toggleElement('a3','sag2')" class="faq-content">&nbsp; <span id="sag2"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; Can anyone help me to pay into my account number.</a> </p>
<div id="a3" style="display: none;" class="hide_content">
   Yes, anyone can deposit or transfer money into your account number. Just provide the person your account number, the fund will be credited to your wallet when received.
  </div>

  <p> <a href="javascript:toggleElement('a4','sag3')" class="faq-content">&nbsp; <span id="sag3"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; I paid into my unique account number but my wallet is not yet credited</a> </p>
<div id="a4" style="display: none;" class="hide_content">
   Kindly wait for some minutes to get credited. Hence, your payment will be reversed.
  </div>

  <p> <a href="javascript:toggleElement('a5','sag4')" class="faq-content">&nbsp; <span id="sag4"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; I can't find the bank on my bank APP or USSD</a> </p>
<div id="a5" style="display: none;" class="hide_content">
   Kindly search for WEMA BANK. Hence, try to make use of another means e.g ATM MACHINE, POS or use another bank.
  </div>

   <p> <a href="javascript:toggleElement('a6','sag5')" class="faq-content">&nbsp; <span id="sag5"><i class='fa fa-plus'></i> </span>&nbsp;&nbsp; Whenever I try paying from my bank, it keeps prompting "Beneficiary does not exist"</a> </p>
<div id="a6" style="display: none;" class="hide_content">
    Please retry again. If it persists for hours, contact customer service for assistance.
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

 <footer>
			<div class="footer-bottom-area">
				<div class="container">
					<div class="social-icons text-center">
						<label>Find Us:</label>
						<a href="https://facebook.com/"><i class="fa fa-facebook"></i></a>
						<a href="https://twitter.com/@"><i class="fa fa-twitter"></i></a>
						
					</div>
					<div class="copyright text-center">
						<p><?php echo $admnbname;?> - All rights reserved - 2020 ©. </p>
						<a href="#"></a>
					</div>
				</div>
			</div>
		</footer>
		<!-- footer end -->
		<script src="selects.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
        <script src="clipboard/dist/clipboard.min.js"></script>
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

    <script src="https://checkout.flutterwave.com/v3.js"> </script>

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

        function copyText(){
    var clipboard = new ClipboardJS('#referral_link');
    clipboard.on('success', function(e){
      alert("Referral Link Copied!")
    });
    
}



function copyApi(){
    var clipboard = new ClipboardJS('#api_link');
    clipboard.on('success', function(e){
      alert("API Key Copied!")
    });
    
}
    </script>
    
    	<script>
		      function showema(){
              
               document.getElementById("wemadetail").style.display = 'block';
               document.getElementById("sterlingdetail").style.display = 'none';
               
                document.getElementById("wema").setAttribute('disabled', 'disabled');
                document.getElementById("sterling").removeAttribute('disabled');
                 document.getElementById("wema").classList.remove("btn-primary");
                 document.getElementById("sterling").classList.add("btn-primary");
               
          }
          function showsterling(){
              
               document.getElementById("sterlingdetail").style.display = 'block';
               document.getElementById("wemadetail").style.display = 'none';
               
                document.getElementById("sterling").setAttribute('disabled', 'disabled');
                document.getElementById("wema").removeAttribute('disabled');
                 document.getElementById("sterling").classList.remove("btn-primary");
                 document.getElementById("wema").classList.add("btn-primary");
               
          }
          //fund method
   var fundplan = document.getElementById("fund_method");
  function fundCheck(){
   if (fundplan.value == ""){
document.getElementById("FLUTTER").style.display = "none";
   document.getElementById("COUPON").style.display = "none";
}
if (fundplan.value == "paycard"){
document.getElementById("FLUTTER").style.display = "block";
   document.getElementById("COUPON").style.display = "none";
}
if (fundplan.value == "paycoupon"){
document.getElementById("FLUTTER").style.display = "none";
   document.getElementById("COUPON").style.display = "block";
}
}


  //fund wallet
  function validateFlutter(){
   if(document.paywallet.amount.value >= 100 && document.paywallet.amount.value <= 9500){
     return true;
   }else  {
           alert( "Minimum amount is #100 and maximum is #9500" );
           document.paywallet.amount.focus() ;
           return false;
        }
  }


	</script>

    <script>
  function paywithcard(){
    if(document.paywallet.amount.value >= 100 && document.paywallet.amount.value <= 9500){
var amount2 = document.getElementById("amount").value;
        FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST--X",
      tx_ref: "<?php echo uniqid();?>",
      amount: amount2,
      currency: "NGN",
      payment_options: "card, banktransfer, ussd",
      redirect_url: "http://localhost/vtu/user/pay.php",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: "<?php echo $email;?>",
        phone_number: "<?php echo $uphone;?>",
        name: "<?php echo $firstname." ".$lastname;?>",
      },
      customizations: {
        title: "SUBANDGAIN",
        description: "Fund wallet",
        logo: "https://www.logolynx.com/images/logolynx/22/2239ca38f5505fbfce7e55bbc0604386.jpeg",
      },
    });

   }else{
           alert( "Minimum amount is #100 and maximum is #9500" );
           document.paywallet.amount.focus() ;
         
        }
   
  
  }
	
        </script>

    </body>
</html>