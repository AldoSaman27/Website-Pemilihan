<?php
@$check = $_SESSION['status_login'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/admin/page_login.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <section id="header">
        <div class="header container">
            <div class="box">
                <h1>ADMIN LOGIN</h1>
                <form method="post">
                    <?php
                        if($check != true) {
                            ?><input type="text" class="input-username" name="admin_id" placeholder="Admin ID">
                            <input type="password" class="input-password" name="password" placeholder="Password">
                            <br><br>
                            <center><input type="submit" class="button-login" name="login" value="Login"></center><?php
                        } else {
                            ?><input type="text" class="input-username" name="admin_id" placeholder="Admin ID" value="<?= $_SESSION['userid']; ?>" disabled>
                            <input type="password" class="input-password" name="password" placeholder="Password" value="password" disabled>
                            <br><br>
                            <center><input type="submit" class="button-login" name="login" value="Login" disabled>
                            <input type="submit" class="button-logout-admin" name="logout" value="Log Out"></center><?php
                        }
                    ?>  
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['login'])) {
    $cek = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '". $_POST['admin_id'] ."' AND password = '". $_POST['password'] ."'");
    if(mysqli_num_rows($cek) > 0) {
        $d = mysqli_fetch_object($cek);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION["userid"] = $_POST['admin_id'];
        $_SESSION["is_admin"] = true;

        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Success..","Success Login!","success").then(function() {
                window.location="index.php?page=admin&hal=home";
            });
            e.preventDefault();
        </script><?php
    }
    else {
        ?><script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Opss..","Wrong User ID","warning");
            e.preventDefault();
        </script><?php
    }
}
else if(isset($_POST['logout'])) {
    session_destroy();
    ?><script>window.location="index.php?page=admin";</script><?php
}
?>