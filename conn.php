<?php

//$conn = mysqli_connect(hostname,database username, database password, database name);

$conn = mysqli_connect("localhost", "root", "", "phptraining");

if($conn){
 
}else{
    echo "not connected";
}



?>