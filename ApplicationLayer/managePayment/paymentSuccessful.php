<?php
require_once '../../BusinessLayer/controller/managePaymentController.php';


session_start();


$notification1 = new managePaymentController();


//clear cust cart
$notification1->updateCart();

?>
<html>
    <head>
        <title>Payment Success</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            body 
            {
                text-align: center;
                margin-top: 20%;
                justify-content: center;
                align-items: center;
                height: 100%;
                margin: 0;
                display: flex;
                background-image: url("image/logo.jpg");
            }
            p.solid 
            {   
                border-style: solid;
            }
            div 
            {
                background-color: lightgrey;
                width: 300px;
                border: 15px solid green;
                padding: 50px;
                margin: 20px;
                
            }
            .border-box {
            width: 300px;
            height: 300px;
            border: 2px solid black;
        }
 
        </style>
    </head>


<body>
<div class= "border-box">    
<h1>Payment Success!</h1>
    <script>
    function showPopup() {
      alert("Payment successful! Thank you for your purchase.");
    }
  </script>
    <br><br><br>
    <h3>Click OK<h3>
    <!--<button class="btn btn-primary"><a href="../../ApplicationLayer/manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>" style="color: white;">OK</a></button> -->
<!-- Payment form -->
<form action="customerHomePage.php" method="post">
    <!-- Form fields and submit button go here -->
    <!-- After successful payment, call the showPopup() function -->
    <input type="submit" value="To HomePage" style="color:darkgreen;" onclick="showPopup()">
  </form>
</div>
</body>

</html>




