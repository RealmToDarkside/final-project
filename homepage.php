<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="homepage.css">
  <script src="script.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Profile</title>
</head>
<body>
  <nav>
    <ul>
        <li>
            <a href="g" class="logo">
                <img src="" alt="">
                <span class="nav-item">Code info</span>
            </a>
        </li>
        <li><a href="#">
            <i class='bx bxs-home-alt-2'></i>
            <span class="nav-item">Home</span>
        </a></li>
        <li><a href="profile.html"  class="profile" onclick="myprofile()">
            <i class='bx bxs-face'></i>
            <span class="nav-item">Priofile</span>
        </a></li>
        <li><a href="vendingmachine.html">
            <i class='bx bxs-hard-hat' ></i>
            <span class="nav-item">VendingMachine</span>
        </a></li>
        <li><a href="#">
            <i class='bx bx-cog' ></i>
            <span class="nav-item">Settings</span>
        </a></li>
        <li><a href="#">
            <i class='bx bx-task' ></i>
            <span class="nav-item">Task</span>
        </a></li>
        <li><a href="#">
            <i class='bx bxs-help-circle' ></i>
            <span class="nav-item">Help</span>
        </a></li>
        
        <li><a href="#" class="logout" onclick="logout()">
            <i class='bx bxs-log-in-circle' ></i>
            <span class="nav-item">logout</span>
        </a></li>
        
    </ul>
  </nav>
</body>
</html>
