<?php
require('db/koneksi.php');
require('query.php');

$id = $_GET['id'];

// Membuat objek CRUD
$obj = new crud;

// Memanggil metode hapusData
if ($obj->hapusData($id)) {
    header('Location: home.php?user_fullname'.urlencode($userName));
} else {
    echo "Gagal menghapus data.";
}
?>