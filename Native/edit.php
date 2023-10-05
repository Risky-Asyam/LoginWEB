<?php
    require ('db/koneksi.php');
    if(isset($_POST['update'])){
        $userId     = $_POST['txt_id'];
        $userMail   = $_POST['txt_email'];
        $userPass   = $_POST['txt_pass'];
        $userId     = $_POST['txt_nama'];

        $query = "UPDATE user_detail SET user_password='$userPass', user_fullname='$userName' WHERE id = '$userId'";
        echo $query;
        $result = mysqli_query($koneksi, $query);
        header('Location: home.php?user_fullname='.urlencode($username));
    }
    $id = $_GET['id'];
    $query = "SELECT * FROM user_detail WHERE id='$id'";
    $result = mysqli_query($koneksi, $query) or die(mysql_error());
    //$nomor = 1
    while ($row = mysqli_fetch_array($result)){
        $id         = $row['id'];
        $userMail   = $row['user_email'];
        $userPass   = $row['user_password'];
        $userName   = $row['user_fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="edit.php" method = "POST">
        <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
        <p>email <input type="text" name="txt_email" value = "<?php echo $userMail; ?>"></p>
        <p>password : <input type="password" name="txt_pass" value="<?php echo $userPass; ?>"></p>
        <p>nama : <input type="text" name="txt_nama" value="<?php echo $userName; ?>"></p>
        <button type = "submit" name = "update">Update</button>
    </form>
    <p><a href="home.php">Kembali</a></p>
</body>
</html>
<?php } ?>