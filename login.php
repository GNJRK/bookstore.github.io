<!-- Koneksi php -->
<?php 
    include ('php/koneksi.php');

    if(isset($_POST['add_to_cart'])){

        $buku_judul = $_POST['judul'];
        $buku_foto = $_POST['foto'];
        $buku_harga = $_POST['harga'];
        $buku_quantity = 1;
     
        $select_cart = mysqli_query($kon, "SELECT * FROM `transaksi` WHERE judul = '$buku_judul'");
     
        if(mysqli_num_rows($select_cart) > 0){
           $message[] = 'product already added to cart';
        }else{
           $insert_buku = mysqli_query($kon, "INSERT INTO `transaksi`(judul, foto, harga, quantity) VALUES('$buku_judul', '$buku_foto', '$buku_harga', '$buku_quantity')");
           $message[] = 'product added to cart succesfully';
        }
     
     }
     
?>
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

<!-- FORM LOGIN -->
<div class="section-login">
    <div class="kotak-login col-4">
        <form action="php/proses-login.php" enctype="multipart/form-data" method="post">
            <label for="">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukkan username anda" required="required" class="form-login">
            <label for="">Password</label>
            <input type="password" name="passwordd" id="passwordd" placeholder="Masukkan password anda" required="required" class="form-login">
            <input type="submit" id="submit" value="LOGIN" class="btn-masuk">
            <div class="section-register">
                <p>Belum punya akun? <a href="daftar.php">Daftar disini</a>
            </div>
        </form>
    </div>
</div>
<!-- //FORM LOGIN -->
</body>
</html>