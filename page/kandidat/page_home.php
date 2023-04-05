<?php
@$check = $_SESSION['status_login'];
@$check_1 = $_SESSION["is_users"];
@$check_2 = $_SESSION['is_admin'];
if($check == false) {
    ?><script>window.location='index.php?page=kandidat&hal=login'</script><?php
} else if($check_1 == true) {
    ?><script>window.location='index.php?page=kandidat&hal=login'</script><?php
} else if($check_2 == true) {
    ?><script>window.location='index.php?page=kandidat&hal=login'</script><?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="overflow: hidden;">
    
    <div class="dashboard">
        <?php $cek = mysqli_query($conn, "SELECT * FROM kandidat WHERE userid = '". $_SESSION['userid'] ."'");
        while($tampil = mysqli_fetch_array($cek)) { ?> 
            <img src="./assets/kandidat/img/<?= $tampil["gambar"] ?>" style="center">
            <br><br>
            <h5 style="color: white;"><?= $tampil["ketua"] ?></h5>
            <h5 style="color: white;"><?= $tampil["wakil"] ?></h5>
        <?php } ?>

        <a href="./index.php?page=kandidat&hal=logout" class="button-logout">Log Out</a>
    </div>
    <div class="pesan-scroll">        
        <?php $cek = mysqli_query($conn, "SELECT * FROM vote WHERE kandidat_id = '". $_SESSION['userid'] ."'");
            while($tampil = mysqli_fetch_array($cek)) { ?> 
            <div class="card" style="min-height: 4rem; max-width: 60rem; margin: 10px">
            <div class="card-body">
                <h6 class="card-title" style="margin-top: -10px">Saran</h6>
                <p class="card-text" style="margin-top: -10px; margin-bottom: -10px"><?= $tampil['pesan'] ?></p>
            </div>
            </div>
        <?php } ?>
    </div>
    
</body>
</html>