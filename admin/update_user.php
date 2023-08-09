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

if(isset($_GET['id']) && $_GET['id'] != ""){
  $uid = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

  $sql2 = "SELECT * FROM users WHERE id = '$uid'";
  $res2 = mysqli_query($conn,$sql2);
  if(mysqli_num_rows($res2) > 0){
    $userdetails = mysqli_fetch_assoc($res2);

    $username = $userdetails['username'];
    $phone = $userdetails['phone_number'];
    $email = $userdetails['email'];
  $fname = $userdetails['fname'];

  }else{
    header("location: main.php");
    die();
  
  }


}else{
  header("location: main.php");
  die();

}

if(isset($_POST['update'])){

  $uusername = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
  $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);

	if($uusername == ""){
		$msg = "Username is required";
	}

	if($phone == ""){
		$msg = "phone number is required";
	}
  if($fname == ""){
		$msg = "first name is required";
	}
  if($email == ""){
		$msg = "email is required";
	}

  if($msg == ""){

    $sql3 = "UPDATE users SET username = '$uusername', phone_number = '$phone', fname = '$fname', email = '$email' WHERE id = '$uid'";
    $res3 = mysqli_query($conn, $sql3);
    if($res3){
      $success = "Profile updated successfully";
    }else{
      $msg = "Something went wrong. Please try again";
    }

  }

}


if(isset($_GET['id']) && $_GET['id'] != ""){
  $uid = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

  $sql2 = "SELECT * FROM users WHERE id = '$uid'";
  $res2 = mysqli_query($conn,$sql2);
  if(mysqli_num_rows($res2) > 0){
    $userdetails = mysqli_fetch_assoc($res2);

    $username = $userdetails['username'];
    $phone = $userdetails['phone_number'];
    $email = $userdetails['email'];
  $fname = $userdetails['fname'];

  }else{
    header("location: main.php");
    die();
  
  }


}else{
  header("location: main.php");
  die();

}

include 'head.php'
?>


<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Update Users</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">dashboard</a></li>
								<li> Update</li>
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
   			<h6 class="m-0 font-weight-bold" style="text-transform: capitalize;"><?php echo $username;?>'s Information </h6>
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
           <label class="normal"> Username</label>
           <div class="input-group mb-3">
          
           <input type="text" name="username" class="form-control" value="<?php echo $username;?>" required/>
         </div>
        
         <label class="normal"> Phone Number</label>
         <div class="input-group mb-3">
           <input type="number" class="form-control" name="phone" value="<?php echo $phone;?>" required>
         </div>
         <label class="normal"> First Name</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>" required>
         </div>
         
         <label class="normal"> Email</label>
         <div class="input-group mb-3">
           <input type="text" class="form-control" name="email" value="<?php echo $email;?>" required>
         </div>
           <input type="submit" class="btnn btn-primary" name="update" value="Update">
           
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