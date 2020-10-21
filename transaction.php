<!DOCTYPE html>
<html>
    <head>
        <title>Transaction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="customer.css" type="text/css" rel="stylesheet"> -->
        <link href="transaction.css" type="text/css" rel="stylesheet">
        <!-- <script src="main.js"></script> -->
        <!-- <link href="main.js" type="text/javascript"> -->
    </head>

    <body>

        <h1>TRANSACTION</h1>
                
        <?php

            echo "<div class='container'>";
            $hostname = "127.0.0.1";
            $user = "root";
            $pass = "Shreya/1997niki";
            $db = "bank";

            $conn = mysqli_connect($hostname, $user, $pass, $db);

            if(!$conn){
                die("Connection failed");
                echo mysqli_error($conn);
            }


            $new_var = $_GET['cid'];
            $result = mysqli_query($conn,"SELECT * FROM customers where cust_id not in ('$new_var')");

            echo "<table>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>            
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
                // ?datatype=". $row['cust_id' ]."
                echo "<td>" . $row['cust_id'] . "</td>";
                // echo $id;                
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                
                echo "</tr>";
            }
            echo "</table>";

            // mysqli_close($conn);

            echo "</div>";
            ?>

        
        <div class="form">
            <?php
                echo "<form action='confirm.php?from=$new_var' method='POST'>";
            ?>
                <input type="number" name="amount" placeholder="Enter the amount"><br>
                <input type="number" name="to" placeholder="Enter the customer id"><br>
                <button name="submit">Submit</button>
            
            <?php
                echo "</form>";
            ?>

        </div>

    </body>
</html>
