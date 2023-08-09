
function netSelect(){
    document.getElementById('epinamt').selectedIndex = 0;
    var datanet=document.getElementById('datanet').value;
    var mobileprice2=document.getElementById('mobileprice2');
    var mobileprice=document.getElementById('mobileprice');
    var isRight = "yes";
    
    
    
    if(datanet == "9MOBILE"){
      mobileprice.style.display = "none"; 
       mobileprice2.style.display = "none";
    }else{
         mobileprice.style.display = "block"; 
           mobileprice2.style.display = "block";
    }
    
    
    
    }
    
    
    function epinSelect(){
    
    var datanet=document.getElementById('datanet').value;
    var epinamt=document.getElementById('epinamt').value;
    var isRight = "yes";
    
    if(datanet == ""){
       // alert('');
        isRight = "no";
    }
    if(epinamt == ""){
       // alert('');
        isRight = "no";
    }
    
    
    if(isRight == "yes"){
    //MAKE AJAX CALL
      $.ajax({
           
           type:"post",
           url:"checkepin.php",
           data: 'network='+datanet+'&epinamt='+epinamt,
           success:function(response)
           {
         
            document.getElementById("amt2").value = response;
             
           
          
        
    }
    });
    }
    
    }