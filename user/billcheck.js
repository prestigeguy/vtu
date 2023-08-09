function preLoader1(y){
    if(y=="on"){
        document.getElementById('loader1').innerHTML ="<img src='loader.gif' />";
    }
    if(y=="off"){
        document.getElementById('loader1').innerHTML="<input type='submit' class='btnn btn-primary' onclick='dstvCheck()' value='Confirm Customer'>";
    }
}

 function preLoader2(y){
    if(y=="on"){
        document.getElementById('loader2').innerHTML ="<img src='loader.gif' />";
    }
    if(y=="off"){
        document.getElementById('loader2').innerHTML="<input type='submit' class='btnn btn-primary' onclick='gotvCheck()' value='Confirm Customer'>";
    }
}

 function preLoader3(y){
    if(y=="on"){
        document.getElementById('loader3').innerHTML ="<img src='loader.gif' />";
    }
    if(y=="off"){
        document.getElementById('loader3').innerHTML="<input type='submit' class='btnn btn-primary' onclick='startCheck()' value='Confirm Customer'>";
    }
}

function dstvCheck(){
preLoader1('on'); 
document.getElementById('customerName1').innerHTML="";
var cardNo1=document.getElementById('cardNo1').value;
var service1=document.getElementById('service1').value;

if(cardNo1 === ""){
alert("Input IUC number.");
preLoader1('off');

}else{
//MAKE AJAX CALL
$.ajax({

type:"post",
url:"checkbill.php",
data: 'service='+service1+'&cardNo='+cardNo1,
success:function(respnx)
{
response = JSON.parse(respnx);


 if(response['result']=="yes"){ 
     alert(response['msg']);
   document.getElementById('customerName1').innerHTML="Customer Name: <b>"+response['name']+"</b>";
   preLoader1('off');
}else{
   
     alert(response['msg']);
   preLoader1('off');
}

}
});
}

}


function gotvCheck(){
preLoader2('on'); 
document.getElementById('customerName2').innerHTML="";
var cardNo1=document.getElementById('cardNo2').value;
var service1=document.getElementById('service2').value;

if(cardNo1 === ""){
alert("Input IUC number.");
preLoader2('off');

}else{
//MAKE AJAX CALL
$.ajax({

type:"post",
url:"checkbill.php",
data: 'service='+service1+'&cardNo='+cardNo1,
success:function(respnx)
{
response = JSON.parse(respnx);


 if(response['result']=="yes"){ 
     alert(response['msg']);
   document.getElementById('customerName2').innerHTML="Customer Name: <b>"+response['name']+"</b>";
   preLoader2('off');
}else{
   
     alert(response['msg']);
   preLoader2('off');
}

}
});
}

}


function startCheck(){
preLoader3('on'); 
document.getElementById('customerName3').innerHTML="";
var cardNo1=document.getElementById('cardNo3').value;
var service1=document.getElementById('service3').value;

if(cardNo1 === ""){
alert("Input smartcard number.");
preLoader3('off');

}else{
//MAKE AJAX CALL
$.ajax({

type:"post",
url:"checkbill.php",
data: 'service='+service1+'&cardNo='+cardNo1,
success:function(respnx)
{
response = JSON.parse(respnx);


 if(response['result']=="yes"){ 
     alert(response['msg']);
   document.getElementById('customerName3').innerHTML="Customer Name: <b>"+response['name']+"</b>";
   preLoader3('off');
}else{
   
     alert(response['msg']);
   preLoader3('off');
}

}
});
}

}