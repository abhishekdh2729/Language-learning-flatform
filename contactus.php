<?php
if (isset($_POST["submit"])) 
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $number = $_POST["mobile"];
    $feedback = $_POST["message"];

    require_once "database.php";

    $sql = "INSERT INTO feedback (fname,lname,email,mobile,message) VALUES (?,?,?,?,?)";

    $stmt = mysqli_stmt_init($conn);

    $preparestmt = mysqli_stmt_prepare($stmt, $sql);

    if ($preparestmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $number, $feedback);
        mysqli_stmt_execute($stmt);
        header("Location: contactus.php");
        exit();
    } else {
        die("something went wrong");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            background: linear-gradient(90deg, #0e3959 0%, #0e3959 30%, #03a9f5 30%, #03a9f5 10%);
        }

        .contactus {
            position: relative;
            width: 100%;
            padding: 40px 100px;
        }

        .contactus .title {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2em;
        }

        .contactus .title h2 {
            color: white;
            font-weight: 500;
        }

        .box {
            position: relative;
        }

        .form {
            grid-area: form;
        }

        .info {
            grid-area: info;
        }

        .map {
            grid-area: map;
        }

        .contact {
            padding: 40px;
            background: white;
            box-shadow: 0 5px 35px rgba(0, 0, 0, 0.15);
        }

        .box {
            position: relative;
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-rows: 5fr 4fr;
            grid-template-areas: "form info" "form map";
            grid-gap: 20px;
            margin-top: 20px;
        }

        .formBox {
            position: relative;
            width: 100%;
        }

        .formBox .row50 {
            display: flex;
            gap: 20px;

        }

        .inputBox {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            width: 50%;
        }

        .formBox .row100 .inputBox {
            width: 100%;

        }

        .inputBox span {
            color: #18b7ff;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: 500;

        }

        .inputBox input {
            padding: 10px;
            font-size: 1.1em;
            outline: none;
            border: 1px solid #333;
        }

        .inputBox textarea {
            padding: 10px;
            font-size: 1.1em;
            outline: none;
            border: 1px solid #333;
            resize: none;
            min-height: 220px;
            margin-bottom: 10px;

        }

        .inputBox input[type="submit"] {
            background: #ce285c;
            color: #fff;
            border: none;
            font-size: 1.1em;
            max-width: 120px;
            font-weight: 500;
            cursor: pointer;
            padding: 14px 15px;
        }

        .inputBox input[type="submit"]:hover {
            background-color: #cd5c80;
        }

        .inputBox ::placeholder {
            color: #999;
        }

        .info {
            background: #0e3959;
        }

        .info h3 {
            color: #fff;

        }

        .info .infoBox div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .info .infoBox div span {
            min-width: 40px;
            height: 40px;
            color: #fff;
            background: #18b7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5em;
            border-radius: 50%;
            margin-right: 15px;

        }

        .info .infoBox div p {
            color: white;
            font-size: 1.1em;
        }

        .info .infoBox div a {
            color: white;
            text-decoration: none;
            font-size: 1.1em;

        }

        .sci {
            margin-top: 40px;
            display: flex;

        }

        .sci li {
            margin-right: 15px;
            list-style: none;

        }

        .sci li a {
            color: white;
            font-size: 2em;
            color: #ccc;

        }

        .sci li a:hover {
            color: #fff;
        }

        .map {
            padding: 0;
        }

        .map iframe {
            width: 100%;
            height: 100%;
        }

        @media (max-width:991px) {
            body {
                background: #03a9f5;
            }

            .contactus {
                padding: 20px;
            }

            .box {
                grid-template-columns: 1fr;
                grid-template-rows: auto;
                grid-template-areas: "form" "info" "map";
            }

            .map {
                min-height: 300px;
            }

            .formBox .row50 {
                display: flex;
                gap: 0;
                flex-direction: column;
            }

            .inputBox {
                width: 100%;
            }

            .contact {
                padding: 30px;
            }

            .map {
                min-height: 300px;
                padding: 0px;
            }
        }
    </style>
</head>

<body>
    <div class="contactus">
        <div class="title">
            <h2>Contact Us</h2>
        </div>
        <div class="box">
            <div class="contact form">
                <h3>Send a Message</h3>
                <form method="post">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>First Name</span>
                                <input name="fname" type="text" placeholder="ex:john">
                            </div>
                            <div class="inputBox">
                                <span>Last Name</span>
                                <input name="lname" type="text" placeholder="ex:doe">
                            </div>
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                <span>Email</span>
                                <input type="text" name="email" placeholder="ex:johndoe@gamil.com">
                            </div>
                            <div class="inputBox">
                                <span>Mobile</span>
                                <input type="text" name="mobile" placeholder="ex:+91 720 469 8411">
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <span>Message</span>
                                <textarea name="message" placeholder="Write Your Message Here..."></textarea>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="submit" name="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact info">
                <h3>Contact Info</h3>
                <div class="infoBox">
                    <div>
                        <span><ion-icon name="location"></ion-icon></span>
                        <p>DBIT, Kumbalgodu, Bangalore <br>India</p>
                    </div>
                    <div>
                        <span><ion-icon name="mail"></ion-icon></span>
                        <a href="mailto:abhishekdhiremath121@gmail.com">abhishekdhiremath121@gmail.com</a>
                    </div>
                    <div>
                        <span><ion-icon name="call"></ion-icon></span>
                        <a href="tel:+917204698411">+91 720 469 8411</a>
                    </div>
                </div>
                <div>
                    <ul class="sci">
                        <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
                        <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    </ul>
                </div>
            </div>
            <div class="contact map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.392663803942!2d77.44171837496673!3d12.882453787424764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae15754055b99f%3A0xb10a8dc810207db8!2sDon%20Bosco%20Institute%20Of%20Technology!5e0!3m2!1sen!2sin!4v1701412822320!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
