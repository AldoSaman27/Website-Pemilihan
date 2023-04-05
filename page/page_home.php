<?php
$data = file_get_contents('./waktu_voting.json');
$json = json_decode($data, true);

foreach ($json as $row) {
    @$waktu_voting_tanggal_1 = $row['waktu_voting']['tgl_1'];
    @$waktu_voting_tanggal_2 = $row['waktu_voting']['tgl_2'];
    @$waktu_voting_tanggal_3 = $row['waktu_voting']['tgl_3'];
    @$waktu_voting_jam_1 = $row['waktu_voting']['jam_1'];
    @$waktu_voting_jam_2 = $row['waktu_voting']['jam_2'];
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
    <link rel="stylesheet" type="text/css" href="./css/page_home.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <section id="home">
        <div class="home container">
            <div>
                <h3><b>PEMILIHAN</b></h3>
                <h3><b>KETUA & WAKIL KETUA OSIS</b></h3>
                <h4><b>SMK NEGERI 3 GORONTALO</b></h4>
            </div>
        </div>    
    </section>

    <section id="kandidat" style="min-height: 700px">
        <h1 class="kand"><b>KANDIDAT</b></h1>
        <div class="row">

            <?php $cek = mysqli_query($conn, "SELECT * FROM kandidat");
            while($tampil = mysqli_fetch_array($cek)) { ?>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/kandidat/img/<?= $tampil["gambar"] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Kandidat <?= $tampil["kandidat_id"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $tampil["ketua"] ?> & <?= $tampil["wakil"] ?></h6>
                        <p class="card-text"><?= $tampil["motto"] ?></p>
                        <center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $tampil["kandidat_id"] ?>">Lebih Lanjut</button></center>
                    </div>
                </div>
                
                <div class="modal fade" id="exampleModal<?= $tampil["kandidat_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kandidat <?= $tampil["kandidat_id"] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <center><video src="./assets/kandidat/video/<?= $tampil["video"] ?>" controls></video></center>
                            <br>
                            <h3><?= $tampil["ketua"] ?> & <?= $tampil["wakil"] ?></h3>
                            <h5>Motto</h5>
                            <p><?= $tampil["motto"] ?></p>
                            <h5>Visi & Misi</h5>
                            <p><?= $tampil["visimisi"] ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section id="waktu">
        <div class="waktu container">
            <br><br>
            <h1>Menuju Pemilihan</h1>
            <div id="countdown">
                <ul>
                    <li><span id="hari"></span>days</li>
                    <li><span id="jam"></span>Hours</li>
                    <li><span id="menit"></span>Minutes</li>
                    <li><span id="detik"></span>Seconds</li>
                </ul>
            </div>
    </section>

    <script>
        
        var countDownDate = new Date("<?= $waktu_voting_tanggal_3 ?>-<?= $waktu_voting_tanggal_2 ?>-<?= $waktu_voting_tanggal_1 ?> <?= $waktu_voting_jam_1 ?>:<?= $waktu_voting_jam_2 ?>").getTime();

        var x = setInterval(function() {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("hari").innerHTML = days;
            document.getElementById("jam").innerHTML = hours;
            document.getElementById("menit").innerHTML = minutes;
            document.getElementById("detik").innerHTML = seconds;

            if (distance < 0) { //Selesai
                clearInterval(x);
                document.getElementById("hari").innerHTML = "00";
                document.getElementById("jam").innerHTML = "00";
                document.getElementById("menit").innerHTML = "00";
                document.getElementById("detik").innerHTML = "00";
            }
        }, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
