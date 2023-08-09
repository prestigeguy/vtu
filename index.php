<?php 
include "conn.php";

$sql = "SELECT * FROM admin";
$res = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_assoc($res);

$pixel = $fetch["pixel"];
$phone = $fetch["phone"];
$wphone = $fetch["wphone"];
$address = $fetch["address"];
$email = $fetch["email"];
?>
<!doctype html>
<html lang="en">
    
<!-- Mirrored from sagtele.com/sag/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 May 2023 15:50:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>VTU - Affordable And Reliable!</title>
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

<?php echo $pixel;?>	

	</head>
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
									<span><?php echo $email;?></span>
								</li>
							<li>
									<i class="fa fa-phone"></i>
									<span><?php echo $phone;?></span>
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
								<a href="index.html"><img src="images/playstore_subandgain.png" alt="logo" style="height: 45px;width: 147px;margin-top: -7px;"></a>
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
		<!-- header end -->		<!-- slider-area-start -->
		<div class="slider-area">
			<div class="slider-active owl-carousel">
				<div class="single-slider ptb-150 bg-opacity" style="background-image:url(images/playstore_subandgain.png)">
					<div class="container">
						<div class="slider-text">
							<h1>Become a  <br/> owner today.</h1>
							<p>Imaging becoming a CEO of your own business? <br> </p>
							<a href="login.html">Login</a>
							<a class="active" href="register.html">Register</a>
						</div>					
					</div>
				</div>
				<div class="single-slider ptb-150 bg-opacity" style="background-image:url(img/slider/subandgain1.jpg)">
					<div class="container">
						<div class="slider-text">
							<h1>Golden    </h1>
							<p>Enjoy unlimited discount on every subscription you made.</p>
							<a href="login.html">Login</a>
							<a class="active" href="register.html">Register</a>
						</div>					
					</div>
				</div>
				<div class="single-slider ptb-150 bg-opacity" style="background-image:url(img/slider/subandgain2.jpg)">
					<div class="container">
						<div class="slider-text">
							<h1>VTU THE PLUG</h1>
							<p>Let SubForMe be your data, airtime VTU, cable TV, electricity Plug </p>
							<a href="login.html">Login</a>
							<a class="active" href="register.html">Register</a>
						</div>					
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		<!-- What-wedo-area-start -->
		<div class="what-we-do-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
					<div class="section-title text-center">
							<h2 style="color: #0868d4;">What <span style="color: rgb(86, 216, 0);">we</span> do</h2>
							<p><strong>We help individual to become a CEO of a Global Telecom business and develop a financial stability.</strong></p>
						</div>				
					</div> 
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6 animated fadeInUp">
						<div class="single-What-wedo mb-30">
							<div class="What-wedo-text text-center">
								<div class="icon-box">
									<i class="pe-7s-phone"></i>
								</div>
								<h3> DATA PLANS</h3>
								<p>  Get all networks data bundle at the cheapest price with a fastest delivery</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 animated fadeInUp ">
						<div class="single-What-wedo mb-30">
							<div class="What-wedo-text text-center">
								<div class="icon-box">
									<i class="fa fa-tv"></i>
								</div>
								<h3>CABLE TV SUB</h3>
								<p> Subscribe your DSTV, GOTV, STARTIMES, SMILE e.t.c at an affordable price</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 animated fadeInUp">
						<div class="single-What-wedo mb-30">
							<div class="What-wedo-text text-center">
								<div class="icon-box">
									<i class="fa fa-lightbulb-o"></i>
								</div>
								<h3>ELECTRICITY BILLS</h3>
								<p> Pay your electricity bills on SubForMe and get an amazing discount</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 animated fadeInUp">
						<div class="single-What-wedo mb-30">
							<div class="What-wedo-text text-center">
								<div class="icon-box">
									<i class="pe-7s-folder"></i>
								</div>
								<h3>AIRTIME VTU</h3>
								<p> Recharge all networks airtime directly from SubForMe at a discounted rate</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 animated fadeInUp">
						<div class="single-What-wedo mb-30">
							<div class="What-wedo-text text-center">
								<div class="icon-box">
									<i class="pe-7s-folder"></i>
								</div>
								<h3>EDUCATION BILLS</h3>
								<p> Get your NECO and WAEC result checker on SubForMe at a cheapest price.</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 animated fadeInUp">
						<div class="single-What-wedo mb-30">
							<div class="What-wedo-text text-center">
								<div class="icon-box">
								<i class="fa fa-comments-o"></i>
								</div>
								<h3>CHAT SUPPORT</h3>
								<p>  24/7 customer service is available for any information, enquiries or complaint.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- What-wedo-area-end -->
		
		<!-- pricing-area-start -->
		<div class="pricing-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-title text-center">
							<h2 style="color:#d32535;">OUR <span style="color: grey;">DATA</span> PLANS</h2>
						</div>					
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="single-price mb-30">
							<div class="price-title price-mtn">
								<h3>MTN</h3>
								</div>
							<div class="plan-list">
								<ul class="item-list">
								     <li><strong>500MB</strong> - ₦130 (30 Days)</li> <li class='white-bg'><strong>1GB</strong> - ₦250 (30 Days)</li> <li><strong>2GB</strong> - ₦500 (30 Days)</li> <li class='white-bg'><strong>3GB</strong> - ₦750 (30 Days)</li> <li><strong>5GB</strong> - ₦1250 (30 Days)</li> <li class='white-bg'><strong>10GB</strong> - ₦2500 (30 Days)</li> <li><strong>500.0MB</strong> - ₦135 (30 Days)</li> <li class='white-bg'><strong>1.0GB</strong> - ₦250 (30 Days)</li> <li><strong>2.0GB</strong> - ₦500 (30 Days)</li> <li class='white-bg'><strong>3.0GB</strong> - ₦750 (30 Days)</li> <li><strong>5.0GB</strong> - ₦1250 (30 Days)</li> <li class='white-bg'><strong>10.0GB</strong> - ₦2500 (30 Days)</li> <li><strong>15.0GB</strong> - ₦4050 (30 Days)</li> <li class='white-bg'><strong>20.0GB</strong> - ₦5400 (30 Days)</li> <li><strong>40.0GB</strong> - ₦10800 (30 Days)</li> <li class='white-bg'><strong>100.0GB</strong> - ₦27000 (30 Days)</li> <li><strong>50.0MB</strong> - ₦25 (30 Days)</li> <li class='white-bg'><strong>150.0MB</strong> - ₦50 (30 Days)</li> <li><strong>250.0MB</strong> - ₦70 (30 Days)</li> <li class='white-bg'><strong>12.0GB</strong> - ₦2880 (30 Days)</li> <li><strong>60.0GB</strong> - ₦14700 (30 Days)</li>								
			<li>30days validity. Dial *321*4*3*3# to check balance</li>						
									
								</ul>
								<a class="sign" href="login.html"><i class="fa fa-hand-o-right hided-icon"></i> Buy Now</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="single-price mb-30">
							<div class="price-title price-glo">
								<h3>GLO</h3>
								</div>
							<div class="plan-list">
								<ul class="item-list">
								       <li><strong>800MB</strong> - ₦465 (14 Days) incl 1gig night</li> <li class='white-bg'><strong>3.9GB</strong> - ₦907 (30 Days) incl 2.0gb night</li> <li><strong>4.1GB</strong> - ₦1347 (30 Days) incl 600mb night</li> <li class='white-bg'><strong>5.8GB</strong> - ₦1772 (30 Days) incl 600mb night</li> <li><strong>7.5GB</strong> - ₦2357 (30 Days) incl 4gig night</li> <li class='white-bg'><strong>10.0GB</strong> - ₦2662 (30 Days) incl 1.0GB night</li> <li><strong>14.0GB</strong> - ₦3672 (30 Days) incl 1.0GB night</li> <li class='white-bg'><strong>20.0GB</strong> - ₦4372 (30 Days) incl 2.0GB night</li> <li><strong>29.5GB</strong> - ₦6282 (30 Days)</li> <li class='white-bg'><strong>93.0GB</strong> - ₦12772 (30 Days)</li> <li><strong>50GB</strong> - ₦8632 (30 Days)</li> <li class='white-bg'><strong>200.0MB</strong> - ₦79 (30 Days)</li> <li><strong>500.0MB</strong> - ₦130 (30 Days)</li> <li class='white-bg'><strong>1.0GB</strong> - ₦255 (30 Days)</li> <li><strong>2.0GB</strong> - ₦510 (30 Days)</li> <li class='white-bg'><strong>3.0GB</strong> - ₦765 (30 Days)</li> <li><strong>5.0GB</strong> - ₦1275 (30 Days)</li> <li class='white-bg'><strong>10GB</strong> - ₦2550 (30 Days)</li>							<li class="white-bg">30days validity. Dial *127*0# to check balance</li>				
								
								</ul>
								<a class="sign" href="login.html"><i class="fa fa-hand-o-right hided-icon"></i> Buy Now</a>
							</div>
						</div>
					</div>
					

					<div class="col-md-6 col-sm-6">
						<div class="single-price mb-30">
							<div class="price-title price-airtel">
								<h3>AIRTEL</h3>
								</div><div class="plan-list">
								<ul class="item-list">
								   <li><strong>100MB</strong> - ₦85 (7 Days)</li> <li class='white-bg'><strong>300MB</strong> - ₦185 (7 Days)</li> <li><strong>500MB</strong> - ₦200 (MONTHLY)</li> <li class='white-bg'><strong>1GB</strong> - ₦300 (MONTHLY)</li> <li><strong>2GB</strong> - ₦600 (MONTHLY)</li> <li class='white-bg'><strong>5GB</strong> - ₦1500 (MONTHLY)</li> <li><strong>15GB</strong> - ₦4330 (MONTHLY)</li> <li class='white-bg'><strong>20GB</strong> - ₦5830 (MONTHLY)</li> <li><strong>10.0GB</strong> - ₦2400 (30 Days)</li> <li class='white-bg'><strong>100.0MB</strong> - ₦34 (7 Days)</li> <li><strong>300.0MB</strong> - ₦85 (7 Days)</li> <li class='white-bg'><strong>500.0MB</strong> - ₦130 (30 Days)</li> <li><strong>1.0GB</strong> - ₦280 (30 Days)</li> <li class='white-bg'><strong> 2.0GB</strong> - ₦560 (30 Days)</li> <li><strong>5.0GB</strong> - ₦1400 (30 Days)</li> <li class='white-bg'><strong>10.0GB</strong> - ₦2800 (30 Days)</li> <li><strong>15.0GB</strong> - ₦4200 (30 Days)</li> <li class='white-bg'><strong>20.0GB</strong> - ₦5600 (30 Days)</li>        	<li class="white-bg">30days validity. Dial *140# to check balance</li>
								</ul>
								<a class="sign" href="login.html"><i class="fa fa-hand-o-right hided-icon"></i> Buy Now</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="single-price mb-30">
							<div class="price-title price-9mobile">
								<h3>9MOBILE</h3>
								</div>
							<div class="plan-list">
								<ul class="item-list">
								       <li><strong>500MB</strong> - ₦485 (30 Days)</li> <li class='white-bg'><strong>1.5GB</strong> - ₦917 (30 Days)</li> <li><strong>2GB</strong> - ₦1107 (30 Days)</li> <li class='white-bg'><strong>3GB</strong> - ₦1317 (30 Days)</li> <li><strong>4.5GB</strong> - ₦1792 (30 Days)</li> <li class='white-bg'><strong>1GB</strong> - ₦369 (30 Days)</li> <li><strong>1.50GB</strong> - ₦500 (30 Days)</li> <li class='white-bg'><strong>2.0GB</strong> - ₦700 (30 Days)</li> <li><strong>5GB</strong> - ₦1840 (30 Days)</li>								
									<li>30days validity. Dial *229*9# to check balance</li>	
								</ul>
								<a class="sign" href="login.html"><i class="fa fa-hand-o-right hided-icon"></i> Buy Now</a>
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
									<a href="#"><h2><b><span style="color: #fff;">VTU</span></b></h2></a>
								</div>
								<div class="footer-address">
									<p>VTU is a Telecommunication company that deals with subscription of Data, Cable Tv, Electricity, Airtime VTU And Education bills. </p>
								</div>
								
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="footer-widget md-30">
							    <br/><br/>
							    <div class="address">
									<ul class="list-unstyled contact">
										<li><p><strong><i class="fa fa-map-marker"></i> </strong><?php echo $address;?></p></li> 
										<li><p><strong><i class="fa fa-envelope"></i></strong><?php echo $email;?></p></li>
										<li> <p><strong><i class="fa fa-phone"></i></strong> <?php echo $phone;?></p></li>
										
										
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
			<div class="floating-wpp"><a href="https://api.whatsapp.com/send?phone=<?php echo $wphone;?>&amp;text=Hello,%20I%20am%20contacting%20from%20SubForMe%20Platform"><img src="img/whatsapp.svg" width="60" height="60" style="border-radius: 50%;"></a></div>
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

<!-- Mirrored from sagtele.com/sag/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 May 2023 15:51:02 GMT -->
</html>
