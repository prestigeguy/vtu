<?php
session_start();

include "conn.php";
$msg = "";


if(isset($_POST['login'])){

	$unamepname = $_POST['unamepname'];
	$pass = $_POST['password'];

	if($unamepname == ""){
		$msg = "Username/phone number is required";
	}

	if($pass == ""){
		$msg = "Password is required";
	}

	if($msg == ""){

		$decpass = md5($pass);

		if($decpass != $oldpassfromdb){
			$msg 
		}

	$sql = "SELECT * FROM users WHERE (username = '$unamepname' AND password = '$decpass') OR (phone_number = '$unamepname' AND password = '$pass') LIMIT 1";
	$res = mysqli_query($conn,$sql);
	$numrows = mysqli_num_rows($res);

	if($numrows > 0){

		$_SESSION['uname'] = $unamepname;
		header("Location: user/");


	}else{
		$msg = "Invalid login details";
	}

}




}



?>

<!doctype html>
<html lang="en">
    
<!-- Mirrored from sagtele.com/sag/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 May 2023 15:51:54 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login - SubForMe</title>
         <meta name="description" content="SubForMe Telecommunication gives the best and cheapest mobile data, cable tv subscription, electricity, airtime vtu and education bills. It makes life easier by giving out a unlimited discount for any transaction made on SubForMe. "/>
    <meta name="keywords" content="Data,Airtime VTU,DSTV,GOTV,SMILE,STARTIMES,WAEC,NECO,Electricity,Prepaid,Postpaid" />
    <meta name="author" content="SubForMe" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="SubForMe Telecommunication. Affordable And Reliable!">
        <meta property="og:image" content="img/banner.jpg">
        <meta property="og:description" content="SubForMe Telecommunication provides cheapest mobile data,cable tv subscription, electricity, education bills and Airtime VTU">
        <meta name="twitter:card" content="summary_large_image">

        <link rel="icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
		
		<!-- all css here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <link rel="stylesheet" href="css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.css">
        <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/animation.css">
       <!-- Meta Pixel Code -->

<!-- End Meta Pixel Code -->    </head>
    <body>
       
		<header>
			<!-- main-menu-area-start -->
	
	<div class="header-top-area black-bg hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<ul class="top-right">
								<li>
									<i class="fa fa-envelope"></i>
									<span>subforme@gmail.com</span>
								</li>
							<li>
									<i class="fa fa-phone"></i>
									<span>2348117052525</span>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-sm-6 hidden-xs">
							<div class="header-icon floatright">
								<a href="https://facebook.com/"><i class="fa fa-facebook"></i></a>
								<a href="https://twitter.com/@"><i class="fa fa-twitter"></i></a>
								<a href="https://instagram.com/"><i class="fa fa-instagram"></i></a>
								
								
							</div>							
						</div>
					</div>
				</div>
			</div>
			<div class="main-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-2">
							<div class="logo">
								<a href="index.html"><img src="images/sublogo.png" alt="logo" style="height: 45px;width: 147px;margin-top: -7px;"></a>
							</div>
						</div>
						<div class="col-md-9 col-sm-10">
							<div class="main-menu floatright">
								<nav>
									<ul>
										<li class="active"><a href="index.html">Home</a>
											
										</li>
										<li><a href="about.html">about</a></li>
										<li><a href="service.html">service</a></li>
										<li><a href="contact.html">contact</a></li>
										<li><a href="faq.html">faqs</a></li>
									
																				<li><a href="login.html">Login</a></li>
																														<li><a href="register.html">Sign Up</a></li>
									</ul>
								</nav>
							</div>
							<div class="mobile-menu-area"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- main-menu-area-end -->
		</header>
		<!-- header end -->		<!-- breadcrumb-area-start -->
		<div class="breadcrumb-area bg-color ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-title text-center">
							<h1>login</h1>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="index.html">home</a></li>
								<li>contact</li>
							</ul>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- breadcrumb-area-end -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
      		<div class="logreg-content">
      			<div class="wrap-inside">
                   <div class="container-fluid">
                     	<div class="card shadow form-box mb-4">
						<div class="contact-bottom-text text-center">
							<h2>Login Here!</h2> 
							
						</div>
						<?php if($msg != ""){
				echo '<div class="alert alert-danger">'.$msg.'</div>';

					 } ?>

						<form id="contact-form" class="text-center" method="post">

														<div class="row">
								<div class="col-md-12 col-sm-12">
									<input type="text"  placeholder="Username/Phone Number" name="unamepname" required>
								</div>
								<div class="col-md-12 col-sm-12">
									<input type="password" placeholder="Password" name="password" required>
								</div>
								<div class="col-md-12 text-center">
									<button class="btn" type="submit" name="login">Login</button>
								</div>
								<div class="col-md-12 text-center"><br/>
									<p> <strong><a href="forgot_pass.html">Forgot Password</a></strong></p>
									<p> <strong>Not yet a member? &nbsp<a href="register.html">Register Here!</a></strong></p>
								</div>
							</div>
						</form>
					
						
					</div>
				</div>
			</div>
		</div>
	</div>
				</div>
							
			</div>
		
	
		<!-- footer start -->
		<footer>
			<div class="footer-area black-bg ptb-80">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="footer-widget md-30">
								<div class="footer-img">
									<a href="#"><h2><b><span style="color: #fff;">SubForMe</span></b></h2></a>
								</div>
								<div class="footer-address">
									<p>SubForMe is a Telecommunication company that deals with subscription of Data, Cable Tv, Electricity, Airtime VTU And Education bills. </p>
								</div>
								
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="footer-widget md-30">
							    <br/><br/>
							    <div class="address">
									<ul class="list-unstyled contact">
										<li><p><strong><i class="fa fa-map-marker"></i> </strong> Z A 5 Lagos</p></li> 
										<li><p><strong><i class="fa fa-envelope"></i></strong> subforme@gmail.com</p></li>
										<li> <p><strong><i class="fa fa-phone"></i></strong> +2348117052525</p></li>
										
										
									</ul>
								</div>
								</div>
								</div>
					
						
						
					</div>
				</div>
			</div>
			<div class="footer-bottom-area">
				<div class="container">
					<div class="social-icons text-center">
						<label>Find Us:</label>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						
					</div>
					<div class="copyright text-center">
						<p>SubForMe - All rights reserved - 2022 ©. </p>
						<a href="#"></a>
					</div>
				</div>
			</div>
			<div class="floating-wpp"><a href="https://api.whatsapp.com/send?phone=2348117052525&amp;text=Hello,%20I%20am%20contacting%20from%20SubForMe%20Platform"><img src="img/whatsapp.svg" width="60" height="60" style="border-radius: 50%;"></a></div>
		</footer>
		<!-- footer end -->
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
        <script src="js/jquery.meanmenu.js"></script>
        <script src="js/jquery.mixitup.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from sagtele.com/sag/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 May 2023 15:51:57 GMT -->
</html>
