<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            padding: 50px;
            background-color: gray;
            overflow: hidden;
        }

        img {
            position: absolute;
            left: 0px;
            width: 100%;
            height: 782px;
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
            left: 74px;
            color: white;
            top: -17px;
            /* top: 10px; */
        }

        label {
            font-size: 20px;

        }

        .bx bxs-user {
            position: absolute;
            left: 65px;
            top: 135px;
            font-size: 25px;
        }

        i {
            position: absolute;
            left: 57px;
            top: 135px;
            font-size: 25px;
        }

        #mail {
            position: absolute;
            left: 4px;
            top: 60px;
            font-size: 25px;
        }

        #pass {
            position: absolute;
            left: 4px;
            top: 115px;
            font-size: 25px;
        }

        #pass1 {
            position: absolute;
            left: 4px;
            top: 173px;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <img src="back1.jpg" alt="">
    <div class="container">

        <?php
        if (isset($_POST["submit"])) {
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
            // $errors = array();
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Email is not valid')</script>";
            }
            if (strlen($password) < 8) {
                echo "<script>alert('Password must contain atleast 8')</script>";
            }
            if ($password !== $passwordRepeat) {
                echo "<script>alert('Password does not match')</script>";
            } else {

                //Where "filename.php" is the path to the file you want to include. You can use both relative and absolute paths.
        
                require_once "database.php";

                $sql = "INSERT INTO signup (fullname, email, password) VALUES (?, ?, ?)";

                //The function mysqli_stmt_init() requires a MySQLi database connection object ($conn) as its parameter. This connection object ($conn) should have been previously established using mysqli_connect() or mysqli_init().
        
                $stmt = mysqli_stmt_init($conn);

                //The first parameter is a MySQLi statement object ($stmt), which represents a prepared statement initialized previously using mysqli_stmt_init().
                //The second parameter ($sql) is a string containing the SQL query that you want to prepare.
                //f the preparation of the statement is successful, mysqli_stmt_prepare() returns true, indicating that the statement is ready for execution.
        
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);

                if ($preparestmt) {

                    //They allow you to separate SQL code from user-provided data by using placeholders (e.g., ? or named parameters), which are later bound to specific values using mysqli_stmt_bind_param().
        
                    mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password);
                    mysqli_stmt_execute($stmt);
                    header("Location: login.php");
                    echo "<div class='alert alert-success'>You are registered successfully!!</div>";
                } else {
                    echo "<script>alert('something went wrong')</script>";
                }

            }
        }

        ?>
        <h1>Registration</h1>


        <form action="registration.php" method="post">
            <div class="form-froup">
                <input type="text" class="form-control" name="fullname" required placeholder="full name"
                    id="first_input">
                <span><i class='bx bxs-user'></i></span>

            </div>
            <div class="form-froup">
                <input type="email" class="form-control" name="email" required placeholder="email" id="first_input">
                <span id="mail"><i class='bx bxs-envelope'></i></i></span>
            </div>
            <div class="form-froup">
                <input type="text" class="form-control" name="password" required placeholder="password"
                    id="first_input">
                <span id="pass"><i class='bx bxs-lock-alt'></i></span>
            </div>
            <div class="form-froup">
                <input type="text" class="form-control" name="repeat_password" required placeholder="repeat password"
                    id="first_input">
                <span id="pass1"><i class='bx bxs-lock-alt'></i></span>
            </div>
            <div class="form-froup">
                <input type="submit" class="btn" value="register" name="submit">
            </div>
        </form>

    </div>

</body>

</html>