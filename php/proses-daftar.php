<?php
// koneksi php
include ('koneksi.php');

$username = $_POST['username'];
$password = $_POST['passwordd'];
$email = $_POST['email'];
$level = "user";

// insert php
$sql = "INSERT INTO user(username, passwordd, email, level) VALUES('$username','$password','$email','$level')";
$kon->query($sql);

if (mysqli_num_row($sql)>0) {
    echo "alert('Akun sudah terdaftar')";
    header('location:../login.php');
}
    elseif (mysqli_query($kon, $sql)) {
        echo "alert('Anda berhasil daftar')";
        header('location:../login.php');

} else {
    echo "Gagal! $sql.". mysqli_error($kon);
}
?>