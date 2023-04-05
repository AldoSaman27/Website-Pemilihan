<?php 
error_reporting(0);
session_start();
include './db.php'; 

@$user = $_SESSION['userid'];
@$is_vote = $_SESSION['a_global']->is_vote;
@$is_kandidat = $_SESSION['is_kandidat'];
@$is_admin = $_SESSION['is_admin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 3 GORONTALO</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="shortcut icon" href="./img/smkn3.png" type="image/x-icon">

    <script src="https://kit.fontawesome.com/6246318d22.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img src="./assets/img/smkn3.png">
        <h1 class="judul"><b>SMK NEGERI 3 GORONTALO</b></h1>
        <div class="hamburger"><i class="fa-solid fa-bars"></i></div>
        <h1 class="username"><?= $user; ?>&nbsp;</h1><i class="fa-solid fa-user"></i>
        <div class="menu">
            <a href="?page=home"><b>Home</b></a>
            <a href="?page=login"><b>Login</b></a>
            <a href="?page=vote"><b>Vote</b></a>
        </div>
        
    </header>

    <nav>
        <ul>
            <h1 class="username"><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;<?= $user; ?></h1>
            <li><a href="?page=home#header">Home</a></li>
            <li><a href="?page=login">Login</a></li>
            <li><a href="?page=vote">Vote</a></li>

            <?php if($is_kandidat == true) { ?>
                <li><a href="?page=kandidat&hal=logout">Log Out</a></li>
            <?php } ?>

            <?php if($is_admin == true) { ?>
                <h3>Admin Menu</h3>
                <li><a href="./index.php?page=admin&hal=home">Home</a></li>
                <li><a href="./index.php?page=admin&hal=tambah_kandidat">Tambah Kandidat</a></li>
                <li><a href="./index.php?page=admin&hal=hapus_kandidat">Hapus Kandidat</a></li>
                <li><a href="./index.php?page=admin&hal=edit_kandidat">Edit Kandidat</a></li>
                <li><a href="./index.php?page=admin&hal=logout">Log Out</a></li>
            <?php } ?>
        </ul>
    </nav>
    
    <script src="./app.js"></script>

<?php
    @$page = $_GET['page'];
    if(!empty($page)) {
        switch($page) {
            case 'login':
                include "page/page_login.php";
                break;

            case 'vote':
                include "page/page_vote.php";
                break;    

            case 'home':
                include "page/page_home.php";
                break;

            case 'kandidat':
                include "page/page_kandidat.php";
                break;

            case 'admin':
                include "page/page_admin.php";
                break;
        }
    } 
    else include "page/page_home.php";
?>
</body>
</html>