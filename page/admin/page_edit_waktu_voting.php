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
$json = json_decode($data, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/admin/page_hapus_kandidat.css">

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

    <div class="hapus_kandidat">
        <h1><b>Edit Waktu Voting</b></h1>
        <form method="POST">
            <label for="tanggal_id"><b>Tanggal Voting</b></label><br>
            <input type="date" name="tanggal" id="tanggal_id"><br><br>
            <label for="jam_id"><b>Jam Voting</b></label><br>
            <input type="time" name="jam" id="jam_id"><br><br>
            <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $data = file_get_contents('./waktu_voting.json');
    $json = json_decode($data, true);

    foreach($json as $key => $d) {
        $json[$key]['waktu_voting'] = array(
            "tanggal" => $_POST['tanggal'],
            "jam" => $_POST['jam']
        );
        $cek = file_put_contents("./waktu_voting.json", json_encode($json, JSON_PRETTY_PRINT));
    }

    if($cek) {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Success..","Berhasil mengedit waktu voting (<?= $_POST['tanggal'] ?> <?= $_POST['jam'] ?>)","success").then(function() {
                window.location="index.php?page=admin&hal=home";
            });
            e.preventDefault();
        </script><?php
    } else {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Opss..","Gagal mengedit waktu voting! silahkan coba lagi","warning").then(function() {
                window.location="index.php?page=admin&hal=edit_waktu_voting";
            });
            e.preventDefault();
        </script><?php
    }
} 
?>