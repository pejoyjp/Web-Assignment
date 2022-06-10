<?php
/*session_start();
*/?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="./css/profile.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/qrcode.js"></script>
    <script type="text/javascript" src="profile.php?action=test"></script>
    <script type="text/javascript">

    </script>

</head>
<body>
<div class="header">
    <img class="logo" src="images/logo.png">
    <a href="mailto:p.jin3@nuigalway.ie" class="email"><i class="fa-solid fa-envelope-circle-check"></i> GAP@nuigalway.ie </a>
    <span class="phone"><i class="fa-solid fa-phone"></i>091 855 899</span>

    <button type="button" class="donate"><a href="https://www.idonate.ie/280_galway-autism-partnership-gap.html">
            <i class="fa-solid fa-circle-dollar-to-slot"></i>
            Donate to GAP </a>
    </button>


    <button type="button" class="volunteer">
        <a href="#">
            <i class="fa-solid fa-handshake-angle"></i>
            Volunteer with GAP</a>
    </button>

</div>

<div class="navi-bar">


    <div class="nav">
        <ul>
            <li>
                <a href="index.html">Home</a>
                <ol>
                    <li> <a href="#">Covid-19 </a> </li>
                </ol>
            </li>

            <li>
                <a href="index.html">About GAP</a>
                <ol>

                    <li> <a href="#">About Us </a></li>


                    <li><a href="#">History</a></li>


                    <li><a href="#">Mission&Vision</a></li>


                    <li><a href="#">Policies</a></li>

                    <li><a href="#">Friends Of Gap</a></li>

                </ol>
            </li>

            <li>
                <a href="events.html">What We Do</a>

            </li>

            <li>
                <a href="#">What We Are</a>
                <ol>
                    <li><a href="events.html">Event&Club </a></li>
                </ol>
            </li>

            <li>
                <a href="login.html">Membership Log</a>
            </li>

            <li>
                <a href="#">Contact Us</a>
            </li>

        </ul>
    </div>
</div>


<div class="container">
    <div class="profile-section">
        <h1>Profile</h1>
        <br>


        <ul class="detail">
            <li>Name: <input value="<?php echo $_SESSION['userName']?>" type="text"  readonly="readonly" class="box"></li>
            <li>Date Of Birth: <input type="text" value="<?php echo $_SESSION['dob']?>"  readonly="readonly" class="box"></li>
            <li>Gender: <input type="text" value="<?php echo $_SESSION['userGender']?>" readonly="readonly" class="box"> </li>
            <li>Contact: <input type="text" value="<?php echo $_SESSION['contact']?>" readonly="readonly" class="box"></li>
            <li>Email: <input type="text" value="<?php echo $_SESSION['userEmail']?>" readonly="readonly" class="box"></li>
        </ul>

        <div id="profile">
            <img src="images/jin.png">
        </div>

        <div id="qr">



            <input id="text" type="text" value="https://hogangnono.com"/><br />
            <div id="qrcode"></div>
            <script type="text/javascript">

                var qrcode = new QRCode("qrcode");
                var url = window.location.href;

                function makeCode () {
                    var elText = document.getElementById("text");

                    if (!elText.value) {
                        alert("Input a text");
                        elText.focus();
                        return;
                    }

                    qrcode.makeCode(elText.value);
                }

                makeCode();

                $("#text").
                on("blur", function () {
                    makeCode();
                }).
                on("keydown", function (e) {
                    if (e.keyCode == 13) {
                        makeCode();
                    }
                });
            </script>

        </div>


    </div>

</div>


<div class="bottom">
            <span><i class="fa-solid fa-phone"></i>
                Phone Monday to Friday (10 AM – 5 PM): 091588899</span>
    <a href="#"><span><i class="fa-solid fa-envelope-circle-check"></i>
                Email: coordinator@galwayautismpartnership.com</span>
    </a>
    <span><i class="fa-solid fa-location-dot"></i>
                Tigh Ronain, 36 Laurel Park, Newcastle, Galway</span>
    <a href="#">
            <span><i class="fa-solid fa-person-circle-minus"></i>
                Click to read our GDPR & Privacy Policy</span>
    </a>
    <p>
        © 2020 Galway Autism Partnership | CHY 20210
    </p>

    <p>
        Galway Autism Partnership Have Formally Committed To Comply With The Statements Of Guiding Principles
    </p>

    <p>
        For Fundraising |
    </p>
    <p>
        Website By Group GAP
    </p>
</div>

</body>
</html>
