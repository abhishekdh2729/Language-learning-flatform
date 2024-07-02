<?PHP
session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            padding: 50px;
            background-color: gray;
            /* overflow: hidden; */
        }

        img {
            position: absolute;
            left: 0px;
            width: 100%;
            height: 735px;
            top: 0px;
        }

        .container {
            max-width: 324px;
            position: relative;
            margin: 0 auto;
            padding: 50px;
            background-color: transparent;
            left: 4px;
            top: 100px;
            transition: box-shadow 0.3s;
            border-radius: 17px;
        }

        .container:hover {

            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .form-froup {
            margin-bottom: 23px;

        }

        .form-control {
            font-size: 20px;
            width: 300px;
            padding: 5px;
            align-items: center;
            justify-content: center;
        }

        .btn {
            text-decoration: none;
            padding: 10px;
            color: white;
            background-color: #0085a3;
            font-size: 19px;
            top: 17px;
            position: relative;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 314px;
        }

        input {
            border-radius: 30px;
            border: 1px solid white;
            text-align: center;
        }

        #first_input:hover {
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }

        textarea {
            border: 2px solid black;
            font-size: 19px;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #025a6e;
            ;
        }

        h1 {
            position: relative;
            left: 104px;
            color: white;
            font-weight: 900px;
            top: -21px;

        }

        label {
            font-size: 20px;

        }

        #mail {
            position: absolute;
            left: 60px;
            top: 133px;
            font-size: 25px;
        }
        

        #pass {
            position: absolute;
            left: 61px;
            top: 192px;
            font-size: 25px;
        }
    </style>

</head>

<body>
    <img src="back1.jpg" alt="">
    <div class="container">

        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once("database.php");
            $sql = "SELECT * FROM signup WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if ($password == $user["password"]) {
                    $_SESSION['emailid']=$email;
                    header("Location: home_page.html");
                    die();
                } else {
                    echo "<script>alert('Incorrect Password')</script>";
                }

            } else {
                echo "<script>alert('Incorrect email')</script>";
            }
        }


        ?>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="form-froup">
                <input type="text" placeholder="Enter email" name="email" class="form-control" id="first_input">
                <span id="mail"><i class='bx bxs-envelope'></i></i></span>
            </div>
            <div class="form-froup">
                <input type="text" placeholder="Enter password" name="password" class="form-control" id="first_input">
                <span id="pass"><i class='bx bxs-lock-alt'></i></span>
            </div>
            <div class="form-ftn">
                <input type="submit" value="login" name="login" class="btn">
            </div>

        </form>
    </div>

</body>

</html>