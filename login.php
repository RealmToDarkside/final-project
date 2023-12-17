<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: homepage.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <h2>Login</h2>
        <div class="form-group">
            <input type="text" placeholder="Enter Username:" name="username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div class="redirect">
        <p>
            Not registered yet <a href="registration.php">Register Here</a>
        </p>
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
        background-color: #fff;
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
        clip-path: polygon( 120% 0, 50% 0, 100% 100%, 0% 100%);
        border-radius: 3px;
    } *
    .container{
        width: 20%;
        background: #6b0908;
        height: auto;
        padding: 10px 20px;
        box-shadow: 0 0 10px #fff;
        border-radius: 3px;
        z-index: 1;
    }
    .container::after{
        height: 383px;
        width: 315px;
        content: "";
        position: absolute;
        inset: 0;
        top: 120px;
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
        font-size: 50px;
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
