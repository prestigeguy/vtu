<?php ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin - </title>
         <meta name="description" content=" Telecommunication gives the best and cheapest mobile data, cable tv subscription, electricity, airtime vtu and education bills. It makes life easier by giving out a certain dicount for any transaction made on the website. "/>
    <meta name="keywords" content="Data,Airtime VTU,DSTV,GOTV,SMILE,STARTIMES,WAEC,NECO,Electricity,Prepaid,Postpaid" />
    <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <link rel="icon" href="../img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
		<!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Our Custom CSS -->
    
   

    <!-- Font Awesome JS -->
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../user/style3.css">
    
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
    <style>
        .smothover:hover{
            background: #1a2035 !important;
    border: 2px solid #6d7fcc;
        }
        .mCSB_dragger_bar{
            width: 10px !important;;
        }
    </style>
    </head>
    <body>
     <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- header start -->
		
		<header>
			<nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <span>VTU SITE</span>
            </div>

            <ul class="list-unstyled components" style="margin-bottom: 100px;">
                <p class="navp" style="text-align: center;">
                    <img src="../img/profile.png" alt="" /><br/>
                                Welcome,<br/>
                        <b>  Admin</b>
                            </p>
                <li class="active">
                 <a class="nava" href="main.php">  <i class="fa fa-home"></i> Dashboard</a>
                 </li>
                     <li> 
                    <a class="nava" href="#homeSubmenuwth" data-toggle="collapse" aria-expanded="false"><i class="fa fa-wallet"></i> Wallet Summary &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-down"> </i> </a>
                    <ul class="collapse list-unstyled listdrop" id="homeSubmenuwth">
                        <li>
                            <a class="nava smothover" href="admin_summary.php"> Admin Wallet Summary  </a>
                        </li>
                        <li>
                                <a class="nava smothover" href="user_summary.php">User Wallet Summary </a>
                        </li>
                     
                        
                    </ul>
                </li>
                     <li> 
                    <a class="nava" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><i class="fa fa-history"></i> Transactions &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-down"> </i> </a>
                    <ul class="collapse list-unstyled listdrop" id="homeSubmenu">
                        <li>
                            <a class="nava smothover" href="data_trans.php"> Data Transactions  </a>
                        </li>
                        <li>
                            <a class="nava smothover" href="airtime_trans.php">Airtime VTU Transactions</a>
                        </li>
                        <li>
                            <a class="nava smothover" href="bills_trans.php"> Cable TV Transactions  </a>
                        </li>
                        <li>
                            <a class="nava smothover" href="edu_trans.php">Education Transactions</a>
                        </li>
                        <li>
                            <a class="nava smothover" href="elect_trans.php">Electricity Transactions</a>
                        </li>
                          <li>
                            <a class="nava smothover" href="transfer_trans.php">Transfer Transactions</a>
                        </li>
                        
                         <li>
                            <a class="nava smothover" href="transaction.php">All Transactions</a>
                        </li>
                        
                    </ul>
                </li>
                <li>
                    <a class="nava" href="data_prices.php">  <i class="fa fa-mobile"></i> Data Prices</a>
                    </li>
                <li>
                    <li>
                    <a class="nava" href="vtu_prices.php">  <i class="fa fa-folder"></i> Airtime Prices</a>
                    </li>
                <li>
                    <a class="nava" href="bills_prices.php">  <i class="fa fa-tv"></i> Cable TV Prices</a>
                    </li>
                <li>
                <li>
                    <a class="nava" href="edu_prices.php">  <i class="fa fa-book-open"></i> Education Prices</a>
                    </li>
                <li>
                
                    <li>
                    <a class="nava" href="elect_prices.php">  <i class="fa fa-plug"></i> Electricity Prices</a>
                    </li>
              
  
                     <li>
                    <a class="nava" href="add_trans.php"><i class="fa fa-plus"></i> Add Transaction </a>
    
                    </li>
                     <li>
                    <a class="nava" href="credebt.php"><i class="fa fa-history"></i> Credit/Debit User </a>
    
                    </li>
                    
                    
                  
                    <li>
                    <a class="nava" href="notification.php"><i class="fa fa-info"></i> Notifications </a>
    
                    </li>
                    <li>
                        
                    <a class="nava" href="search.php">  <i class="fa fa-user"></i> Search User</a>
                    </li>
                    <li>
                    <a class="nava" href="withdraw.php">  <i class="fa fa-user"></i> Withdrawal</a>
                    </li>
                    <li>
                    <a class="nava" href="transfer.php">  <i class="fa fa-user"></i> Transfer</a>
                    </li>
                    <li>
                    <a class="nava" href="facebook_pixel.php">  <i class="fa fa-code"></i> Facebook Pixel</a>
                    </li>
                    <li>
                    <a class="nava" href="settings.php">  <i class="fa fa-cog"></i> Settings</a>
                    </li>
                    <li>
                    <a class="nava" href="change_password.php">  <i class="fa fa-lock"></i> Change Password</a>
                    </li>
                     
                   

            
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
        <!-- header end -->