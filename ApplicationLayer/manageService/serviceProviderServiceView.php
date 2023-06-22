<?php
    require_once '../../BusinessLayer/controller/manageServiceController.php';
    require_once '../../BusinessLayer/controller/manageTrackingController.php';

    session_start();

    $item = new manageServiceController();
    $data = $item->viewAll();

    if(isset($_POST['delete'])){
        $item->delete();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Service View</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
                td {
                    text-align: center;
                }

                .logout {
                position: fixed;
                right: 0;
                margin-right: 5px;
                margin-top: 5px;
                }

                .gotonotification {
                    position: fixed;
                    right: 125px;
                    bottom: 15px;
                    border-radius: 50%;
                }

                .gotoreport {
                    position: fixed;
                    right: 25px;
                    bottom: 15px;
                    border-radius: 50%;
                }
            </style>
    </head>
    <body>
        <div class="container">
            <h3 class="heading">Service Provider Listing</h3>

            <div class="add-service">
                <p>Do you want to add a new service?</p>
                <a href="./serviceProviderServiceAdd.php?spID=<?=$_SESSION['spID']?>" class="btn btn-primary">Add Here</a>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Unit Price (RM)</th>
                        <th>Service Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $row){ ?>
                        <tr>
                            <td><img src="<?=$row['itemimage']?>" alt="Item Image" class="item-image"></td>
                            <td><?=$row['itemname']?></td>
                            <td><?=$row['itemprice']?></td>
                            <td><?=$row['servicetype']?></td>
                            <td>
                                <button type="button" onclick="location.href='./serviceProviderServiceUpdate.php?serviceID=<?=$row['serviceID']?>'" class="btn btn-secondary"><i class="fa fa-pencil-square" aria-hidden="true"></i></button>
                                <form action="" method="POST" onsubmit="return confirm('Are you sure to delete?');">
                                    <input type="hidden" name="serviceID" value="<?=$row['serviceID']?>">
                                    <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="notification-icon">
                <a href="../../ApplicationLayer/manageTracking/serviceProviderNotification.php?spID=<?=$_SESSION['spID']?>"><img src="Image/serviceprovidernotificationno.png" alt="Notification Icon" class="icon"></a>
            </div>
            <div class="report-icon">
                <a href="../../ApplicationLayer/manageTracking/serviceProviderSales.php?spID=<?=$_SESSION['spID']?>"><img src="Image/reporticon.png" alt="Report Icon" class="icon"></a>
            </div>
        </div>
    </body>
</html>