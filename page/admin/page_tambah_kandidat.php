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

$data = file_get_contents('./page/admin/ngakalin.json');
$kd_id = json_decode($data, true);

@$knd_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/admin/page_tambah_kandidat.css">

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

    <div class="tambah_kandidat">
        <h1><b>Tambah Kandidat</b></h1>
        <form method="post" enctype="multipart/form-data">
            <label for="gambar_kandidat"><b>Foto / Gambar</b></label>
            <input type="file" class="form-control input_gambar" name="gambar" id="gambar_kandidat" required>
            <br>
            <label for="video_kandidat"><b>Video</b></label>
            <input type="file" class="form-control input_video" name="video" id="video_kandidat" required>
            <br><br>
            <label for="ketua"><b>Nama Ketua</b></label><br>
            <input type="text" name="ketua" id="ketua" class="ketua-input" required><br><br>
            <label for="wakil"><b>Nama Wakil</b></label><br>
            <input type="text" name="wakil" id="wakil" class="wakil-input" required>
            <br><br>
            <label for="motto"><b>Motto</b></label><br>
            <textarea name="motto" id="motto" class="motto" cols="79" rows="5" required></textarea>
            <br><br>
            <label for="visi&misi"><b>Visi & Misi</b></label><br>
            <textarea name="visi&misi" id="visi&misi" class="visimisi" cols="79" rows="5" required></textarea>
            <br><br>
            <label for="kandidat_user"><b>Kandidat Userid</b></label><br>
            <input type="text" id="kandidat_user" name="kandidat_user" class="kand_user_input" required><br><br>
            <label for="kandidat_pass"><b>Kandidat Password</b></label><br>
            <input type="text" id="kandidat_pass" name="kandidat_pass" class="kand_pass_input" required>

            <br><br>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
            <br><br>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    // 
    $namaFile_v = $_FILES['video']['name'];
    $ukuranFile_v = $_FILES['video']['size'];
    $error_v = $_FILES['video']['error'];
    $tmpName_v = $_FILES['video']['tmp_name'];


    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // 
    $ekstensiVideoValid = ['mp4'];
    $ekstensiVideo = explode('.', $namaFile_v);
    $ekstensiVideo = strtolower(end($ekstensiVideo));


    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Ops..","Silahkan masukkan gambar dengan format yang benar (jpg, jpeg, png)","warning").then(function() {
                window.location="index.php?page=admin&hal=tambah_kandidat";
            });
            e.preventDefault();
        </script><?php
        return 1;
    }
    // 
    if(!in_array($ekstensiVideo, $ekstensiVideoValid)) {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Ops..","Silahkan masukkan video dengan format yang benar (mp4)","warning").then(function() {
                window.location="index.php?page=admin&hal=tambah_kandidat";
            });
            e.preventDefault();
        </script><?php
        return 1;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'assets/kandidat/img/' . $namaFileBaru);
    // 
    $namaFileBaru_v = uniqid();
    $namaFileBaru_v .= '.';
    $namaFileBaru_v .= $ekstensiVideo;

    move_uploaded_file($tmpName_v, 'assets/kandidat/video/' . $namaFileBaru_v);

    // Ngakalin
    foreach ($kd_id as $row) {
        $knd_id = $row['kandidat_id'] + 1;
    }
    $simpan = mysqli_query($conn, "INSERT INTO `kandidat` (`kandidat_id`, `ketua`, `wakil`, `motto`, `visimisi`, `gambar`, `video`, `userid`, `password`) VALUES ('". $knd_id ."', '". $_POST['ketua'] ."', '". $_POST['wakil'] ."', '". $_POST['motto'] ."', '". $_POST['visi&misi'] ."', '". $namaFileBaru ."', '". $namaFileBaru_v ."', '". $_POST['kandidat_user'] ."', '". $_POST['kandidat_pass'] ."')");
    foreach($kd_id as $key => $d) {
        $kd_id[$key]['kandidat_id'] = $knd_id;
        file_put_contents("./page/admin/ngakalin.json", json_encode($kd_id, JSON_PRETTY_PRINT));
    }

    if($simpan) {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Success..","Berhasil menambahkan kandidat","success").then(function() {
                window.location="index.php?page=admin&hal=home";
            });
            e.preventDefault();
        </script><?php
    } else {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Ops..","Gagal menambahkan kandidat! silahkan coba lagi","warning").then(function() {
                window.location="index.php?page=admin&hal=tambah_kandidat";
            });
            e.preventDefault();
        </script><?php
    }
} 
?>
