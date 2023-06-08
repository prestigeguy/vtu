<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Dashboard - SubForMe</title>
         <meta name="description" content="SubForMe Telecommunication gives the best and cheapest mobile data, cable tv subscription, electricity, airtime vtu and education bills. It makes life easier by giving out a certain dicount for any transaction made on the SubForMe. "/>
    <meta name="keywords" content="Data,Airtime VTU,DSTV,GOTV,SMILE,STARTIMES,WAEC,NECO,Electricity,Prepaid,Postpaid" />
    <meta name="author" content="SubForMe" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
		<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Our Custom CSS -->
    

    <!-- Font Awesome JS -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style3.css">
    
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
        
       <!-- Font Awesome JS -->
    <style>
       
        .mCSB_dragger_bar{
            width: 10px !important;;
        }
    </style>
    </head>
    <body>
     

        <!-- Add your site or application content here -->
		<!-- header start -->
		
		<header>
			<nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <span>SubForMe</span>
            </div>

            <ul class="list-unstyled components">
                <p class="navp" style="text-align: center;">
                    <img src="img/profile.png" alt="" /><br/>
                                Hi,<br/>
                        <b>  <?php echo $username;?></b>
                            </p>
                <li class="active">
                 <a class="nava" href="dashboard.php">  <i class="fa fa-home"></i> Dashboard</a>
                 </li>
                 <li> 
                    <a class="nava" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-wallet"></i> Wallet &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-down"> </i> </a>
                    <ul class="collapse list-unstyled listdrop" id="homeSubmenu">
                        <li>
                            <a class="nava" href="fund_wallet.php"> 
                               
                            	Fund Wallet

                            </a>
                        </li>
                        <li>
                            <a class="nava" href="wallet_history.php">Wallet History</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a class="nava" href="buy_data.php">  <i class="fa fa-mobile"></i> Buy Data</a>
                    </li>
                    <li>
                    <a class="nava" href="airtime_vtu.php"><i class="fa fa-folder"></i> Airtime VTU </a>
                    </li>
                      <li>
                    <a class="nava" href="epin.php"><i class="fa fa-folder"></i> Recharge Card Printing </a>
                    </li>
                    <li>
                    <a class="nava" href="bills.php"> <i class="fa fa-tv"></i> Pay Bills </a>
                    </li>
                 
                    <li>
                    <a class="nava" href="transaction.php"> <i class="fa fa-history"></i> Transactions </a>
                    </li>
                    
                        <li>
                    <a class="nava" href="transfer.php"> <i class="fa fa-level-up-alt"></i> Transfer </a>
                    </li>
                   
                     
                    <li>
                    <a class="nava" href="faqs.php"> <i class="fa fa-question-circle" aria-hidden="true"></i> FAQs </a>
                    </li>
                    <li>
                    <a class="nava" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-user"></i> Profile    &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-down"> </i></a>
                    <ul class="collapse list-unstyled listdrop" id="pageSubmenu">
                        <li>
                            <a class="nava" href="profile.php">Edit Profile</a>
                        </li>
                        <li>
                            <a class="nava" href="change_password.php">Change Password</a>
                        </li>
                    </ul>
                </li>
               
                <li style="margin-bottom: 28px;">
                    <a class="nava" href="logout.php"> <i class="fa fa-power-off"> </i> Logout </a>
                    </li>
                
            </ul>

            
        </nav>
		</header>

		  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="shift">
                        <i class="fas fa-align-left"></i>
                        <span>MENU</span>
                    </button>
                    <a href="logout.php">
                    	<i class="fa fa-power-off" style="color: grey;"> </i>
                    </a>


                </div>
            </nav>