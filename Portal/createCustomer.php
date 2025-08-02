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

<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        justify-items: center;
    }


    #cctab form {
        font-family: sans-serif;
        height: 200px;
        margin-left: 35%;
        margin-right: 35%;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        text-align: center;
        background-color: rgba(255, 78, 58, 0.2);
        margin-top: 50px;
        border-radius: 10px;
        padding: 50px;
    }

    #cctab input {
        border-radius: 5px;
        border: 1px solid black;
    }

    #custname {
        margin-left: 20%;
        margin-right: 20%;
        font-size: 20px;
    }

    #sub {
        margin-left: 30%;
        margin-right: 30%;
        font-size: 20px;
    }
</style>

<body>
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

    <div id="cctab">
        <form action="createCustomer.php" method="post">
            <h2>ADD A CUSTOMER</h2><input type="text" id="custname" name="inputValue">
            <input id="sub" type="submit" value="submit" name="subName">
        </form>
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
    <!-- <script src="menu.js"> -->
    </script>
</body>

</html>

<?php
if (isset($_POST['subName'])) {
    $custName = mysqli_real_escape_string($con, $_POST['inputValue']);
    $_SESSION['currCust'] = $custName;
    echo "<script>window.open('../Portal/menu.php','_self')</script>";
}
?>