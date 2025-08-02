<?php
include ("../Functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menu.css">
    <title>Orders Taken</title>
</head>
<style>
    th {
        text-align: center;
        padding: 10px;
    }

    td {
        text-align: center;
        padding: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    #odMain {
        padding-left: 50px;
        padding-right: 50px;
    }

    .customer-tile {
        padding: 20px;
        padding-bottom: 50px;
        padding-left: 50px;
        background-color: rgba(250, 250, 250, 0.4);
        box-shadow: black 2px 2px 7px;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .sdIcon {
        background-color: rgba(255, 255, 255, 0.4);
        box-shadow: black 2px 2px 7px;
        width: 20%;
        height: 350px;
    }

    .innerTile {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    .sdIconTop {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        height: 75%;
    }

    .sdIconTop img {
        padding: 0px;
        margin: 0px;
        height: 60%;
        border-radius: 50%;
    }

    .sdIconBottom {
        padding: 0px;
        margin: 0px;
        height: 25%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    .sdIconBottom span {
        padding-bottom: 10px;
    }
</style>

<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;">
    <header>

        <nav>
            <ul>
                <li><img src="../templates/pizza-icon.png" width="100px" alt="">
                </li>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="orders_taken.php">Orders Taken</a></li>
                <li>
                    <a href="#" id="profile">
                        <?php getAgentUsername(); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div style=" text-align: center; padding: 10px;">
        <h1>ORDERS TAKEN</h1>
    </div>
    <main id="odMain">
        <?php

        // Your database connection details
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "impulse102";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $customers = $conn->query("SELECT DISTINCT customer_name FROM transactions");

        while ($customer = $customers->fetch_assoc()) {
            echo '<div class="customer-tile" id="customer-' . strtolower($customer['customer_name']) . '">';
            echo '<div class="customer-name"> <h3>CUSTOMER: ' . ucfirst($customer['customer_name']) . '</h3></div>';
            echo '<div class="innerTile">';
            $transactions = $conn->query("SELECT * FROM transactions WHERE customer_name = '" . $customer['customer_name'] . "'");
            while ($transaction = $transactions->fetch_assoc()) {
                $date = new DateTime($transaction['transaction_date']);
                $formattedDate = $date->format('d-m-Y');
                echo '<div class="sdIcon">';
                echo '<div class="sdIconTop">';
                echo '<img src="../templates/person.png" alt="">';
                # echo '<img src="https://png.pngtree.com/png-clipart/20230805/original/pngtree-vector-icon-of-a-rounded-call-center-design-in-ecofriendly-green-color-vector-picture-image_9728681.png" alt="">';
                echo '</div>';
                echo '<div class="sdIconBottom">';
                echo '<span><label for="sdName"><b>Agent Name: </b></label> <span id="sdName">' . ucfirst($transaction['agent_name']) . '</span></span>';
                echo '<span><label for="sdDate"><b>Date: </b></label> <span id="sdDate">' . $formattedDate . '</span></span>';
                echo '<span><label for="sdItems"><b>Items: </b></label> <span id="sdItems">' . $transaction['items'] . '</span></span>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '<br>';
        }

        $conn->close();

        ?>
    </main>
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

</body>

</html>