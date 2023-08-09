function preLoader(y){
    if(y=="on"){
        document.getElementById('loader').innerHTML ="<img src='loader.gif' />";
    }
    if(y=="off"){
        document.getElementById('loader').innerHTML="<input type='submit' class='btnn btn-primary' onclick='electCheck()' value='Confirm Details'>";
    }
}



function electCheck(){
preLoader('on'); 
document.getElementById('customerName').innerHTML="";
document.getElementById('accesstoken').value="";
var meterNo1=document.getElementById('meterNo').value;
var meterType1=document.getElementById('meterType').value;
var service1=document.getElementById('service').value;
var isRight = "yes";

if(meterNo1 === ""){
alert("Input meter number.");
preLoader('off');
isRight = "no";

}
if(meterType1 === ""){
alert("Please select meter type.");
preLoader('off');
isRight = "no";

}
if(service1 === ""){
alert("Please choose package.");
preLoader('off');
isRight = "no";

}



if(isRight == "yes"){
//MAKE AJAX CALL
$.ajax({

type:"post",
url:"checkelect.php",
data: 'service='+service1+'&meterno='+meterNo1+'&metertype='+meterType1,
success:function(respnx)
{
response = JSON.parse(respnx);


 if(response['result']=="yes"){ 
     alert(response['msg']);
    document.getElementById('customerName').innerHTML="Customer Name: <b>"+response['name']+"</b>";
   document.getElementById('accesstoken').value=response['token'];
   preLoader('off');
}else{
   
     alert(response['msg']);
   preLoader('off');
}

}
});
}

}