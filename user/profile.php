<?php
session_start();
include "../conn.php";
$msg = $success = "";

if(isset($_SESSION['uname'])){

  $usernameph = $_SESSION['uname'];
  
  $sql = "SELECT * FROM users WHERE username = '$usernameph' OR phone_number = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  $username = $usrdetails['username'];
  $email = $usrdetails['email'];
  $firstname = $usrdetails['fname'];
  $lastname = $usrdetails['lname'];
  $uphone = $usrdetails['phone_number'];
  $upass = $usrdetails['password'];

}else{
  header("location: ../login.php");
  die();
}

}else{

  header("location: ../login.php");
die();
}



if(isset($_POST['update'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if($firstname == ""){
        $msg = "Please input your first name";
    }
    if($lastname == ""){
        $msg = "Please input your last name";
    }

    if($upass != $lastname){
        $msg = "incorrect old password";
    }

    if($msg == ""){

        $sql1 = "UPDATE users SET fname = '$firstname', lname = '$lastname' WHERE username = '$username'";
        $res1 = mysqli_query($conn, $sql1);

        $success = "Profile updated successfully";

    }
}

include "header.php";?>

		<!-- header end --><!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Profile</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="dashboard.php">My Account</a></li>
								<li>profile</li>
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
   			<h6 class="m-0 font-weight-bold">Profile </h6>
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
           <input type="text" name="firstname" class="form-control" value="<?php echo $firstname;?>" required="">
         </div>
         <div class="input-group mb-3">
           <input type="text" name="lastname" class="form-control" value="<?php echo $lastname;?>" required="">
         </div>
          <div class="input-group mb-3">
         <input type="text" class="form-control" value="<?php echo $uphone;?>" readonly>
         </div>
         <div class="input-group mb-3">
           <input type="text" class="form-control" value="<?php echo $email;?>" readonly>
         </div>
           <input type="submit" class="btnn btn-primary" name="update" value="Update">
           
       </div>
   </form>
   <!--<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold">Bank Details </h6>
      </div>
      <form method="post">
        <div class="card-body">
          
           <div class="input-group mb-3">
            <select name="bank" class="form-control" required="">
               <option value="">Choose Bank</option>
                <option value="Access Bank">Access Bank</option>
                <option value="Access Bank Diamond">Access Bank (Diamond)</option>
                <option value="AlatbyWema">ALAT by WEMA</option>
                <option value="Aso Savings And Loan">ASO Savings and Loans</option>
                <option value="Citibank Nig">Citibank Nigeria</option>
                <option value="Ecobank Nig">Ecobank Nigeria</option>
                <option value="Ekondo Microfinance Bank">Ekondo Microfinance Bank</option>
                <option value="Enterprise Bank">Enterprise Bank</option>
                <option value="Fidelity Bank">Fidelity Bank</option>
                <option value="First Bank">First Bank of Nigeria</option>
                <option value="FCMB">First City Monument Bank</option>
                <option value="GTB">Guaranty Trust Bank</option>
                <option value="Heritage Bank">Heritage Bank</option>
                <option value="Jaiz Bank">Jaiz Bank</option>
                <option value="Keystone Bank">Keystone Bank</option>
                <option value="Kuda Bank">Kuda Bank</option>
                <option value="MainStreet Bank">MainStreet Bank</option>
                <option value="Parallex Bank">Parallex Bank</option>
                <option value="Polaris Bank">Polaris Bank</option>
                <option value="Providus Bank">Providus Bank</option>
                <option value="Stanbic Bank">Stanbic IBTC Bank</option>
                <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                <option value="Sterling Bank">Sterling Bank</option>
                <option value="Suntrust">Suntrust Bank</option>
                <option value="Union Bank">Union Bank of Nigeria</option>
                <option value="United Bank">United Bank For Africa</option>
                <option value="Unity Bank">Unity Bank</option>
                <option value="Wema Bank">Wema Bank</option>
                <option value="Zenith Bank">Zenith Bank</option>
             
               </select>
         </div>
           <div class="input-group mb-3">
           <input type="text" name="acname" class="form-control" value="" placeholder="Account Name" required="">
         </div>
         <div class="input-group mb-3">
           <input type="text" name="acno" class="form-control" value="" placeholder="Account Number" required="">
         </div>
           <input type="submit" class="btnn btn-primary" name="upbank" value="Update">
           
       </div>
   </form>
-->


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
    
    <script src="datacheck.js"></script>
    <script src="billcheck.js"></script>
    <script src="electchecks.js"></script>
      <script src="epinchecks.js"></script>
    </body>
</html>