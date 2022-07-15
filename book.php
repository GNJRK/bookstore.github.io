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
<title>KOLEKSI - DAFTAR BUKU KAMI</title>
<!-- //HEADER -->
<body>

<!-- NAVIGASI -->
<?php include('php/navigasi.php');?>
<!-- //NAVIGASI -->

<!-- BANNER -->
<div id="hero-book">
    <div data-aos="fade-up">
        <h1>Temukan Bukumu disini</h1>
    </div>
</div> 
<!-- //BANNER -->

<!-- KOLEKSI BUKU -->
<div class="container-buku">
	<div class="judul-section">
		<h3>Koleksi Buku</h3>
	</div>
        <div class="main-section">
            <?php 
                $select_buku = mysqli_query($kon, "SELECT * FROM `buku` order by bukuid desc");
                if(mysqli_num_rows($select_buku) > 0){
                   while($fetch_buku = mysqli_fetch_assoc($select_buku)){
            ?>

            <!-- TAMPILAN BUKU -->
            <div class="buku-section">
                <div data-aos="fade-up">
                    <form action="modal-cart.php" method="post" ectype="multipart/form-data">
                        <img class="img-buku" src="gambar/<?php echo $fetch_buku ['foto']?>">
                        <h4><?php echo $fetch_buku ['judul']?></h4> 
                        <p>Rp. <?php echo number_format($fetch_buku ['harga']);?></p> 
                        <input type="submit" value="BELI" name="add_to_cart" class="btn" onclick="return alert('Buku ditambahkan ke cart');">
                    </form>
                </div>
            </div>
            <!-- //TAMPILAN BUKU -->
            <?php
                };
            };
            ?>
        </div>
</div>
<!-- //KOLEKSI BUKU -->

<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
</body>
</html>