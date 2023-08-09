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

}else{
  header("location: ../login.php");
  die();
}


}else{

  header("location: ../login.php");
die();
}


if(isset($_POST['buy'])){


$network = filter_var($_POST['network'], FILTER_SANITIZE_STRING);
$plan = filter_var($_POST['plan'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);


if($network == ""){
  $msg = "Please select network";
}
if($plan == ""){
  $msg = "Please select plan";
}
if($phone == ""){
  $msg = "Please input phone number";
}

$sql = "SELECT price FROM data_bundles WHERE network = '$network' AND bundle = '$plan'";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){
  $sqlfetch = mysqli_fetch_assoc($res);
  $dataprice = $sqlfetch['price'];
}else{
  $msg = "Please select a valid data bundle";
}

if($wallets >= $dataprice){

}else{
  $msg = "Insufficient balance. Kindly fund your wallet";
}


if($msg == ""){

   //Input parameters as given in the documentation
   //$request = "username=Prestigeguy&apiKey=sagfk6&network=$network&dataPlan=$plan&phoneNumber=$phone";
   $request = "";
   $param["username"] = "Prestigeguy";
$param["apiKey"] = "sagfk6";
$param["network"] = $network;
$param["phoneNumber"] = $phone;
$param["dataPlan"] = $plan;
//unique id, you can use time()
foreach($param as $key=>$val) //traverse through each member of the param array
{
$request .= $key . "=" . urlencode($val); //we have to urlencode the values
$request .= '&'; //append the ampersand (&) sign after each paramter/value pair
}
$len = strlen($request) - 1;
$request = substr($request, 0, $len); //remove the final ampersand sign from the request

$url = "https://subandgain.com/api/data.php?".$request; //The URL given in the documentation without parameters
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //return as a variable
$response = curl_exec($ch);
curl_close($ch);
//echo $response;
//decode response to get trans_id,network,phone_number,amount,status and balance
$array = json_decode($response, true); //decode the JSON response

/*$array = array("status"=>"Approved","trans_id"=>"88c4r5one73","network"=>"MTN","dataPlan"=>"1GB","phoneNumber"=>"09067879810",
"api_response"=>"Dear Customer, You have successfully shared 1GB Data to 2349067879810.","balance"=>"2500"); */

$ustatus = $array['status'];
$transid = $array['trans_id'];
//$cal = ($dataprice / 100)* 2;
if($ustatus == "Approved"){

  //$sql1 = "UPDATE users SET wallets = wallets - '$dataprice', point = point + '$cal' WHERE username = '$username'";
  $sql1 = "UPDATE users SET wallets = wallets - '$dataprice' WHERE username = '$username'";
  $res1 = mysqli_query($conn, $sql1);

  if($res1){

    $sql2 = "INSERT INTO history (uname, amount, transid, network, date, status, plan, phone, type) VALUES ('$username','$dataprice','$transid','$network','$date','$ustatus','$plan','$phone','data')";
    $res2 = mysqli_query($conn, $sql2);
    if($res2){

      $success = "Your transaction has been processed successfully";

    }
  }

}else{
  $msg = "Order not processed, please try again";
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
		<!-- header end --><!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>BUY DATA</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="dashboard.php">My Account</a></li>
								<li>data</li>
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
          <?php 
            $sql7 = "SELECT * FROM notify WHERE status = 'show' AND type = 'Buy Data'";
            $res7 = mysqli_query($conn,$sql7);
            if(mysqli_num_rows($res7)>0){
              $fecthnotify = mysqli_fetch_assoc($res7);
              $notifictaion = $fecthnotify['message'];
?>
             	<div class="alert alert-info alert-dismissible fade show" role="alert" style="border-left: 5px solid blue;">
<?php echo $notifictaion;?>
               </div>
           <?php }
            
            ?>           	                   
   		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   			<h6 class="m-0 font-weight-bold">Select Plan </h6>
   		</div>
   		<form id="form" method="post">
   			<div class="card-body">
                    
        <?php if($msg != ""){
echo "<div class='alert alert-danger'> $msg </div>";
        }
        if($success != ""){
          echo "<div class='alert alert-success'> $success </div>";
        }

          ?>
          <div class="input-group mb-3">
           <input type="text" name="wallet" id="phone1" value="" class="form-control" placeholder="Wallet: &#8358;<?php echo $wallets;?>" readonly>
         </div>
   			<div class="input-group mb-3">
               <select name="network" id="datanet" class="form-control" onchange="selectDataBundle()" required="">
                <option value="">Choose Network</option>
            	  <option value="MTN">MTN</option>
               	<option value="GLO">GLO</option>
               	<option value="AIRTEL">AIRTEL</option>
               	<option value="9MOBILE">9MOBILE</option>
                
               </select>
           </div>
           <div class="input-group mb-3">
               <select id="dataprice" name="plan" class="form-control" onchange="dataPriceCheck();" required="">
                <option></option>
               </select>
           </div>
          
           <div class="input-group mb-3">
           <input type="tel" name="phone" id="phone1" maxlength="11" minlength="11" class="form-control" value="" placeholder="Enter recipient's number" required="">
         </div>
           <input type="submit" class="btnn btn-primary" name="buy" value="Buy Data" onclick="return confirm('Do you want to proceed with this Order?'); ">
           
       </div>
   </form>



                   </div>
               </div>

               <div class="row">
               <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
       <!-- <p style="padding: 2px;"><b>Note:</b> MTN order will now be cancelled automatically if after 30min of being pending and payment will be refunded!</p> -->
      <div class="card-header py-3 bgcard-header">
        <h5 class="m-0 font-weight-bold">Transaction History </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
              <tr>
                <th> Network </th>
                 <th> Phone Number </th>
                  <th> Price </th>
                  <th>Plan</th>
                  <th> Status </th>
                  <th> Trans. Id </th>
                   <th> Date </th>
                   <th> Query </th>
                  </tr>
               </thead>
               <tbody>
                <?php
                  $sql1 = "SELECT * FROM history WHERE uname = '$username'";
                  $res1 = mysqli_query($conn, $sql1);
                  while($history = mysqli_fetch_assoc($res1)){

                  

?>
                                <tr>
                   <td><?php echo $history['network'];?> </td>
                    <td> <?php echo $history['phone'];?>  </td>
                  <td> &#8358;<?php echo $history['amount'];?>  </td>
                  <td><?php echo $history['plan'];?>  </td>
                                      <td style="color: green;"><b> <?php echo $history['status'];?>  </b></td>
                                    <td> <?php echo $history['transid'];?>  </td>
                  <td><?php echo $history['date'];?> </td>
                   <td> <a href="buy_data.php?id=0249158736"> <button type="submit" class="btnn btn-primary" name="orderid"> Query </button> </a> </td>
                  
                  </tr>

              <?php } ?>          

                                  </tbody>
             </table>
           </div>
           <div style='padding: 10px 10px 0px; border-top: dotted 1px #CCC;'>

</div>
<ul class="pagination">
      
  <li class='disabled'>
  <a >Previous</a>
  </li>
       
    <li class='active'><a>1</a></li><li><a href='?page_no=2'>2</a></li>    
  <li >
  <a href='?page_no=2'>Next</a>
  </li>
    <li><a href='?page_no=2'>Last &rsaquo;&rsaquo;</a></li></ul>
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
    
    <script>

function selectDataBundle(){

  var network = document.getElementById("datanet").value;

  if(network != ""){

    $.ajax({

      type: "post",
      url: "checkdata.php",
      data: "net="+network,
      success: function(result){
document.getElementById("dataprice").innerHTML = result;
//alert(result);
      }
    });

  }



}

</script>

    <script src="datacheck.js"></script>
    <script src="billcheck.js"></script>
    <script src="electchecks.js"></script>
      <script src="epinchecks.js"></script>
    </body>
</html>