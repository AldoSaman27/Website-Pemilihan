<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <?php @$page = $_GET['hal'];
    if(!empty($page)) {
        switch($page) {
            case 'login':
                include "./page/admin/page_login.php";
                break;

            case 'logout':
                include "./page/admin/page_logout.php";
                break;

            case 'home':
                include "./page/admin/page_home.php";
                break;

            case 'tambah_kandidat':
                include "./page/admin/page_tambah_kandidat.php";
                break;

            case 'hapus_kandidat':
                include "./page/admin/page_hapus_kandidat.php";
                break;

            case 'edit_kandidat':
                include "./page/admin/page_edit_kandidat.php";
                break;

            case 'edit_waktu_voting':
                include "./page/admin/page_edit_waktu_voting.php";
                break;

            case 'logout':
                include "./page/kandidat/page_logout.php";
                break;
        }
    } 
    else include "./page/admin/page_login.php";?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
