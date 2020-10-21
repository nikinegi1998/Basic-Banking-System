
<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="detail.css" type="text/css" rel="stylesheet">
        
    </head>

    <body>
        

        <h1>DETAILS OF THE CUSTOMER</h1>
        <nav class="nav-bar">
            <ul>
                <p><a href="index.html">Home </a>
                &gt;<a href="customer.php"> Customers </a>
                &gt; Details</p>
            </ul>
        </nav>


        <div class="details">            
            <?php            

            $hostname = "127.0.0.1";
            $user = "root";
            $pass = "Shreya/1997niki";
            $db = "bank";

            $conn = mysqli_connect($hostname, $user, $pass, $db);
                
                // session_start();
            if(!$conn){
                die("Connection failed");
                echo mysqli_error($conn);
            }
            
            $var = $_GET['cid'];
            $result =  mysqli_query($conn,"SELECT * FROM customers where cust_id=$var");

            
                echo "<table class='table'>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Phone No.</th>
                    <th>Occupation</th>
                    <th>D.O.B.</th>
                    <th>Current Balance</th>
                    <th>Email</th>           
                </tr>";       
                
                // $row = mysqli_fetch_row($result);
            // while($row = mysqli_fetch_row($result)){
                while($row = mysqli_fetch_array($result))
                {
                    echo "<td>" . $row['cust_id'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['occupation'] . "</td>";
                    echo "<td>" . $row['dob'] . "</td>";
                    echo "<td>" . $row['current_balance'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
            }
            
                // }
                echo "</table>";

                mysqli_close($conn);

                echo "<a href='transaction.php?cid=$var'><button>Make a Transaction</button></a>";
        ?>

        

        
        </div>

    </body>
</html>

