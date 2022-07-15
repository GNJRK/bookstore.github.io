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
<div class="slideshow-container">
    <div class="mySlides fade">
        <div id="hero-index">
            <div data-aos="fade-up">
                <h1>SELAMAT DATANG</h1>
                <p>Selamat datang di Bookstore dimana kami menjual buku-buku terbaru sesuai selera masa kini.
                Terdapat banyak koleksi yang bisa kalian beli. Tunggu apalagi yuk beli sekarang!
                </p>
                <a class="hero-btn" href="book.php">Beli Sekarang</a>
            </div>
        </div>
    </div> 

    <div class="mySlides fade">
        <div id="hero-book">
            <div data-aos="fade-up">
                <h1>Temukan Bukumu disini</h1>
                <p>
                    Di Bookstore terdapat banyak buku yang bisa kalian beli
                    semuanya up to date
                </p>
                <a class="hero-btn" href="book.php">Bookstore</a>
            </div>
        </div> 
    </div>
    <div class="mySlides fade">
        <div id="hero-contact">
            <div data-aos="fade-up">
                <h1>Hubungi Kami</h1>
                <p>
                Apabila anda mengalami masalah dalam pembelian ataupun masalah lainnya silahkan hubungi kami
                </p>
                <a class="hero-btn" href="contact-us.php">Contact Us</a>
            </div>
        </div> 
    </div> 
    <div class="slide-dot">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
      </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<!-- //BANNER -->

<!-- KONTEN -->
<div>
<div class="section-container">
    <div class="container" data-aos="fade-right">
        <div class="content-description">
            <div class="content-img">
                <img src="gambar/Sun Tzu.jpg" alt="" srcset="">
            </div>
                <div class="description">
                    <h2>What? Do you want some quotes? There's No Quotes For Today</h2>
                    <h5>-Sun Tzu, The Art of War</h5>
                </div>
        </div>
    </div>
</div>
</div>

<!-- //KONTEN -->
<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
</body>
</html>