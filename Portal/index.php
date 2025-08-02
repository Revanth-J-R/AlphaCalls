<?php
include ("../Functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="https://cdn.pixabay.com/photo/2012/04/12/20/43/pizza-30579_1280.png" type="image/x-icon">
    <script src="script.js"></script>
    <link rel="stylesheet" href="icons/icon.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Edu+TAS+Beginner:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@600&display=swap" rel="stylesheet">
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpha</title>
</head>

<body>
    <!-- Header Section -->
    <header>
        <div id="title"><img src="https://www.freeiconspng.com/thumbs/pizza-icon/pizza-icon-18.png" width="100px"
                alt="">
            <span>ALPHA CALLS</span>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="createCustomer.php">Menu</a></li>
                <li><a href="orders_taken.php">Orders Taken</a></li>
                <li>
                    <a href="agentProfile.php" id="profile">
                        <?php getAgentUsername(); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <nav id="homeNav">
        <ul>
            <li><a href="#ofr">Offers</a></li>
            <li><a href="#exp">Explore</a></li>
            <li><a href="#ftr">About Us</a></li>
        </ul>
    </nav>
    <span class="container">
        <p class="typed"> The Belly Rules The Mind!! </p>
    </span>
    <main>
        <!--image slider start-->
        <div class="slider">
            <div class="slides">
                <!--radio buttons start-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!--radio buttons end-->
                <!--slide images start-->
                <div class="slide first">
                    <img src="../templates/img_4.jpg" width="500px" alt="">
                </div>
                <div class=" slide">
                    <img src=" ../templates/img_3.jpg" width="500px" alt="">
                </div>
                <div class=" slide">
                    <img src="../templates/img_2.jpg" width="500px" alt="">
                </div>
                <div class=" slide">
                    <img src="../templates/img_1.jpg" width="500px" alt="">
                </div>
                <!--slide images end-->
                <!--automatic navigation start-->
                <div class=" navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
                <!--automatic navigation end-->
            </div>
            <!--manual navigation start-->
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
            <!--manual navigation end-->
        </div>
        <!--image slider end-->


        <script type="text/javascript">
            var counter = 1;
            setInterval(function () {
                document.getElementById('radio' + counter).checked = true;
                counter++;
                if (counter > 4) {
                    counter = 1;
                }
            }, 5000);
        </script>
        <span>
        </span>
    </main>

    <div class="coupon" id="ofr">
        <h3>Coupons <span class=brandy>&</span> Offers</h3>
        <div class="space"></div>
        <div>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/amazon_home_20210412.jpg" width="250px">
            </span>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/Home_Paytm_20210519.jpg" width="250px">
            </span>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/Home_airtel_30082020.jpg" width="250px">
            </span>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/Home_Freecharge_20210405.jpg" width=250px">
            </span>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/Dominos_Mobi_Home_20210503.jpg" width=250px">
            </span>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/Home_payzapp_20201029.jpg" width=250px">
            </span>
            <span>
                <img src="https://api.dominos.co.in/prod-olo-api/images/Home_au_20201029.jpg" width=250px">
            </span>
            <span>
                <img src="https://www.shopickr.com/wp-content/uploads/2019/09/Combo_offers_20180225-555x250.png"
                    width=250px">
            </span>
        </div>
    </div>
    <div class="explore" id="exp">
        <h3>Explore</h3>
        <div>
            <span class="bordi">
                <img src="https://cdn-icons-png.flaticon.com/512/151/151409.png" width="100px" height="">
            </span>
            <span class="bordi">
                <img src="https://cdn1.iconfinder.com/data/icons/shopping-408/64/46-512.png" width="100px" height="">
            </span>
            <span class="bordi">
                <img src="https://cdn-icons-png.flaticon.com/512/4693/4693608.png" width="100px" height="">
            </span>
            <span class="bordi">
                <img src="https://cdn-icons-png.flaticon.com/512/151/151409.png" width="100px" height="">
            </span>
        </div>
    </div>
    <footer id="ftr">
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