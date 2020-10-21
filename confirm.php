<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="customer.css" type="text/css" rel="stylesheet"> -->
        <link href="confirm.css" type="text/css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <?php
                $link = mysqli_connect("127.0.0.1", "root", "Shreya/1997niki", "bank");
                
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }                

                $from = $_GET['from'];
                $to = mysqli_real_escape_string($link, $_REQUEST['to']);
                $amount = mysqli_real_escape_string($link, $_REQUEST['amount']);
                
                $add = "INSERT INTO trans (transfer_from, transfer_to, amount) VALUES ('$from', '$to', '$amount')";

                $update1 = "UPDATE customers SET current_balance = current_balance+$amount WHERE cust_id=$to";
                $update2 = "UPDATE customers SET current_balance = current_balance-$amount WHERE cust_id=$from";

                if(mysqli_query($link, $add) && mysqli_query($link, $update1) && mysqli_query($link, $update2)){
                    echo "Transaction successful";
                } else{                    
                    echo "ERROR: Execution failed . " . mysqli_error($link);
                }
                
                mysqli_close($link);
            ?>

        </div>

        <p><a href="customer.php">Display all customers</a> </p>
    </body>
</html>

