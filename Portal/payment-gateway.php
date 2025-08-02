<!DOCTYPE html>
<html lang="en">

<head>

    <!-- <link rel="stylesheet" href="style.css" class="css" /> -->
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        font-weight: bold;
        background-color: rgb(204, 0, 0);
    }

    .container {
        height: 800px;
        width: 400px;
        background-image: linear-gradient(#1e6b30, #308d46);
        top: 55%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        border-bottom-left-radius: 180px;
        border-top-right-radius: 150px;
    }

    .main-content {
        height: 150px;
        background-color: #1b9236;
        border-bottom-left-radius: 90px;
        border-bottom-right-radius: 80px;
        border-top: #1e6b30;
    }

    .text {
        text-align: center;
        font-size: 300%;
        text-decoration: aliceblue;
        color: aliceblue;
    }


    .centre-content {
        height: 100px;
        margin: -70px 30px 20px;
        color: aliceblue;
        text-align: center;
        font-size: 20px;
        border-radius: 25px;
        padding-top: 0.5px;
        background-image: linear-gradient(#1e6b30, #308d46);
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .centre-content-h1 {
        padding-top: 30px;
        padding-bottom: 30px;
        font-weight: normal;
    }

    .modes {
        display: flex;
        flex-direction: column;
    }

    .mode {
        font-size: 15px;
        cursor: pointer;
        color: #fff;
        height: 50px;
        width: 80%;
        border: none;
        margin: 5px 30px;
        background-color: #47b13d;
        padding-left: 20px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }

    .mt {
        width: 40%;
        display: flex;
        align-items: center;
    }

    .mim {
        width: 60%;
        height: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mim img {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 21%;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .mode:hover {
        margin-left: 35px;
        background-color: #1e6b30;
        transition: 1s;
    }

    .card-details,
    .mob-wal {
        background: rgb(8, 49, 14);
        color: rgb(225, 223, 233);
        margin: 10px 30px;
        padding: 10px;
        display: none;
    }

    .int-bnk {
        background: rgb(8, 49, 14);
        color: rgb(225, 223, 233);
        margin: 10px 30px;
        padding: 10px;
        display: flex;
        flex-direction: column;
    }


    .info {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        height: 20px;
        align-items: center;
        padding-bottom: 20px;
    }

    .card-details p,
    .mob-wal p,
    .int-bnk p {
        font-size: 21px;
        padding-bottom: 20px;
    }

    .card-details label {
        font-size: 15px;
        line-height: 35px;
    }

    .mode:active {
        background-color: rgb(71, 177, 61);
    }

    .submit-now-btn {
        cursor: pointer;
        color: #fff;
        height: 30px;
        width: 240px;
        border: none;
        margin: 5px 30px;
        background-color: rgb(71, 177, 61);
    }

    .cancel-btn {
        position: fixed;
        bottom: 70px;
        right: 0px;
        text-align: center;
        cursor: pointer;
        color: #fff;
        height: 40px;
        width: 240px;
        border: none;
        margin: 5px 30px;
        background-color: rgb(162, 162, 162);
    }

    .cancel-btn:hover {
        background-color: grey;
    }

    #a {
        background-color: #1b9236;
        width: 81%;
        height: 58px;
        margin-left: 28px;
    }
</style>

<body>
    <div class="container">
        <div class="main-content">
            <p class="text">Payment</p>
        </div>
        <div class="centre-content">
            <h2 class="price" id="price">
                <?php
                $cartTotal = isset($_GET['cartTotal']) ? $_GET['cartTotal'] : '0.00';
                echo '₹' . htmlspecialchars($cartTotal);
                ?>

                /-
            </h2>
        </div>
        <div class="modes">
            <button type="button" class="mode" onclick="ib()" id="a">
                Internet Banking
            </button>
            <button type="button" class="mode" onclick="cd()" id="b">
                <div class="mt">
                    Credit / Debit Card
                </div>
                <div class="mim">
                    <img src="https://images.indianexpress.com/2023/06/1200px-Rupay-Logo.png" alt="rupay">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/022/101/123/small_2x/visa-logo-transparent-free-png.png"
                        alt="visa">
                </div>
            </button>
            <button type="button" class="mode" onclick="mw()" id="c">
                <div class="mt">
                    Mobile Wallets
                </div>
                <div class="mim">
                    <img src="https://i.pinimg.com/originals/60/5a/bd/605abdb7af3405c6b20a426b1e128322.png" alt="gpay">
                    <img src="https://static.vecteezy.com/system/resources/previews/022/100/711/original/paytm-logo-transparent-free-png.png"
                        alt="paytm">
                </div>
            </button>
        </div>

        <form action="payment-done.php" class="int-bnk" id="hiddenib">
            <p>Internet Banking</p>
            <div class="info">
                <label> User ID </label>
                <input type="text">
            </div>
            <div class="info">
                <label>Password</label>
                <input type="password">
            </div>
            <button type="submit" class="submit-now-btn">
                submit
            </button>
        </form>
        <form action="payment-done.php" class="mob-wal" id="hiddenmw">
            <p>Mobile Wallets</p>
            <div class="info">
                <label> Mobile Number </label>
                <input type="number" min="1000000000" max="9999999999" />
            </div>
            <button type="submit" class="submit-now-btn">
                submit
            </button>
        </form>

        <form action="payment-done.php" class="card-details" id="hiddencd">
            <p>Credit / Debit card</p>
            <div class="info">
                <label> Card Number </label>
                <input type="text" placeholder="###-###-###" />
            </div>
            <div class="info">
                <label> Expiry Date </label>
                <input type="date" class="date-number-field" placeholder="DD-MM-YY" />
            </div>
            <div class="info">
                <label> CVV number </label>
                <input type="number" max="999" class="cvv-number-field" placeholder="xxx" />
            </div>
            <div class="info">
                <label> Card Holder name </label>
                <input type="text" class="card-name-field" placeholder="Enter your Name" />
            </div>
            <button type="submit" class="submit-now-btn">
                submit
            </button>
        </form>
        <button id="cancel" class="cancel-btn"><a href="menu.php" style="text-decoration: none; color: white;">Cancel
                Payment</a></button>
    </div>
</body>
<script>
    function cd() {
        var cdcon = document.getElementById("hiddencd");
        var mwcon = document.getElementById("hiddenmw");
        var ibcon = document.getElementById("hiddenib");
        if (cdcon.style.display === "none") {
            mwcon.style.display = "none";
            ibcon.style.display = "none";
            document.getElementById("a").style.backgroundColor = "#47b13d";
            document.getElementById("c").style.backgroundColor = "#47b13d";
            document.getElementById("b").style.backgroundColor = "#1b9236";
            document.getElementById("b").style.width = "81%";
            document.getElementById("b").style.height = "58px";
            document.getElementById("b").style.marginLeft = "28px";
            document.getElementById("a").style.marginLeft = "30px";
            document.getElementById("c").style.marginLeft = "30px";
            cdcon.style.display = "flex";
            cdcon.style.flexDirection = "column";
        } else {
            cdcon.style.display = "none";
        }
    }
    function mw() {
        var cdcon = document.getElementById("hiddencd");
        var mwcon = document.getElementById("hiddenmw");
        var ibcon = document.getElementById("hiddenib");
        if (mwcon.style.display === "none") {
            cdcon.style.display = "none";
            ibcon.style.display = "none";
            document.getElementById("a").style.backgroundColor = "#47b13d";
            document.getElementById("b").style.backgroundColor = "#47b13d";
            document.getElementById("c").style.backgroundColor = "#1b9236";
            document.getElementById("c").style.width = "81%";
            document.getElementById("c").style.height = "58px";
            document.getElementById("c").style.marginLeft = "28px";
            document.getElementById("a").style.marginLeft = "30px";
            document.getElementById("b").style.marginLeft = "30px";
            mwcon.style.display = "flex";
            mwcon.style.flexDirection = "column";
        } else {
            mwcon.style.display = "none";
        }
    }
    function ib() {
        var cdcon = document.getElementById("hiddencd");
        var mwcon = document.getElementById("hiddenmw");
        var ibcon = document.getElementById("hiddenib");
        if (ibcon.style.display === "none") {
            mwcon.style.display = "none";
            cdcon.style.display = "none";
            document.getElementById("b").style.backgroundColor = "#47b13d";
            document.getElementById("c").style.backgroundColor = "#47b13d";
            document.getElementById("a").style.backgroundColor = "#1b9236";
            document.getElementById("a").style.width = "81%";
            document.getElementById("a").style.height = "58px";
            document.getElementById("a").style.marginLeft = "28px";
            document.getElementById("b").style.marginLeft = "30px";
            document.getElementById("c").style.marginLeft = "30px";
            ibcon.style.display = "flex";
            ibcon.style.flexDirection = "column";
        } else {
            ibcon.style.display = "none";
        }
    }
</script>


</html>