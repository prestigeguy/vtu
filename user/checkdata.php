<?php
include "../conn.php";

$network = filter_var($_POST['net'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM data_bundles WHERE network = '$network' ";
$res = mysqli_query($conn,$sql);

while($bundles = mysqli_fetch_assoc($res)){
    $bund = $bundles['bundle'];
    $price = $bundles['price'];
    $type = $bundles['type'];
echo "<option value='$bund'>$bund = N$price ($type)</option>";

}







?>