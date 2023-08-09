<?php 
session_start();
include "../conn.php";

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
    
    $sql3 = "DELETE FROM users WHERE id = '$uid'";
    $res3 = mysqli_query($conn,$sql3);
    if($res3){
      echo "
      <script> alert('User deleted successfully!'); </script>
      ";
    }
  }


}

$request = "";
$param["username"] = "Prestigeguy";
$param["apiKey"] = "sagf";
//unique id, you can use time()
foreach($param as $key=>$val) //traverse through each member of the param array
{
$request .= $key . "=" . urlencode($val); //we have to urlencode the values
$request .= '&'; //append the ampersand (&) sign after each paramter/value pair
}
$len = strlen($request) - 1;
$request = substr($request, 0, $len); //remove the final ampersand sign from the request

$url = "https://subandgain.com/api/balance.php?".$request; //The URL given in the documentation without parameters
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$url");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //return as a variable
$response = curl_exec($ch);
curl_close($ch);
//echo $response;
//decode response to get trans_id,network,phone_number,amount,status and balance
$array = json_decode($response, true); //decode the JSON response

$sagbalance = $array['balance']; 

$sql2 = "SELECT SUM(wallets) as total_wallet FROM users";
$res2 = mysqli_query($conn, $sql2);
$result2 = mysqli_fetch_assoc($res2);
$totatluserwallet = $result2['total_wallet'];

$sql3 = "SELECT * FROM users";
$res3 = mysqli_query($conn, $sql3);
$totalcustomers = mysqli_num_rows($res3);



include 'head.php';
?>

        <!-- welcome -->
        <div class="row">
            <div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
                            <h4>Admin</h4>
                            <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="main.php">Home</a></li>
                                <li>dashboard</li>
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
                  
          <!-- wallet-->
          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              SubAndGain Balance
            </div> 
            <div class="state-value">
                   &#8358; <?php echo $sagbalance;?>
            </div>
           
          </div>
                 
              </div>
            </div>
            
                        <div class="col-md-4">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              Admin Balance 
            </div>
            <div class="state-value">
                    &#8358;<?php echo $wallets;?> 
            </div> 
            
          </div>
                 
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              Ambassador wallet
            </div>
            <div class="state-value">
                     &#8358;
            </div> 
           
          </div>
                 
              </div>
            </div>

          </div> <br/>
          <!-- wallet end -->
          <!-- referral set-->
          <div class="row">
               <div class="col-md-4">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              Total customers wallet
            </div>
            <div class="state-value">
                     &#8358; <?php echo $totatluserwallet;?>
            </div> 
           
          </div>
                 
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              Total Customers
            </div>
            <div class="state-value">
                 <?php echo $totalcustomers;?>
            </div> 
            
          </div>
                 
              </div>
            </div>
            
             <div class="col-md-4">
              <div class="panel panel-default sect-page">
                  <div class="sect-page panel-body">
              <div class="label label-succes">
              Site Status
            </div>
            <div class="state-value">
              
              <?php if($status == "Active"){
                echo "<span style='color: green;'>Active</span>";
              }else{
                echo "<span style='color: red;'>Pending</span>";
              }
              ?>
                  
            </div> 
            <hr class="hr-space">
            <p class="span-info"></p>
            
          </div>
                 
              </div>
            </div>
           
            
          </div> <br/>
          
          <br/>
          <!-- referral set end -->
       
<!-- pages section -->
<div class="row">
   
   <div class="col-md-12">
    <div class="card shadow mb-4" style="padding: 0;">
        <div class="card-header py-3 bgcard-header">
            <h5 class="m-0 font-weight-bold">All Users </h5>
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                <th> S/N</th>
                <th> First Name </th>
                 <th> Last Name </th>
                  <th> Username </th>
                   <th> Wallet </th>
                   <th> Phone Number </th>
                   <th> Email </th>
                    <th> Wema Account No. </th>
                   <th> Sterling Account No. </th>
                   <th> GTBank Account No. </th>
                   <th> Created On </th>
                   <th>Action</th>
                   <th>Action</th>
                  
                 </tr>
               </thead>
               <tbody>
               <?php
               $i = 1;
                  $sql1 = "SELECT * FROM users ORDER BY id DESC";
                  $res1 = mysqli_query($conn, $sql1);
                  while($history = mysqli_fetch_assoc($res1)){

                  

?>
                <tr>
                   <td><?php echo $i;?>  </td>
                  <td>  <?php echo $history['fname'];?>   </td>
                  <td> <?php echo $history['lname'];?>  </td>
                  <td> <?php echo $history['username'];?>  </td>
                  <td> <?php echo $history['wallets'];?>  </td>
                  <td> <?php echo $history['phone_number'];?>  </td>
                  <td><?php echo $history['email'];?> </td>
                  <td><?php echo $history['wemaacc'];?> </td>
                <td><?php echo $history['steracc'];?>  </td>
                 <td> <?php echo $history['gtbacc'];?> </td>
                  <td> <?php echo $history['date'];?> </td>
                  <td><a href="update_user.php?id=<?php echo $history['id'];?>"> <span style="
    background-color: #4242eb;
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
"> Edit </span> </a> </td>
<td>  <a href="?id=<?php echo $history['id'];?>" onclick="return confirm('Are you sure you want to delete this user?');"> <span style="
    background-color: #af0606;
    padding: 5px 10px;
    color: #fff;
    border-radius: 5px;
"> Delete </span> </a> </td>
                
               

                  </tr>
            <?php $i++; } ?>
  
                  </tbody>
             </table>
            
           </div>
            <div style='padding: 10px 10px 0px; border-top: dotted 1px #CCC;'>

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
</div>

        <!-- dashboard home end -->
        
        <!-- footer start -->
        <?php include 'foot.php' ?>