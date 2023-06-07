function dataSelect(){

    var datanet=document.getElementById('datanet').value;
    var isRight = "yes";
    
    
    if(isRight == "yes"){
    //MAKE AJAX CALL
      $.ajax({
           
           type:"post",
           url:"checkdata.php",
           data: 'network='+datanet,
           success:function(response)
           {
         
            document.getElementById("dataprice").innerHTML = response;
             
           
          
        
    }
    });
    }
    
    }