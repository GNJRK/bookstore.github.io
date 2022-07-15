<!-- koneksi -->
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
<!DOCTYPE html>
<html lang="en">
<!-- HEADER -->
<?php include('php/header.php');?>
<title>ABOUT US - ANGGOTA KELOMPOK</title>
<!-- //HEADER -->
<body>
<!-- NAVIGASI -->
<?php include('php/navigasi.php');?>
<!-- //NAVIGASI -->

<body>
<!-----------------PROFILE------------------------------>
<div class="container-profile">
    <div class="profile-judul">
        <h3>Anggota Kelompok</h3>
    </div>
        <div class="section-profile">

            <div class="profile">
                <div class="pict">
                    <img src="gambar/profile/amongus black.jpg" class="bulat-profile">
                </div>
                <h4>A.A. Ngurah Krishnanda Wiradharma</h5>
                <p class="focus-text">Front-End</p>
                <p>HTML || CSS || Js || PHP</p>
                <p>190030811</p>
            </div>

            <div class="profile">
                <div class="pict">
                    <img src="gambar/profile/amongus red.jpg" class="bulat-profile">
                </div>
                <h4>Rozi Firdaus Muhaimin <br></br></h5>
                <p class="focus-text">Front-End</p>
                <p>Logo Design</p>
                <p>190030807</p>
            </div>

            
            <div class="profile">
                <div class="pict">
                    <img src="gambar/profile/amongus orange.jpg" class="bulat-profile">
                </div>
                <h4>Marchelino Emigo Malawangan<br></br></h5>
                <p class="focus-text">Back-End</p>
                <p>PHP || SQL Database</p>
                <p>190030825</p>
                </div>

            <div class="profile">
                <div class="pict">
                    <img src="gambar/profile/amongus green.jpg" class="bulat-profile rotate">
                </div>
                <h4>Seto<br></br></h4>
                <p class="focus-text">Back-End</p>
                <p>-</p>
                <p>190030825</p>
            </div>

        </div>
</div>
<!-----------------/PROFILE----------------------------------->

<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
</body>
</html>