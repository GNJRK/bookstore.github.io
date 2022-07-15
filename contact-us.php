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
<title>INDEX - SELAMAT DATANG</title>
<!-- //HEADER -->
<body>
<!-- NAVIGASI -->
<?php include('php/navigasi.php');?>
<!-- //NAVIGASI -->

<!-- BANNER -->
<div id="hero-contact">
    <div data-aos="fade-up">
        <h1>Contact us</h1>
    </div>
</div>
<!--------------- FORM CONTACT ---------------------->
<div class="section-contact">
    <div class="form-contact">
        <form action="#">
            <div class="row">
                <div class="col-25">
                    <label for="nama">Nama</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama anda" required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nama">E-mail</label>
                </div>
                <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Masukkan E-mail anda" required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nama">Pesan</label>
                </div>
                <div class="col-75">
                    <textarea name="pesan" id="pesan" placeholder="Buat Pesan..."></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit" class="btn-section-contact">
            </div>
        </form>
    </div>
</div>
<!-----------------------------MAP----------------------->
<div class="map">
        <div class="row">
            <h1 class="text-center">Lokasi Kami</h1>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.229471062167!2d115.21539811404686!3d-8.66971429377057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd241cb2a518d7f%3A0x974e3365b1d55a46!2sGramedia%20Bali%20Duta%20Plaza!5e0!3m2!1sid!2sid!4v1655924498349!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
<!-- //BANNER -->
<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
</body>
</html>