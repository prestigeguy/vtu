


  //bill section
  var bills = document.getElementById("billselect");
  function billSlct(){
if (bills.value == ""){
   document.getElementById("DSTV").style.display = "none";
   document.getElementById("GOTV").style.display = "none";
   document.getElementById("SMILED").style.display = "none";
   document.getElementById("STARTIMES").style.display = "none";
   document.getElementById("SMILER").style.display = "none";
 }
   if (bills.value == "DSTV"){
   document.getElementById("DSTV").style.display = "block";
   document.getElementById("GOTV").style.display = "none";
   document.getElementById("SMILED").style.display = "none";
   document.getElementById("STARTIMES").style.display = "none";
   document.getElementById("SMILER").style.display = "none";
 }
 
 if (bills.value == "GOTV"){
   document.getElementById("GOTV").style.display = "block";
   document.getElementById("DSTV").style.display = "none";
   document.getElementById("SMILED").style.display = "none";
   document.getElementById("STARTIMES").style.display = "none";
   document.getElementById("SMILER").style.display = "none";
 }
 if (bills.value == "STARTIMES"){
   document.getElementById("STARTIMES").style.display = "block";
   document.getElementById("DSTV").style.display = "none";
   document.getElementById("GOTV").style.display = "none";
   document.getElementById("SMILED").style.display = "none";
   document.getElementById("SMILER").style.display = "none";
 }
 if (bills.value == "SMILED"){
   document.getElementById("SMILED").style.display = "block";
   document.getElementById("DSTV").style.display = "none";
   document.getElementById("GOTV").style.display = "none";
   document.getElementById("STARTIMES").style.display = "none";
   document.getElementById("SMILER").style.display = "none";
 }
 if (bills.value == "SMILER"){
   document.getElementById("SMILER").style.display = "block";
   document.getElementById("SMILED").style.display = "none";
   document.getElementById("DSTV").style.display = "none";
   document.getElementById("STARTIMES").style.display = "none";
   document.getElementById("GOTV").style.display = "none";
   
 }
  }






  //fund wallet
  function validate(){
   if(document.paywallet.amount.value >= 100 && document.paywallet.amount.value <= 2450){
     return true;
   }else  {
           alert( "Minimum amount is #100 and maximum is #2450" );
           document.paywallet.amount.focus() ;
           return false;
        }
  }

//withdraw
  function validateWithdraw(){
   if(document.withdraw.amount.value >= 500){
     return true;
   }else  {
           alert( "Minimum amount is #500" );
           document.withdraw.amount.focus() ;
           return false;
        }
  }   

  //vtu
  function validateVtu(){
   if(document.vtu.amount.value >= 50){
     return true;
   }else  {
           alert( "Minimum amount is #50" );
           document.vtu.amount.focus() ;
           return false;
        }
  }

 
 //edu section
  var edu = document.getElementById("eduselect");
  function eduSlct(){
   if (edu.value == ""){
   document.getElementById("neco").style.display = "none";
 }
 if (edu.value == "waec"){
   document.getElementById("neco").style.display = "none";
 }
 if (edu.value == "neco"){
   document.getElementById("neco").style.display = "block";
 }
}
//WAEC
var eduplan = document.getElementById("eduplan");
  function eduPlan(){
   if (eduplan.value == ""){
document.getElementById("hideEdu").innerHTML =
  "";
}
   if (eduplan.value == "WRCONE"){
document.getElementById("hideEdu").innerHTML =
  "<input type='hidden' value='750' name='price' /> <input type='hidden' value='800' name='uprice'  /> ";
}
if (eduplan.value == "WRCTWO"){
document.getElementById("hideEdu").innerHTML =
  "<input type='hidden' value='1500' name='price' /> <input type='hidden' value='1600' name='uprice'  /> ";
}
if (eduplan.value == "WRCTHR"){
document.getElementById("hideEdu").innerHTML =
  "<input type='hidden' value='2250' name='price' /> <input type='hidden' value='2335' name='uprice'  /> ";
}
if (eduplan.value == "WRCFOU"){
document.getElementById("hideEdu").innerHTML =
  "<input type='hidden' value='3000' name='price' /> <input type='hidden' value='3100' name='uprice'  /> ";
}
if (eduplan.value == "WRCFIV"){
document.getElementById("hideEdu").innerHTML =
  "<input type='hidden' value='3750' name='price' /> <input type='hidden' value='3900' name='uprice'  /> ";
}
  }
  //NECO
   var necoplan = document.getElementById("necoplan");
  function necoPlan(){
   if (necoplan.value == ""){
document.getElementById("hideNec").innerHTML =
  "";
}
   if (necoplan.value == "NECONE"){
document.getElementById("hideNec").innerHTML =
  "<input type='hidden' value='650' name='price' /> <input type='hidden' value='700' name='uprice' /> ";
}
if (necoplan.value == "NECTWO"){
document.getElementById("hideNec").innerHTML =
  "<input type='hidden' value='1300' name='price' /> <input type='hidden' value='1360' name='uprice' /> ";
}
if (necoplan.value == "NECTHR"){
document.getElementById("hideNec").innerHTML =
  "<input type='hidden' value='1950' name='price' /> <input type='hidden' value='2040' name='uprice' /> ";
}
if (necoplan.value == "NECFOU"){
document.getElementById("hideNec").innerHTML =
  "<input type='hidden' value='2600' name='price' /> <input type='hidden' value='2695' name='uprice' /> ";
}
if (necoplan.value == "NECFIV"){
document.getElementById("hideNec").innerHTML =
  "<input type='hidden' value='3250' name='price' /> <input type='hidden' value='3350' name='uprice' /> ";
}
  }

  //transfer
   var transplan = document.getElementById("trans_method");
  function transferCheck(){
   if (transplan.value == ""){
document.getElementById("CTW").style.display = "none";
   document.getElementById("WTW").style.display = "none";
}
if (transplan.value == "comtowal"){
document.getElementById("CTW").style.display = "block";
   document.getElementById("WTW").style.display = "none";
}
if (transplan.value == "waltowal"){
document.getElementById("CTW").style.display = "none";
   document.getElementById("WTW").style.display = "block";
}
}

//fund method
   var fundplan = document.getElementById("fund_method");
  function fundCheck(){
   if (fundplan.value == ""){
document.getElementById("CARD").style.display = "none";
   document.getElementById("COUPON").style.display = "none";
}
if (fundplan.value == "paycard"){
document.getElementById("CARD").style.display = "block";
   document.getElementById("COUPON").style.display = "none";
}
if (fundplan.value == "paycoupon"){
document.getElementById("CARD").style.display = "none";
   document.getElementById("COUPON").style.display = "block";
}
}