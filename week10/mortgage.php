<!DOCTYPE html>

<html lang = "en">
<head>
    <meta charset = "utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Calculator </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="mortgage.js"></script>
</head>
<body>
   <h1> Mortgage Calculator</h1>
   <div>
      <div>
         <?php print "APR: " . $_GET["apr"]; ?>
         <br>
         <?php print "Term: " . $_GET["term"]; ?>
         <br>
         <?php print "Amount: " . $_GET["amount"]; ?>
         <br>
         <?php
         $apr = $_GET["apr"];
         $term = $_GET["term"];
         $amount = $_GET["amount"];

         $interest = $apr / 100 / 12;
         $payments = $term * 12;
         $x = pow(1 + $interest, $payments);
         $monthly = ($amount * $x * $interest) / ($x - 1);

         printf("Payments: %.2f",$monthly); 
         ?>
      </div>
   </div>

</body>
</html>