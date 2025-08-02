<?php
include("../Includes/db.php");
include("../Functions/functions.php");
//session_start();
$sessphonenumber = $_SESSION['phonenumber'];
$sql = "select * from registration where agent_phone = '$sessphonenumber' ";
$run_query = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($run_query)) {
    $name = $row['agent_name'];
    $phone = $row['agent_phone'];
    $address = $row['agent_address'];
    $state = $row['agent_state'];
    $district = $row['agent_district'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agent Profile</title>

    <style>
        h1 {
            background-color: transparent;
            text-align: center;
            cursor: pointer;
            /* font-size:20px; */
        }

        textarea {
            font-size: 20px;
            border-radius: 0;
            text-align: center;

            background-color: transparent;
            margin-top: 10px;
        }

        .box {
            color: rgb(6, 36, 7);
            width: 450px;
            line-height: 40px;
            margin: auto;
            text-align: center;
            margin-top: 50px;
            padding: 5px;
            border-style: outset;
            /* border-width: 5px;
            border-radius: 16px; */

            /* font-size:20px; */
        }

        body {
            /* background-image: url(Images/Website/agentLogin.jpg); */
            /* background: black; */
            /* background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-color: white;
            background-image: url(../Images/Website/forgotpassword.jpg); */
            border: chartreuse;
        }

        form {
            margin: 10px;
            padding: 10px;
            background-color: rgb(247, 248, 247);
        }

        input {
            padding: 7px;
            margin: 10px;
            display: inline-block;
            /* border-radius: 16px; */
        }

        input[type="submit"] {
            cursor: pointer;
            font-size: 22px;
            font-weight: bold;
            color: rgb(246, 248, 246);
            border: none;
            background-color: green;
            /* display: inline-block; */
            width: 64%;
        }

        input[type="submit"]:hover {
            color: rgb(155, 248, 4);
            border-radius: 0;
            border-style: outset;
            border-color: rgb(155, 248, 4);
            font-weight: bolder;
            font-size: 18px;
        }

        .one {
            height: 100px;
            border-radius: 0;

        }

        .two {
            width: 100px;
            font-size: 34px;
            background: transparent;
            border: 3px;

            border-style: solid;
            border-width: 2px;


        }

        .just {

            float: left;
            margin-left: 1%;
            margin: 20px;
            position: absolute;
            left: 0;
            top: 0px;
            text-shadow: 1px 1px 1px black;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <header>
        <div id="title"><img src="https://www.freeiconspng.com/thumbs/pizza-icon/pizza-icon-18.png" width="100px"
                alt="">
            <span>Alpha calls</span>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="orders_taken.php">Orders Taken</a></li>
                <li>
                    <a href="agentProfile.php" id="profile">
                        <?php getAgentUsername(); ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container-fluid" style="max-width:520px">
        <form action="EditProfile.php" method="post">
            <table align="center">
                <tr colspan=2>
                    <h1> Agent's PROFILE</h1>
                </tr>
                <tr align="center">
                    <td><label><b>Name :</b></label></td>
                    <td>
                        <!-- <textarea rows="2" column="10" disabled> <?php echo $name ?> </textarea> -->
                        <input type="text" readonly class="form-control-plaintext border border-dark" id="staticEmail"
                            value="<?php echo $name ?>">
                        <br>
                    </td>
                </tr>
                <tr align="center">
                    <td><label><b>Phone Number :</b></label></td>
                    <td><textarea rows="2" column="10" disabled> <?php echo $phone ?> </textarea><br></td>
                </tr>
                <tr align="center">
                    <td><label><b>Address :</b></label></td>
                    <td><textarea rows="3" column="56" disabled> <?php echo $address ?> </textarea><br></td>
                </tr>

                <tr align="center">
                    <td><label><b>State :</b></label></td>
                    <td><textarea rows="3" column="56" disabled> <?php echo $state ?> </textarea><br></td>
                </tr>
                <tr align="center">
                    <td><label><b>District :</b></label></td>
                    <td><textarea rows="3" column="56" disabled> <?php echo $district ?> </textarea><br></td>
                </tr>

                <td colspan=2><input type="submit" name="editProf" value="Edit Profile"></td>
                </tr>
            </table>



        </form>

    </div>

</body>

</html>