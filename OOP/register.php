<?php
require('db/koneksi.php');
require('query.php');

$obj = new crud();

if (isset($_POST['register'])) {
    $userMail = $_POST['email'];
    $userPass = $_POST['password'];
    $userName = $_POST['nama'];

    $insertResult = $obj->insertData($userMail, $userPass, $userName);

    if ($insertResult) {
        header('Location: login.php');
        exit;
    } else {
        echo 'Gagal melakukan registrasi.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Register</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama"autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <input type="submit" class = "btn" name="register" value = "Register" required>
                </div>
                <div class="links">
                    Sudah Punya Akun? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>