<?php 

include 'head.php'
?>
<!-- welcome -->
		<div class="row">
			<div class="col-md-12 page-heading">
   <div class="breadcrumb-title text-center">
							<h4>Electricity Transaction</h4>
							<div class="breadcrumb-menu">
							<ul>
								<li><a href="main.php">Account</a></li>
								<li>Electricity Transaction</li>
							</ul>
						</div>
			</div>
		</div>
	</div>
		<!-- welcome end -->
		<div class="container">
      <div class="row">
      	<div class="col-md-12">
      		<div class="wrapper-content">
      			<div class="wrap-inside">
      				<div class="row">
               <div class="col-md-12">
                   <button type="button" class="badge badge-me badge-pending" data-toggle="modal" data-target="#exampleModalCenter">
  Search
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Search Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php
          
                      if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  $pageaddedus = "?page_no=".$page_no;
  }
          
          ?>
       <form method="GET" action="<?php echo $pageaddedus; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Meter Number</label>
    <input type="text" name="service" class="form-control" id="exampleInputEmail1" placeholder="Meter Number">
  </div>
 
  <div class="form-group">
    <label for="exampleInputEmail1">Trans. Id</label>
    <input type="text" name="transid" class="form-control" id="exampleInputEmail1"  placeholder="Trans. Id">
  </div>
 
  <button type="submit" name="search" class="btn btn-primary">Search</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <div class="card shadow mb-4" style="padding: 0;">
      <div class="card-header py-3 bgcard-header">
        <h5 class="m-0 font-weight-bold">Transactions </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th> Username </th>
                <th> Service </th>
                 <th> Number </th>
                  
                  <th> Price </th>
                  <th> Plan </th>
                   <th> Status </th>
                    <th> Trans. Id </th>
                   <th> Date </th>
                   <th>Action</th>
                    <th>Action</th>
                 </tr>
               </thead>
                  <tbody>
                <?php 

                if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  $pageadded = "&page_no=".$page_no;
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 30;
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($db,"SELECT COUNT(*) As total_records FROM `transactions` WHERE type = 'elect' ".$searchresult."");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1

                 $sql = "SELECT * FROM transactions WHERE type = 'elect' ".$searchresult." ORDER BY id DESC LIMIT $offset, $total_records_per_page";
                 $result = mysqli_query($db, $sql);
                 while($user = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td> <?php echo $user['username']; ?> </td>
                 <td>  <?php 
                    echo $user['package'];
                     ?>   </td>
                  <td> <?php echo $user['client']; ?> </td>
                  <td> &#8358;<?php echo $user['amount']; ?> </td>
                  <td> <?php echo $user['plan']; ?> </td>
                  
                  <?php if($user['status'] == "pending" || $user['status'] == "cancelled"){ ?>
                  <td style="color: red;"><b> <?php echo $user['status']; ?> </b></td>
                <?php } if($user['status'] == "SUCCESSFUL" || $user['status'] == "successful"){ ?>
                  <td style="color: green;"><b> <?php echo $user['status']; ?> </b></td>
                <?php } ?>

                  <td> <?php echo $user['trans_id']; ?> </td>
                <td> <?php $wdate = $user['made_at'];
                       echo date("D d F, Y; g:i A", strtotime($wdate));
                   ?></td>
                   <td>
                                     
                                     <a href="update_trans.php?id=<?php echo $user['id'];?>"> 
                                     <span class="badge badge-me badge-pending">Edit </span> </a>
                                     <a href="?id=<?php echo $user['id'];?>"> 
                                     <span class="badge badge-me badge-error" onClick="return confirm('Do you really want to delete');"> Delete </span></a>
                                     
                                  </td>
                                   <td>
                                     <a href="?mid=<?php echo $user['trans_id'];?><?php echo $pageadded.$searchgetb;?>"> 
                                     <span class="badge badge-me badge-info"> Query </span></a>
                                     
                                  </td>
                  </tr>

                <?php } 
               mysqli_close($db);
                ?>
               
                  </tbody>
             </table>
           </div>
           <div style='padding: 10px 10px 0px; border-top: dotted 1px #CCC;'>

</div>
<ul class="pagination">
  <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
  <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=".$previous_page.$searchgetb."'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 10){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=".$counter.$searchgetb."'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 10){
    
  if($page_no <= 4) {     
   for ($counter = 1; $counter < 8; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=".$counter.$searchgetb."'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$second_last".$searchgetb."'>$second_last</a></li>";
    echo "<li><a href='?page_no=$total_no_of_pages".$searchgetb."'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {     
    echo "<li><a href='?page_no=1$searchgetb'>1</a></li>";
    echo "<li><a href='?page_no=2$searchgetb'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter".$searchgetb."'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?page_no=$second_last".$searchgetb."'>$second_last</a></li>";
     echo "<li><a href='?page_no=$total_no_of_pages".$searchgetb."'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li><a href='?page_no=1$searchgetb'>1</a></li>";
    echo "<li><a href='?page_no=2$searchgetb'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter".$searchgetb."'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disbled'"; } ?>>
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page".$searchgetb."'"; } ?>>Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages'".$searchgetb.">Last &rsaquo;&rsaquo;</a></li>";
    } ?>
</ul>

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