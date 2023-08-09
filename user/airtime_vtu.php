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

$sql4 = "SELECT * FROM discount WHERE network = 'MTN'";
$res4 = mysqli_query($conn,$sql4);
$fecthdiscount = mysqli_fetch_assoc($res4);
$mtndiscount = $fecthdiscount['discount'];

$sql4 = "SELECT * FROM discount WHERE network = 'GLO'";
$res4 = mysqli_query($conn,$sql4);
$fecthdiscount = mysqli_fetch_assoc($res4);
$glodiscount = $fecthdiscount['discount'];

$sql4 = "SELECT * FROM discount WHERE network = 'AIRTEL'";
$res4 = mysqli_query($conn,$sql4);
$fecthdiscount = mysqli_fetch_assoc($res4);
$airteldiscount = $fecthdiscount['discount'];

$sql4 = "SELECT * FROM discount WHERE network = '9MOBILE'";
$res4 = mysqli_query($conn,$sql4);
$fecthdiscount = mysqli_fetch_assoc($res4);
$mobilediscount = $fecthdiscount['discount'];



if(isset($_POST['airtime'])){


  $network = filter_var($_POST['network'], FILTER_SANITIZE_STRING);
  $amount = filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  
  
  if($network == ""){
    $msg = "Please select network";
  }
  if($amount == ""){
    $msg = "Please input amount";
  }
  if($phone == ""){
    $msg = "Please input phone number";
  }
  if($amount < 0){
    $msg = "Negative amount not allowed";
  }

  
  if($wallets >= $amount){
  
  }else{
    $msg = "Insufficient balance. Kindly fund your wallet";
  }

  if($msg == ""){

    if($network == "MTN"){
      $sumamount = ($amount/100)*$mtndiscount;
    $resamount = $amount - $sumamount;
    }
    if($network == "AIRTEL"){
      $sumamount = ($amount/100)*$airteldiscount;
    $resamount = $amount - $sumamount;
    }
    if($network == "9MOBILE"){
      $sumamount = ($amount/100)*$mobilediscount;
    $resamount = $amount - $sumamount;
    }
    if($network == "GLO"){
      $sumamount = ($amount/100)*$glodiscount;
    $resamount = $amount - $sumamount;
    }
    


    $sql = "UPDATE users SET wallets =  wallets - '$resamount' WHERE username = '$username'";
    $res3 = mysqli_query($conn,$sql);

    if($res3){
      $sql2 = "INSERT INTO history (uname, amount, transid, network, date, status, phone, type) VALUES ('$username','$amount','$tnx','$network','$date','Approved','$phone','vtu')";
      $res2 = mysqli_query($conn, $sql2);
      if($res2){
  
        $success = "Your transaction has been processed successfully";
  
      }else{
        $msg = "Order not processed, please try again";
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


include "header.php";?>
		<!-- header end --><!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>AIRTIME VTU</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="dashboard.php">My Account</a></li>
								<li>Airtime VTU</li>
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
   			<h6 class="m-0 font-weight-bold">Select Plan </h6>
   		</div>
   		<form id="form" method="post" name="vtu">
   			<div class="card-body">
         <?php if($msg != ""){
echo "<div class='alert alert-danger'> $msg </div>";
        }
        if($success != ""){
          echo "<div class='alert alert-success'> $success </div>";
        }

          ?>
                    <div class="input-group mb-3">
           <input type="text" name="wallet" value="" class="form-control" placeholder="Wallet: &#8358;<?php echo $wallets;?>" readonly>
         </div>
   			<div class="input-group mb-3">
               <select name="network" id="cat" class="form-control" required>
                <option value>Choose Network</option>
               	<option value="MTN">MTN</option>
               	<option value="GLO">GLO</option>
               	<option value="9MOBILE">9MOBILE</option>
                <option value="AIRTEL">AIRTEL</option>
               </select>
           </div>
           <div class="input-group mb-3">
           <input type="tel" name="phone" id="phone1" maxlength="11" minlength="11" class="form-control" value="" placeholder="Enter recipient's number" required="">
         </div>
         <div class="input-group mb-3">
           <input type="number" name="amount" id="amt" class="form-control" value="" oninput="updateAmt()" placeholder="Amount (minimum 50)" required="">
         </div>
         <div class="input-group mb-3">
           <input type="text" id="amt2" class="form-control" value="Amount to Pay" readonly >
         </div>
           <input type="submit" class="btnn btn-primary" value="Airtime VTU" name="airtime" onclick="return confirm('Do you want to proceed with this Order?'); ">
           
       </div>
   </form>



                   </div>
               </div>

               <div class="row">
               <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
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
                  <th> Status </th>
                  <th> Order Id </th>
                   <th> Date </th>
                    <th> Query </th>
                  </tr>
               </thead>
               <tbody>
                                <tr>
                   <td>  MTN </td>
                    <td> 09033834777 </td>
                  <td> &#8358;50 </td>
               
                                    <td style="color: green;"><b> successful </b></td>
                    
                    <td> 6497068560 </td>
                  <td> Fri 30 June, 2023; 1:55 PM</td>
                 
               
                  <td> <a href="airtime_vtu.php?mid=6497068560"> <button type="submit" class="btnn btn-primary" name="orderid"> Query </button> </a> </td>
                  </td>
                  </tr>

                                <tr>
                   <td>  MTN </td>
                    <td> 09033834777 </td>
                  <td> &#8358;100 </td>
               
                                    <td style="color: red;"><b> pending </b></td>
                    
                    <td> 6488894966 </td>
                  <td> Wed 17 May, 2023; 1:38 PM</td>
                 
               
                  <td> <a href="airtime_vtu.php?mid=6488894966"> <button type="submit" class="btnn btn-primary" name="orderid"> Query </button> </a> </td>
                  </td>
                  </tr>

                                <tr>
                   <td>  GLO </td>
                    <td> 09033834777 </td>
                  <td> &#8358;100 </td>
               
                                    <td style="color: red;"><b> cancelled </b></td>
                    
                    <td> 6468644820 </td>
                  <td> Tue 17 January, 2023; 10:00 AM</td>
                 
               
                  <td></td>
                  </td>
                  </tr>

                                <tr>
                   <td>  GLO </td>
                    <td> 09033834777 </td>
                  <td> &#8358;100 </td>
               
                                    <td style="color: red;"><b> cancelled </b></td>
                    
                    <td> 6468640151 </td>
                  <td> Tue 17 January, 2023; 9:21 AM</td>
                 
               
                  <td></td>
                  </td>
                  </tr>

                                <tr>
                   <td>  MTN </td>
                    <td> 09033834777 </td>
                  <td> &#8358;50 </td>
               
                                    <td style="color: green;"><b> successful </b></td>
                    
                    <td> 6468636476 </td>
                  <td> Tue 17 January, 2023; 8:52 AM</td>
                 
               
                  <td> <a href="airtime_vtu.php?mid=6468636476"> <button type="submit" class="btnn btn-primary" name="orderid"> Query </button> </a> </td>
                  </td>
                  </tr>

                                <tr>
                   <td>  9MOBILE </td>
                    <td> 09033834777 </td>
                  <td> &#8358;100 </td>
               
                                    <td style="color: red;"><b> cancelled </b></td>
                    
                    <td> 6453365590 </td>
                  <td> Mon 10 October, 2022; 2:24 PM</td>
                 
               
                  <td></td>
                  </td>
                  </tr>

                                <tr>
                   <td>  MTN </td>
                    <td> 09033834777 </td>
                  <td> &#8358;100 </td>
               
                                    <td style="color: green;"><b> successful </b></td>
                    
                    <td> 6453365281 </td>
                  <td> Mon 10 October, 2022; 2:22 PM</td>
                 
               
                  <td> <a href="airtime_vtu.php?mid=6453365281"> <button type="submit" class="btnn btn-primary" name="orderid"> Query </button> </a> </td>
                  </td>
                  </tr>

                                <tr>
                   <td>  MTN </td>
                    <td> 09033834777 </td>
                  <td> &#8358;100 </td>
               
                                    <td style="color: green;"><b> successful </b></td>
                    
                    <td> 6453303925 </td>
                  <td> Mon 10 October, 2022; 7:01 AM</td>
                 
               
                  <td> <a href="airtime_vtu.php?mid=6453303925"> <button type="submit" class="btnn btn-primary" name="orderid"> Query </button> </a> </td>
                  </td>
                  </tr>

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
  
  
  <script>
  function updateAmt(){
    var cat = document.getElementById("cat").value;
    var amt = parseFloat(document.getElementById("amt").value);
    var amt2 = document.getElementById("amt2");
    var freecal;
    var freemut;
    var sumamt;
    
    if(cat == ""){
        amt2.value = "Amount to Pay";
    }else{
    
  if (amt == "") {
        amt2.value = "Amount to Pay";
        }else{
        
       
        
          if(cat == "MTN"){
           freecal = parseFloat(amt / 100);
           freemut = parseFloat(freecal * <?php echo $mtndiscount;?>);
        }
        if (cat == "AIRTEL") {
            freecal = parseFloat(amt / 100);
           freemut = parseFloat(freecal * <?php echo $airteldiscount;?>);
           
        }
        if (cat == "GLO") {
           freecal = parseFloat(amt / 100);
           freemut = parseFloat(freecal * <?php echo $glodiscount;?>);
        }
        if (cat == "9MOBILE") {
           freecal = parseFloat(amt / 100);
           freemut = parseFloat(freecal * <?php echo $mobilediscount;?>);;
        }
        
         
        
      
        
    

        
        
          sumamt = parseFloat(amt - freemut).toFixed(2);
          
          if(sumamt != "NaN"){
        var str = sumamt.toString().replace("₦", ""), parts = false, output = [], i = 1, formatted = null;
		if(str.indexOf(".") > 0) {
			parts = str.split(".");
			str = parts[0];
		}
		str = str.split("").reverse();
		for(var j = 0, len = str.length; j < len; j++) {
			if(str[j] != ",") {
				output.push(str[j]);
				if(i%3 == 0 && j < (len - 1)) {
					output.push(",");
				}
				i++;
			}
		}
		formatted = output.reverse().join("");
		amt2.value ="₦" + formatted + ((parts) ? "." + parts[1].substr(0, 3) : "");
        
          }else{
              amt2.value = "Amount to Pay";
          }
        
        }
        
    }
   
    
}
</script>

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