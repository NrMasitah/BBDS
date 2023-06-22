<?php
    require_once '../../BusinessLayer/controller/manageServiceController.php';

    session_start();


    $serviceID = $_GET['serviceID'];
    $item = new manageServiceController();
    $data = $item->viewItem($serviceID);

    if(isset($_POST['update'])){
        $item->update();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Service Provider Service Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
    <script>
        var loadFile = function(event){
            var image = document.getElementById('imageOut');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function() {
            $('form[name="myForm"]').submit(function(e) {
                e.preventDefault();

                // Perform any additional validation or processing here before showing the alert

                // Show the success alert
                $('.alert-success').fadeIn();

                // Hide the success alert after 3 seconds
                setTimeout(function() {
                    $('.alert-success').fadeOut();
                }, 3000);
            });
        });
    </script>
</head>
<body>
    <div class="topnav">
        <a href="./serviceProviderHomePage.php"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 120%; padding-right: 5px;">Homepage</label></a>
        <div class="topnav-right">
            <a href="./serviceProviderProfile.php"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
        </div>
    </div>
    <center>
        <h3 class="heading">Service Provider Service Update</h3>
        <br><br>
        <form name="myForm" action="" method="POST" enctype="multipart/form-data" class="service-form">
            <div class="form-container">
                <?php foreach($data as $row){ ?>
                    <div class="form-group">
                        <label for="servicetype">Service Type:</label>
                        <select id="servicetype" name="servicetype" class="form-control">
                            <option value="" selected></option>
                            <option value="Good">Good</option>
                            <option value="Food">Food</option>
                            <option value="Pet">Pet</option>
                            <option value="Medical">Medical</option>
                        </select>
                        <div class="note">*Refill</div>
                    </div>
                    <div class="form-group">
                        <label for="itemname">Item Name:</label>
                        <input type="text" name="itemname" value="<?=$row['itemname']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="itemprice">Unit Price (RM):</label>
                        <input type="text" name="itemprice" value="<?=$row['itemprice']?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="itemimage">Item Image:</label>
                        <img src="<?=$row['itemimage']?>" width="95px" height="95px" alt="Item Image" class="item-image">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Update Service</button>
                    </div>
                <?php } ?>
            </div>
        </form>
        <!-- Alert message for successful update -->
        <div class="alert alert-success" style="display: none;">
            Chosen service updated successfully!
        </div>
    </center>
</body>
</html>