<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <?php
                    require 'db/koneksi.php';
                    require 'query.php';

                    session_start();

                    if (isset($_POST['submit'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        // Membuat objek CRUD
                        $obj = new crud;

                        if (!empty(trim($email)) && !empty(trim($password))) {
                            $loginResult = $obj->cekLogin($email, $password);

                            if ($loginResult !== false) {
                                // Jika login berhasil, alihkan ke halaman home.php dengan parameter nama pengguna
                                header('Location: home.php?user_fullname=' . urlencode($loginResult['user_fullname']));
                                exit;
                            } else {
                                echo 'Username atau password salah!';
                            }
                        } else {
                            echo 'Data tidak boleh kosong!';
                        }
                    }
                ?>
                <div class="field input">
                    <input type="submit" class = "btn" name="submit" value = "Login" required>
                </div>
                <div class="links">
                    Belum Punya Akun? <a href="register.php">Register</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>