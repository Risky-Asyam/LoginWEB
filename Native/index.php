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
                    require ('db/koneksi.php');
                    
                    session_start();

                    if(isset($_POST['submit'])){
                        $email = $_POST['email'];
                        $pass = $_POST['password'];
                        
                        /*
                        $emailCheck = mysqli_real_escape_string($koneksi, $email);
                        $passCheck = mysqli_real_escape_string($koneksi, $pass);
                        */

                    if(!empty(trim($email)) && !empty(trim($pass))){
                        //select data berdasarkan username dari database
                        $query  = "SELECT * FROM user_detail WHERE user_email = '$email'";
                        $result = mysqli_query($koneksi, $query);
                        $num    = mysqli_num_rows($result);

                        while($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $userVal = $row['user_email'];
                            $passVal = $row['user_password'];
                            $username = $row['user_fullname'];
                            $level = $row['level'];
                        }
                        if($num != 0){
                            if($userVal==$email && $passVal==$pass){
                                header('Location: home.php?user_fullname='.urlencode($username));
                            }
                            else{
                                echo 'user atau password salah !';
                            }
                        }
                        else{
                            echo 'Data tidak boleh kosong !!';
                        }
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