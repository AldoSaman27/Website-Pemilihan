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
    <link rel="stylesheet" type="text/css" href="./css/admin/page_edit_kandidat.css">

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

    <div class="edit_kandidat">
        <h1><b>Edit Kandidat</b></h1>

        <form method="POST">
            <label for="id_kandidat"><b>Kandidat ID</b></label><br>
            <input type="number" class="edit_kandidat_id" name="kandidat_id" id="id_kandidat" required><br><br>
            <input type="submit" name="pilih" value="Pilih" class="btn btn-primary"><br><br><br>
        </form>

        <?php if(isset($_POST['pilih'])) {
            $cek = mysqli_query($conn, "SELECT * FROM `kandidat` WHERE `kandidat_id` = '". $_POST['kandidat_id'] ."'");
            if(mysqli_num_rows($cek)) { 
                $d = mysqli_fetch_object($cek);
                $_SESSION['a_global'] = $d;

            ?>
                <form method="POST" enctype="multipart/form-data">
                    <h4><b>Edit Kandidat <?= $_SESSION['a_global']->kandidat_id ?></b></h4><br>
                    <label for="gambar_kandidat"><b>Foto / Gambar</b></label>
                    <input type="file" class="form-control input_gambar" name="gambar" id="gambar_kandidat">
                    <br>
                    <label for="video_kandidat"><b>Video</b></label>
                    <input type="file" class="form-control input_video" name="video" id="video_kandidat">
                    <br><br>
                    <label for="ketua_id"><b>Nama Ketua</b></label><br>
                    <input type="text" id="ketua_id" name="ketua" class="ketua-input" value="<?= $_SESSION['a_global']->ketua ?>" required><br><br>
                    <label for="wakil_id"><b>Nama Wakil</b></label><br>
                    <input type="text" id="wakil_id" name="wakil" class="wakil-input" value="<?= $_SESSION['a_global']->wakil ?>" required>
                    <br><br>
                    <label for="motto"><b>Motto</b></label><br>
                    <textarea name="motto" id="motto" cols="79" rows="5" class="motto" required><?= $_SESSION['a_global']->motto ?></textarea>
                    <br><br>
                    <label for="visi&misi"><b>Visi & Misi</b></label><br>
                    <textarea name="visi&misi" id="visi&misi" cols="79" rows="5" class="visimisi" required><?= $_SESSION['a_global']->visimisi ?></textarea>
                    <br><br>
                    <label for="kandidat_user"><b>Kandidat Username</b></label><br>
                    <input type="text" id="kandidat_user" name="kandidat_user" class="kand_user_input" value="<?= $_SESSION['a_global']->userid ?>" required><br><br>
                    <label for="kandidat_pass"><b>Kandidat Password</b></label><br>
                    <input type="text" id="kandidat_pass" name="kandidat_pass" class="kand_pass_input" value="<?= $_SESSION['a_global']->password ?>" required>

                    <br><br>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <br><br>
                </form>
            <?php
            } else {
                ?><script src="./js/jquery-3.4.1.min.js"></script>
                <script src="./js/sweetalert2.all.min.js"></script>
                <script>
                    Swal.fire("Ops..","ID Kandidat tidak ada! silahkan coba lagi","warning");
                    e.preventDefault();
                </script><?php
            }
        } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['simpan'])) {
    if($_FILES['gambar']['name'] == "" && $_FILES['video']['name'] == "") {

        $cek = mysqli_query($conn, "UPDATE `kandidat` SET `ketua`='". $_POST['ketua'] ."',`wakil`='". $_POST['wakil'] ."',`motto`='". $_POST['motto'] ."',`visimisi`='". $_POST['visi&misi'] ."',`userid`='". $_POST['kandidat_user'] ."',`password`='". $_POST['kandidat_pass'] ."' WHERE `kandidat_id` = '". $_SESSION['a_global']->kandidat_id ."'");
        if($cek) {
            ?><script src="./js/jquery-3.4.1.min.js"></script>
            <script src="./js/sweetalert2.all.min.js"></script>
            <script>
                Swal.fire("Success..","Berhasil mengedit kandidat","success").then(function() {
                    window.location="index.php?page=admin&hal=home";
                });
                e.preventDefault();
            </script><?php
        }

    } else if($_FILES['gambar']['name'] == "") {

        //Add Video
        $namaFile_v = $_FILES['video']['name'];
        $ukuranFile_v = $_FILES['video']['size'];
        $error_v = $_FILES['video']['error'];
        $tmpName_v = $_FILES['video']['tmp_name'];

        $ekstensiVideoValid = ['mp4'];
        $ekstensiVideo = explode('.', $namaFile_v);
        $ekstensiVideo = strtolower(end($ekstensiVideo));

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

        $namaFileBaru_v = uniqid();
        $namaFileBaru_v .= '.';
        $namaFileBaru_v .= $ekstensiVideo;
    
        move_uploaded_file($tmpName_v, 'assets/kandidat/video/' . $namaFileBaru_v);

        $cek = mysqli_query($conn, "UPDATE `kandidat` SET `ketua`='". $_POST['ketua'] ."',`wakil`='". $_POST['wakil'] ."',`motto`='". $_POST['motto'] ."',`visimisi`='". $_POST['visi&misi'] ."',`userid`='". $_POST['kandidat_user'] ."',`password`='". $_POST['kandidat_pass'] ."', `video`='". $namaFileBaru_v ."' WHERE `kandidat_id` = '". $_SESSION['a_global']->kandidat_id ."'");
        if($cek) {
            ?><script src="./js/jquery-3.4.1.min.js"></script>
            <script src="./js/sweetalert2.all.min.js"></script>
            <script>
                Swal.fire("Success..","Berhasil mengedit kandidat","success").then(function() {
                    window.location="index.php?page=admin&hal=home";
                });
                e.preventDefault();
            </script><?php
        }

    } else if($_FILES['video']['name'] == "") {

        //Add Gambar / Foto
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

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

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
    
        move_uploaded_file($tmpName, 'assets/kandidat/img/' . $namaFileBaru);

        $cek = mysqli_query($conn, "UPDATE `kandidat` SET `ketua`='". $_POST['ketua'] ."',`wakil`='". $_POST['wakil'] ."',`motto`='". $_POST['motto'] ."',`visimisi`='". $_POST['visi&misi'] ."',`userid`='". $_POST['kandidat_user'] ."',`password`='". $_POST['kandidat_pass'] ."', `gambar`='". $namaFileBaru ."' WHERE `kandidat_id` = '". $_SESSION['a_global']->kandidat_id ."'");
        if($cek) {
            ?><script src="./js/jquery-3.4.1.min.js"></script>
            <script src="./js/sweetalert2.all.min.js"></script>
            <script>
                Swal.fire("Success..","Berhasil mengedit kandidat","success").then(function() {
                    window.location="index.php?page=admin&hal=home";
                });
                e.preventDefault();
            </script><?php
        }

    } else {

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

        $cek = mysqli_query($conn, "UPDATE `kandidat` SET `ketua`='". $_POST['ketua'] ."',`wakil`='". $_POST['wakil'] ."',`motto`='". $_POST['motto'] ."',`visimisi`='". $_POST['visi&misi'] ."',`userid`='". $_POST['kandidat_user'] ."',`password`='". $_POST['kandidat_pass'] ."', `gambar`='". $namaFileBaru ."', `video`='". $namaFileBaru_v ."' WHERE `kandidat_id` = '". $_SESSION['a_global']->kandidat_id ."'");
        if($cek) {
            ?><script src="./js/jquery-3.4.1.min.js"></script>
            <script src="./js/sweetalert2.all.min.js"></script>
            <script>
                Swal.fire("Success..","Berhasil mengedit kandidat","success").then(function() {
                    window.location="index.php?page=admin&hal=home";
                });
                e.preventDefault();
            </script><?php
        }
    }
}
?>
