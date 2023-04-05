<?php
@$check = $_SESSION['status_login'];
@$check_1 = $_SESSION["is_users"];
@$check_2 = $_SESSION["is_kandidat"];
if($check == false) {
    ?><script>window.location='index.php?page=admin&hal=login'</script><?php
} else if ($check_1 == true) {
    ?><script>window.location='index.php?page=admin&hal=login'</script><?php
} else if ($check_2 == true) {
    ?><script>window.location='index.php?page=admin&hal=login'</script><?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/admin/page_admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="dashboard">
        <ul>
            <li><a href="./index.php?page=admin&hal=home">Home</a></li>
            <li><a href="./index.php?page=admin&hal=tambah_kandidat">Tambah Kandidat</a></li>
            <li><a href="./index.php?page=admin&hal=hapus_kandidat">Hapus Kandidat</a></li>
            <li><a href="./index.php?page=admin&hal=edit_kandidat">Edit Kandidat</a></li>
            <li><a href="./index.php?page=admin&hal=edit_waktu_voting">Waktu Voting</a></li>
            <li><a href="./index.php?page=admin&hal=logout">Log Out</a></li>
        </ul>
    </nav>

    <?php
    $total_user = mysqli_query($conn, "SELECT * FROM users");
    $user_total = mysqli_num_rows($total_user);  
    $total_user_vot = mysqli_query($conn, "SELECT * FROM vote");
    $user_total_vot = mysqli_num_rows($total_user_vot);  
    $total_kandidat = mysqli_query($conn, "SELECT * FROM kandidat");
    $kandidat_total = mysqli_num_rows($total_kandidat);  
    ?>
    <div class="total-tabel">
        <div class="total-user">
            <h2><?= $user_total ?></h2>&nbsp;&nbsp;&nbsp;<h4>users</h4>
        </div>
        <div class="total-user-voting">
            <h2><?= $user_total_vot ?></h2>&nbsp;&nbsp;&nbsp;<h4>vote</h4>
        </div>
        <div class="total-kandidat">
            <h2><?= $kandidat_total ?></h2>&nbsp;&nbsp;&nbsp;<h4>kandidat</h4>
        </div>
    </div>

    <div class="total-suara">
        <?php 
        $no = 1;
        $cek = mysqli_query($conn, "SELECT * FROM kandidat");
        while($tampil = mysqli_fetch_array($cek)) {

            $kandidat = mysqli_query($conn, "SELECT * FROM vote WHERE kandidat_id = 'kandidat_". $no ."'");
            $total = mysqli_num_rows($kandidat); 
            $total_akhir = $total/10;

            $no++; ?>

            <h5>Kandidat <?= $tampil['kandidat_id'] ?></h5>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Default striped example" style="width: <?= $total_akhir ?>%" aria-valuenow="50%" aria-valuemin="0" aria-valuemax="1000"><?= $total_akhir ?>%</div>
            </div>
            <br><br>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
