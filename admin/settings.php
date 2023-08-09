<?php 
session_start();
include "../conn.php";
$msg = $success = "";
if(isset($_SESSION['ADMIN'])){

  $usernameph = $_SESSION['ADMIN'];

  $sql = "SELECT wallet, status FROM admin WHERE username = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  
  $wallets = $usrdetails['wallet'];
  $status = $usrdetails['status'];
 

}else{
  header("location: index.php");
  die();
}


}else{

  header("location: index.php");
  die();

}


if(isset($_POST['update'])){

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  $whatsappnum = filter_var($_POST['whatsappnum'], FILTER_SANITIZE_STRING);
  $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
  $aemail = filter_var($_POST['aemail'], FILTER_SANITIZE_STRING);
  $whatsapp = filter_var($_POST['whatsapp'], FILTER_SANITIZE_STRING);
  $bank = filter_var($_POST['bank'], FILTER_SANITIZE_STRING);
  $accname = filter_var($_POST['accname'], FILTER_SANITIZE_STRING);
  $acno = filter_var($_POST['acno'], FILTER_SANITIZE_STRING);
  
	  if($username == ""){
		  $msg = "username is required";
	  }
   
    if($msg == ""){
      

      $sql = "UPDATE admin SET username = '$username', phone = '$phone', wphone = '$whatsappnum', address = '$address', email = '$aemail', wgroup = '$whatsapp', bank = '$bank', accname = '$accname', accno = '$acno'";
      $res4 = mysqli_query($conn,$sql);
      if($res4){
        $success = "Settings updated successfully";
      }else{
        $msg = "Settings not updated";
      }
    }



  }


  $sql = "SELECT * FROM admin";
$res = mysqli_query($conn,$sql);
$fetch = mysqli_fetch_assoc($res);

$username = $fetch["username"];
$phone = $fetch["phone"];
$wphone = $fetch["wphone"];
$address = $fetch["address"];
$email = $fetch["email"];
$wgroup = $fetch["wgroup"];
$bank = $fetch["bank"];
$accname = $fetch["accname"];
$accno = $fetch["accno"];

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Settings</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Settings</li>
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
   			<h6 class="m-0 font-weight-bold">Settings </h6>
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
            <label class="normal">Admin Username</label>
           <div class="input-group mb-3">

           <input type="text" name="username" class="form-control" value="<?php echo $username;?>" placeholder="Admin Username" required="" />
         </div>
         
         <label class="normal">Company Contact Number</label>
           <div class="input-group mb-3">

           <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" placeholder="Company Contact Number"  />
         </div>
         <label class="normal">Company Whatsapp Number</label>
           <div class="input-group mb-3">

           <input type="text" name="whatsappnum" class="form-control" value="<?php echo $wphone;?>" placeholder="Company Whatsapp Number"  />
         </div>
         <label class="normal"> Company Address</label>
           <div class="input-group mb-3">

           <input type="text" name="address" class="form-control" value="<?php echo $address;?>" placeholder="Company Address"/>
         </div>
          <label class="normal"> Company Email</label>
           <div class="input-group mb-3">

           <input type="text" name="aemail" class="form-control" value="<?php echo $email;?>" placeholder="Company Email" />
         </div>
          <label class="normal"> Company Whatsapp Group Link</label>
           <div class="input-group mb-3">

           <input type="text" name="whatsapp" class="form-control" value="<?php echo $wgroup;?>" placeholder="Company Whatsapp Group Link"  />
         </div>
         <label class="normal"> Bank</label>
         <div class="input-group mb-3">
            <select name="bank" class="form-control" >
               
         
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
          <label class="normal"> Account Name</label>
         <div class="input-group mb-3">
           <input type="text" name="accname" class="form-control" value="<?php echo $accname;?>" placeholder="Account Name">
         </div>
           <label class="normal">Account Number</label>
         <div class="input-group mb-3">
           <input type="text" name="acno" class="form-control" value="<?php echo $accno;?>" placeholder="Account Number" >
         </div>
       
           <input type="submit" class="btnn btn-primary" name="update" value="Update Settings">
           
       </div>
   </form>
  



                   </div>
               </div>

      			</div>
      		</div>
      	</div>
      </div>
  </div>

  <?php include 'foot.php' ?> 