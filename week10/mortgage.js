function checkErrors() 
{
   var apr = document.getElementById("apr").value;
   var term = document.getElementById("term").value;
   var amount = document.getElementById("amount").value;

   apr = parseFloat(apr);
   term = parseFloat(term);
   amount = parseFloat(amount);

   if (apr < 0 || apr > 25) 
   {
      displayErrors(1);
      return false;
   }  
   if (term < 0 || term > 40)
   {
      displayErrors(2);
      return false;
   }
   if (!amount)
   {
      displayErrors(3);
      return false;
   }
   else
   {
      return true;
   }
}
function displayErrors(mistake)
{
   if (mistake == 1) 
   {
      alert("ERROR: Please enter an APR value between 0 and 25");
   }
   else if (mistake == 2) 
   {
      alert("ERROR: Please enter a term between 0 and 40 years");
   }
   else 
   {
      alert("ERROR: Please enter a valid amount");
   }
}
function calculatePayment(apr, term, amount)
{
   var principal = amount;
   var interest = apr / 100 / 12;
   var payments = term * 12;
     
   // compute the monthly payment figure
   var x = Math.pow(1 + interest, payments);
   var monthly = (principal * x * interest)/(x-1);
   monthly = monthly.toFixed(2);
   
   document.getElementById("payment").value = "$" + monthly;
}