<?php

session_start();

include ("../Includes/db.php");

function getPizza($searchVal = "")
{
    include ("../Includes/db.php");
    global $con;
    $query = "select * from pizza where `Pizza Name` like '%$searchVal%'";
    $run_query = mysqli_query($con, $query);
    $count = 0;
    if ($run_query) {
        while ($row = mysqli_fetch_assoc($run_query)) {
            $count = $count + 1;
            $pizzaName = $row['Pizza Name'];
            $image = $row['Image URL'];
            $priceS = $row['Small'];
            $priceM = $row['Medium'];
            $priceL = $row['Large'];
            $delTime = $row['Delivery Time'];
            $avail = $row['Availability'];
            $pizzaId = $row['product_id'];

            if ($avail == 1) {
                $availStatus = 'Available';
            } else {
                $availStatus = 'Not Available';
            }

            echo "<div class='card'>
                    <div class='pimg'>
                        <img class='pizza-image'
                            src='$image'
                            alt='$pizzaName'>
                    </div>
                <div class='pizza-details'>
                    <h2 class='pizza-name'>$pizzaName</h2>
                    <div class='separator'></div>
                    <div class='cost-time'>
                        <span class='cost'>₹$priceS / ₹$priceM / ₹$priceL</span>
                        <span class='delivery-time'>
                            <img class='clock-icon' src='../templates/clock-icon.png' alt='Clock Icon'>$delTime m
                        </span>
                    </div>
                    <div class='availability-status'>
                        <span class='availability'>$availStatus</span>
                        <button class='cart-button'>
                            <span id='s' class='cart-icon' data-pizza-name='$pizzaName' data-pizza-id='$pizzaId' data-pizza-price='$priceS'
                            data-pizza-size='S'>S</span>
                            <span id='m' class='cart-icon' data-pizza-name='$pizzaName' data-pizza-id='$pizzaId' data-pizza-price='$priceM'
                            data-pizza-size='M'>M</span>
                            <span id='l' class='cart-icon' data-pizza-name='$pizzaName' data-pizza-id='$pizzaId' data-pizza-price='$priceL'
                            data-pizza-size='L'>L</span>
                        </button>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo "<br><br><hr><h1 align = center>Pizza Details Need To Be Updated !</h1><br><br><hr>";
    }
}



function getUsername()
{
    if (isset($_SESSION['phonenumber'])) {
        $phonenumber = $_SESSION['phonenumber'];
        global $con;

        $query = "select * from buyerregistration where buyer_phone = $phonenumber";
        $run_query = mysqli_query($con, $query);
        if ($run_query) {
            while ($row_cat = mysqli_fetch_array($run_query)) {
                $buyer_name = $row_cat['buyer_name'];
                $buyer_name = 'Hello ,' . $buyer_name;
            }

            // echo @"<label>$buyer_name</label>";
            echo @"<div class='text-success  logins mx-1 ml-5  '>$buyer_name</div>";
        }
    } else {
        echo "<a href = '../auth/BuyerLogin.php'><div class='text-success logins mx-5'>Login</div></a>";
        // echo "<label><a href = '../auth/BuyerLogin.php' style = 'color:white' >Login/Sign up</a></label>";
    }
}


function getAgentUsername()
{
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        $agent_name = "AGENT " . strtoupper($name);
        echo "$agent_name";
    } else {
        echo "<label><a href = '../auth/Login.php' style = 'color:white; padding-top:20px;' >Login/Sign up</a></label>";
    }

}

function getCustomername()
{
    if (isset($_SESSION['currCust'])) {
        $custName = $_SESSION['currCust'];
        echo strtoupper($custName);
    } else {
        echo "<label>Error in loading customer name</label>";
    }
}

function CheckoutIdentify()
{
    if (isset($_SESSION['phonenumber'])) {
        echo "<script>window.open('CartPage.php','_self')</script>";
    } else {
        echo "<script>window.open('../auth/BuyerLogin.php','_self')</script>";
    }
}


function getCrops()
{

    global $con;

    $query = "select * from products where product_cat = 1 order by RAND() LIMIT 0,10";

    $run_query = mysqli_query($con, $query);

    while ($row_cat = mysqli_fetch_array($run_query)) {
        $product_type = $row_cat['product_type'];
        echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
    }
}

function getFruits()
{

    global $con;

    $query = "select * from products where product_cat = 3 order by RAND() LIMIT 0,10";

    $run_query = mysqli_query($con, $query);

    while ($row_cat = mysqli_fetch_array($run_query)) {
        $product_type = $row_cat['product_type'];
        // echo "<li class='options' role='presentation'><a role='menuitem' tabindex='-1' href='../BuyerPortal/Categories.php?type=$product_type'> 
        //         <label class='crop_items'>$product_type</label></a></li>";

        echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
    }
}

function getVegetables()
{

    global $con;

    $query = "select * from products where product_cat = 2 order by RAND() LIMIT 0,10";

    $run_query = mysqli_query($con, $query);

    while ($row_cat = mysqli_fetch_array($run_query)) {
        $product_type = $row_cat['product_type'];
        echo "<a class='dropdown-item' href='../BuyerPortal2/Categories.php?type=$product_type'>$product_type</a>";
    }
}

// Checkout System Functions
function cart()
{
    if (isset($_SESSION['phonenumber'])) {
        if (isset($_GET['add_cart'])) {

            global $con;
            if (isset($_POST['quantity'])) {
                $qty = $_POST['quantity'];
            } else {
                $qty = 1;
            }
            $sess_phone_number = $_SESSION['phonenumber'];
            $product_id = $_GET['add_cart'];

            // $check_pro = "select * from cart where product_id='$product_id' ";
            $check_pro = "select * from cart; ";

            $run_check = mysqli_query($con, $check_pro);

            if (mysqli_num_rows($run_check) > 0) {
                echo "";
            } else {
                $insert_pro = "insert into cart (product_id,phonenumber) values ('$product_id','$sess_phone_number')";
                $run_insert_pro = mysqli_query($con, $insert_pro);
            }

            echo "<script>window.open('bhome.php','_self')</script>";
        }
    } else {
        // echo "<script>alert('Please Login First! ');</script>";
    }
}



function totalItems()
{
    global $con;
    if (isset($_SESSION['phonenumber'])) {
        $sess_phone_number = $_SESSION['phonenumber'];

        $get_items = "select * from cart where phonenumber = '$sess_phone_number'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
        return $count_items;
    } else {
        echo 0;
    }
}


function emptyCart()
{
    global $con;
    $sess_phone_number = $_SESSION['phonenumber'];

    $get_items = "Delete from cart where phonenumber = '$sess_phone_number'";
    $run_items = mysqli_query($con, $get_items);
    $count_items = mysqli_num_rows($run_items);
}


function bestSeller()
{
    global $con;
}
?>
