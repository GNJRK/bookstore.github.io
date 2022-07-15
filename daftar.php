<!-- Koneksi php -->
<?php include ('php/koneksi.php');?>
<!-- //Koneksi php -->

<!DOCTYPE html>
<html lang="en">
<!-- HEADER -->
<?php include('php/header.php');?>
<title>LOGIN - SILAHKAN LOGIN DISINI</title>
<!-- //HEADER -->
<body>
<!-- NAVIGASI -->
 <?php include('php/navigasi.php');?>
<!-- //NAVIGASI -->

<!-- FORM DAFTAR -->
<div class="section-login">
    <div class="kotak-login col-4">
        <form action="php/proses-daftar.php" enctype="multipart/form-data" method="post">
            <label for="">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username anda" required="required" class="form-login">
            <label for="">Password</label>
            <input type="password" name="passwordd" id="passwordd" placeholder="Masukkan password anda" required="required" class="form-login">
            <label for="">E-Mail</label>
            <input type="text" name="email" id="email" placeholder="Masukkan E-mail anda" required="required" class="form-login">
            <input type="submit" id="submit" value="DAFTAR" class="btn-masuk">
        </form>
    </div>
</div>
<!-- //FORM DAFTAR -->
</body>
</html>