<!DOCTYPE html>

<html lang = "en">
<head>
    <meta charset = "utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Order Confirmation </title>
    
</head>
<body>

   <div class="div" style="border-style: solid; border-radius: 25px;
    min-width: 380px; margin-left: 25%; margin-right: 25%;">
      <h1 style="text-align: center;">
            Order Review   
      </h1>
      <div class="format2">
         <div>
           Name: 
           <br>
           <?php 
               echo $_GET["first_name"] . " " . $_GET["last_name"];
           ?>
           <br>
           <br>

           Address:
           <br> 
           <?php
               echo $_GET["address"]; 
           ?>
           <br>
           <br>

           Phone:
           <br>
           <?php
               echo $_GET["phone"];
           ?>
           <br>
           <br>

           Card Type:
           <br>
           <?php
               echo $_GET["type"]
           ?>
           <br>
           <br>

           Card Exp:
           <br>
           <?php
           
               $exp = $_GET["exp_date"];
               
           ?>

           <br>
           <br>
         </div>
         <div>
            Order:
            <br>
            <?php
            for ($i = 0; $i < $_GET["item"].length; $i++) 
            { 
               if ($_GET["item"] == "450.00")
               {
                  print "iPhone X: " . $_GET["item"] . "<br>";
               }
               else if ($_GET["item"] == "55.20")
               {
                  print "Kettle: " . $_GET["item"] . "<br>";
               }
               else if ($_GET["item"] == "12.99")
               {
                  print "Blanket: " . $_GET["item"] . "<br>";
               }
               else if ($_GET["item"] == "499.00")
               {
                  print "Xbox: " . $_GET["item"] . "<br>";
               }
               
            }
            ?>

            <br>
            <br>
            Total:
            <br>
            <?php
                echo "$" . $_GET["total"];
            ?>

            <form action="assign11_a.php">
              <input type="submit" name="confirm" value="Confirm Order">
              <input type="submit" name="cancel" value="Cancel Order">
            </form>
         </div>
      </div>
   </div>

</body>
</html>