

<!DOCTYPE html>
<html>
    <head>
        <title>Customers</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="customer.css" type="text/css" rel="stylesheet">
        
    </head>

    <body>
        <h1>
            CUSTOMERS
        </h1>       
            
        <nav class="nav-bar">
            <p>
                <a href="index.php"> Home</a>
                &gt; Customers
</p>
        </nav>

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

        
        $result = mysqli_query($conn,"SELECT * FROM customers");
        
        echo "<table class='table'>
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>            
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
            // ?datatype=". $row['cust_id' ]."
            echo "<td><a href='detail.php?cid=$row[cust_id]'>" . $row['cust_id'] . "</a></td>";
            // echo $id;
            
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['lname'] . "</td>";
            
            echo "</tr>";
        }
        echo "</table>";

        
         mysqli_close($conn);

        echo "</div>";
        ?>
    </body>
</html>