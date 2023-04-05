<?php
@$check = $_SESSION['status_login'];
@$is_users = $_SESSION["is_users"];

date_default_timezone_set("Asia/Jakarta");
$tanggal_skrng_1 = date("d");
$tanggal_skrng_2 = date("m");
$tanggal_skrng_3 = date("Y");
$jam_skrng_1 = date("h") + 1;
$jam_skrng_2 = date("i");

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
    <link rel="stylesheet" type="text/css" href="./css/page_vote.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body><br><br><br>
    <center><h1 class="silpil"><b>SILAHKAN PILIH</b></h1></center>

    <section id="kandidat">
        <div class="row">
            <?php $cek = mysqli_query($conn, "SELECT * FROM kandidat");
            while($tampil = mysqli_fetch_array($cek)) { ?>
                <div class="card" style="width: 18rem;">
                    <img src="./assets/kandidat/img/<?= $tampil["gambar"] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Kandidat <?= $tampil["kandidat_id"] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $tampil["ketua"] ?> & <?= $tampil["wakil"] ?></h6>
                        <br>
                        <?php
                        if($check != true) {
                            ?><center><button type="button" class="btn btn-primary" disabled>Please Login!</button></center><?php
                        } else if($is_vote == 1) {
                            ?><center><button type="button" class="btn btn-primary" disabled>Pilih</button></center><?php
                        } else if($is_users != true) {
                            ?><center><button type="button" class="btn btn-primary" disabled>Pilih</button></center><?php
                        } else if($waktu_voting_tanggal_3 === $tanggal_skrng_3 && $waktu_voting_tanggal_2 === $tanggal_skrng_2 && $waktu_voting_tanggal_1 === $tanggal_skrng_1 && $waktu_voting_jam_1 <= $jam_skrng_1 && $waktu_voting_jam_2 <= $jam_skrng_2) {
                            ?><center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $tampil["kandidat_id"]?>">Pilih</button></center><?php
                        } else {
                            ?><center><button type="button" class="btn btn-primary" disabled>Pilih</button></center><?php
                        }
                        ?>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $tampil["kandidat_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-1" id="exampleModalLabel">Pilih Kandidat <?= $tampil["kandidat_id"] ?></h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Anda ingin memberikan saran kepada kandidat? jika tidak silahkan kosongkan</p>
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Saran:</label>
                                    <textarea class="form-control" id="message-text" name="message"></textarea>
                                    <input type="text" name="kandidat_id" class="input-kandidat" value="kandidat_<?= $tampil["kandidat_id"] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="btn btn-primary btn-pilih" value="Oke">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </section>

    <center>
        <div class="katakata">
            <br>
            <p>Silahkan memilih salah satu kandidat yang anda yakin bisa memajukan SMK Negeri 3 Gorontalo</p>
            <h3>Silahkan Memilih Dengan Bijak</h3>
            <br><br><br><br>
        </div>
    </center>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["submit"])) {
    if($_POST['message'] == "") {
        mysqli_query($conn, "INSERT INTO `vote` (`kandidat_id`) VALUES ('". $_POST['kandidat_id'] ."')");
    } else {
        mysqli_query($conn, "INSERT INTO `vote` (`kandidat_id`, `pesan`) VALUES ('". $_POST['kandidat_id'] ."', '". $_POST['message'] ."')");
    }
    
    mysqli_query($conn, "UPDATE `users` SET `is_vote` = 1 WHERE `userid` = '". $_SESSION["userid"] ."'");

    session_destroy();
    ?><script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>
    <script>
        Swal.fire("Success..","Terima kasih telah menggunakan hak pilih anda!","success").then(function() {
            window.location="index.php?page=home";
        });
        e.preventDefault();
    </script><?php
}
?>