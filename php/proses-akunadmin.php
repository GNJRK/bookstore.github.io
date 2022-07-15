<?php
// koneksi php
include ('koneksi.php');

$username = $_POST['username'];
$password = $_POST['passwordd'];
$email = $_POST['email'];
$level = "admin";

// insert php
$sql = "INSERT INTO user(username, passwordd, email, level) VALUES('$username','$password','$email','$level')";
$kon->query($sql);

if (mysqli_query($kon, $sql)) {
    echo "<script> alert ('Anda berhasil daftar');</script>";
    header('location:../admin-akun.php');

} else {
    echo "Gagal! $sql.". mysqli_error($kon);
}
?>