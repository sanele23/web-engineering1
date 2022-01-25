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
          <?php
            if ($_GET["confirm"])
            {
              echo "Order Confirmed";
            }
            else
            {
              echo "Order Canceled";
            }
          ?>   
      </h1>
   </div>

</body>
</html>