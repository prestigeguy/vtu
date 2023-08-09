<?php
session_start();
include "../conn.php";
$msg = "";
if(isset($_POST['admin_log'])){

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	if($username == ""){
		$msg = "Username/phone number is required";
	}

	if($password == ""){
		$msg = "Password is required";
	}

	if($msg == ""){

	$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1";
	$res = mysqli_query($conn,$sql);
	$numrows = mysqli_num_rows($res);

	if($numrows > 0){

		$_SESSION['ADMIN'] = $username;
		header("Location: main.php");


	}else{
		$msg = "Invalid login details";
	}

}




}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin - SubAndGain</title>
         <meta name="description" content="SubAndGain Telecommunication gives the best and cheapest mobile data, cable tv subscription, electricity, airtime vtu and education bills. It makes life easier by giving out a certain dicount for any transaction made on the website. "/>
    <meta name="keywords" content="Data,Airtime VTU,DSTV,GOTV,SMILE,STARTIMES,WAEC,NECO,Electricity,Prepaid,Postpaid" />
    <meta name="author" content="SUBANDGAIN" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Our Custom CSS -->
    

    <!-- Font Awesome JS -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../style3.css">
    
		<!-- all css here -->
         <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap-grid.css">
        <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="../css/owl.carousel.css">
		<link rel="stylesheet" href="../css/magnific-popup.css">
		<link rel="stylesheet" href="../css/meanmenu.css">
        <link rel="stylesheet" href="../styles.css">
        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/animation.css">
        
       <!-- Font Awesome JS -->
   
    </head>
    <body>
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
					
						<form id="contact-form" class="text-center" method="post">

						<?php if($msg != ""){
				echo '<div class="alert alert-danger">'.$msg.'</div>';

					 } ?>
							
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<input type="text"  placeholder="Username" name="username" required>
								</div>
								<div class="col-md-12 col-sm-12">
									<input type="password" placeholder="Password" name="password" required>
								</div>
								<div class="col-md-12 text-center">
									<button class="btn" type="submit" name="admin_log">Login</button>
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

	</body>
	</html>
