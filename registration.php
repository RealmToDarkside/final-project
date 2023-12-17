<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: merge3.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullname = $_POST["fullname"];
           $username = $_POST["username"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullname) OR empty($username) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
        
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE username = '$username'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Username already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, username, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullname, $username,  $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
            <h2>REGISTRATION</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username:"
                autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
    <div class="cog1">
        <img src="cog.png" alt="">
    </div>
    <div class="cog2">
        <img src="cog.png" alt="">
    </div>
</body>
<style>
    *{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body{
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        overflow: hidden;
    }
    * body::after{
        height: 100%;
        width: 100%;
        content: "";
        position: absolute;
        inset: 0;
        background-color: cyan   ;
        z-index: -1;
        clip-path: polygon( 100% 0, 100% 0, 100% 100%, 0% 100%);
        border-radius: 3px;
        animation-name: bodyAnimated;
        animation-duration: 2s;
        animation-iteration-count: 999;
    } *
    .container{
        width: 20%;
        background: #6b0908;
        height: auto;
        padding: 10px 20px;
        box-shadow: 0 0 10px #000;
        border-radius: 3px;
        z-index: 1;
    }
    .container::after{
        height: 443px;
        width: 315px;
        content: "";
        position: absolute;
        inset: 0;
        top: 90px;
        left: 533px;
        background-color: #d17947   ;
        z-index: -1;
        clip-path: polygon( 60% 0, 100% 0, 100% 100%, 0% 100%);
        border-radius: 3px;
    }
    form{
        width: 100%;
        display: flex;
        flex-direction: column;
        text-align: center;
    }
    h2{
        font-size: 30px;
        color: #fff;
        letter-spacing: 5px;
        text-shadow: 0 0 10px #fff;
        mix-blend-mode: difference;
    }
    p{
        color: #fff;
        text-align: center;
    }
    a{
        color: #fff;
        text-decoration: none;
    }
    .form-group{
        height: 40px;
        width: 100%;
        margin-bottom: 20px;
    }
    input{
        height: 40px;
        width: 100%;
        outline: none;
        border: none;
        border-radius: 3px;
        transition: all 0.3s;
    }
    input:hover{
        box-shadow: 0 0 10px #fff;
    }
    .cog1{
        position: absolute;
        right: 405px;
        animation-name: cog1;
        animation-duration: 5s;
        rotate: 0deg;
        animation-iteration-count: 999;
        transition: all linear;
    }
    .cog2{
        position: absolute;
        scale: 1.5;
        right: 705px;
        animation-name: cog2;
        animation-duration: 10s;
        rotate: 0deg;
        animation-iteration-count: 999;
        transition: all linear;
    }

    @keyframes cog1{
        0%{
            rotate: 360deg;
        }
        20%{
            rotate: 15deg;
        }
        40%{
            rotate: 30deg;
        }
        60%{
            rotate: 45deg;
        }
        80%{
            rotate: 60deg;
        }
        100%{
            rotate: 75deg;
        }
    }
    @keyframes cog2{
        0%{
            rotate: 360deg;
        }
        20%{
            rotate: 15deg;
        }
        40%{
            rotate: 30deg;
        }
        60%{
            rotate: 45deg;
        }
        80%{
            rotate: 60deg;
        }
        100%{
            rotate: 75deg;
        }
    }

</style>
</html>
