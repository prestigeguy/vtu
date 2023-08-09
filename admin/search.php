<?php 
session_start();
include "../conn.php";
$msg = $success = $uschname = "";
if(isset($_SESSION['ADMIN'])){

  $usernameph = $_SESSION['ADMIN'];

  $sql = "SELECT * FROM admin WHERE username = '$usernameph' LIMIT 1";
  $res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  $usrdetails = mysqli_fetch_assoc($res);

  
  $wallets = $usrdetails['wallet'];
  $status = $usrdetails['status'];
  $accname = $usrdetails['accname'];
  $accno = $usrdetails['accno'];
  $bank = $usrdetails['bank'];
 

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

  if($username == ""){
    $msg = "Please input username";
  }

  $sql = "SELECT * FROM users WHERE username = '$username' OR phone_number = '$username' OR email = '$username'";
  $res = mysqli_query($conn,$sql);

  if(mysqli_num_rows($res) > 0){
    $fecth = mysqli_fetch_assoc($res);

    $uschname = $fecth["username"];
  }else{
    $msg = "User not found";
  }


}

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Search</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Search</li>
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
   			<h6 class="m-0 font-weight-bold"> Search </h6>
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
           
           <input type="text"  class="form-control" name="username" value="" placeholder="Username/Email/Phone number"  />
         </div>
         
           <input type="submit" class="btnn btn-primary" name="update" value="Search">
           
       </div>
   </form>
  



                   </div>
               </div>

                <div class="row">
               <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
      <div class="card-header py-3 bgcard-header">
        <h5 class="m-0 font-weight-bold">User details </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <thead>
              <tr>
                <th> First Name </th>
                 <th> Last Name </th>
                  <th> Username </th>
                   <th> Wallet </th>
                   
                   <th> Phone Number </th>
                   <th> Email </th>
                    
                  <th> Wema Account No. </th>
                   <th> Sterling Account No. </th>
                   <th> Query </th>
                  </tr>
               </thead>
               <tbody>
                <?php 
                 $sql = "SELECT * FROM users WHERE username='$uschname' LIMIT 1";
                 $result = mysqli_query($conn, $sql);
                 while($user = mysqli_fetch_assoc($result)) { ?>
                <tr>
                  <td>  <?php 
                    echo $user['fname'];
                     ?>   </td>
                  <td> <?php echo $user['lname']; ?> </td>
                  <td> <?php echo $user['username']; ?> </td>
                  <td> &#8358;<?php echo $user['wallets']; ?> </td>
                  <td> <?php echo $user['phone_number']; ?> </td>
                <td> <?php echo $user['email']; ?></td>
                <td> <?php echo $user['wemaacc']; ?> </td>
                  <td> <?php echo $user['steracc']; ?> </td>
                 <td>
                                     
                                     <a href="update_user.php?id=<?php echo $user['id'];?>"> 
                                      <button type="submit" class="btnn btn-primary"> Edit </button> </a>
                                    
                                  </td>
                  </tr>
            
                <?php  } ?>
                  </tbody>
             </table>
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

  <?php include 'foot.php' ?> 