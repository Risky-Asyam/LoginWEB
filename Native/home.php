<?php
require "db/koneksi.php";
$email = $_GET['user_fullname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="nav">
        <div class="logo">

            <p>Logo</p>
        </div>
        <div class="right-links">
            <a href="index.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="top">
            <p>Selamat Datang <?php echo $email;?></p>
        </div>
    <main>

    </main>
    <table border='1' class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM user_detail";
            $result = mysqli_query($koneksi, $query);
            $no = 1;
                while ($row = mysqli_fetch_array($result)) {
                $userMail = $row['user_email'];
                $userName = $row['user_fullname'];
                $userLevel = $row['level'];

    ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $userMail; ?></td>
                <td><?php echo $userName; ?></td>
                <td><?php echo $userLevel; ?></td>
                <td><a href="edit.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-success">Edit</button>
</a>
                <a href="hapus.php?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-danger">Hapus</button>
</a></td>
            </tr>
            <?php
$no++;
}?>
        </tbody>
    </table>
</body>

</html>