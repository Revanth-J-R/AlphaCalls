<?php
include ("../Functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://cdn.pixabay.com/photo/2012/04/12/20/43/pizza-30579_1280.png" type="image/x-icon">
    <link rel="stylesheet" href="menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Menu</title>


</head>

<body>
    <!-- Header Section -->
    <header>
        <nav>
            <ul>
                <li><img src="../templates/pizza-icon.png" width="100px" alt="">
                </li>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="orders_taken.php">Orders Taken</a></li>
                <li>
                    <a href="#" id="profile">
                        <?php getAgentUsername(); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="tab">
        <div>
            CUSTOMER: <?php getCustomername(); ?> <a class="anchorButton" href="createCustomer.php">+</a>
        </div>
        <div class="search-container">
            <form method="get" action="menu.php">
                <input type="text" name="searchValue" id="searchValue" class="search-input" placeholder="Search">
                <button type="submit" class="search-button">
                    <img src="../templates/search.jpg" id="search-icon" alt="">
                </button>
            </form>
        </div>
    </div>

    <div class="main-container">
        <div class="container">
            <?php
            $searchVal = "";
            include ("../Includes/db.php");
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET["searchValue"])) {
                    $searchVal = $_GET["searchValue"];
                }
            }
            getPizza($searchVal);
            ?>
        </div>
        <div class="cart">
            <h2>Cart</h2>
            <table id="cartTable">
                <thead>
                    <tr>
                        <th>Item No.</th>
                        <th>Item Name</th>
                        <th>Size</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody id="cart-items">
                </tbody>
            </table>
            <form id="myForm" method="post">
                <p>Total: ₹<span id="cart-total">0.00</span>
                    <input type="hidden" name="cart-total" id="hiddenSpanValue" value="">
                </p>
                <button type="submit" id="sendButton" name="submit">Submit</button>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Process the form data
                    if (isset($_POST['cart-total'])) {
                        $spanValue = $_POST['cart-total'];
                    }
                }
                // Your database connection details
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "impulse102";

                // Check if the form is submitted
                if (isset($_POST['submit'])) {
                    // Your PHP code here
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Get the values from the POST request
                    $date = date("Y-m-d");
                    $customerName = $_SESSION['currCust'];
                    $amount = $spanValue;

                    // Insert data into the table
                
                    $sql = "INSERT INTO ordersTaken (date, customer_name, amount) VALUES ('$date', '$customerName', '$amount')";
                    if ($conn->query($sql) === False) {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    // Close the connection
                    $conn->close();
                }
                ?>
            </form>

            <!-- INSERT INTO transactions (agent_name, customer_name, items, transaction_date) 
            VALUES (<?php getAgentUsername(); ?>, customer_name, '2034,2045,2034', date); -->


            <!--
            <div class="payment-details">
                <div class="separator"></div>
                <h3>Payment</h3>
                <div class="payment-buttons">
                    <button id="cod">Cash On Delivery</button>
                    <button id="hidden-pay">Online</button>
                </div>

                 <form id="online">
                    <div id="paymail">
                        <label for="pml" name="email-id">Email:</label>
                        <input type="email" id="pml">
                    </div>
                    <button type="submit" id="pay">Send Link</button>
                </form>
                <div id="confirmationMessage"></div> -->
        </div>
    </div>
    </div>



    <footer>
        <div class="row">
            <a href="#"><img src="../templates/contact.png" width="50px"><br>Contact us</a>
            <a href="#"><img src="../templates/service.png" width="50px"><br>Our Services</a>
            <a href="#"><img src="../templates/privacy.png" width="50px"><br>Privacy Policy</a>
            <a href="#"><img src="../templates/terms.png" width="50px"><br>Terms & Conditions</a>
        </div>
        <br>

        <div class="row">
            Made By ALPHA
        </div>
    </footer>
    <script>
        document.getElementById('sendButton').addEventListener('click', function () {
            const spanValue = document.getElementById('cart-total').innerText;
            document.getElementById('hiddenSpanValue').value = spanValue;
        });
    </script>
    <script src="menu.js">
    </script>
</body>

</html>