<nav>
    <div class="logo">
        <a href=""><img src="gambar/Logo_bookstore_transparent_white.png"></a>
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="book.php">Bookstore</a></li>
        <li><a href="about-us.php">About us</a></li>
        <li><a href="contact-us.php">Contact us</a></li>      
        <li><a href="login.php">Login</a></li>
        <?php
      
            $select_rows = mysqli_query($kon, "SELECT * FROM `transaksi`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

        ?>
        <li><a id="myBtn"><i class="fas fa-shopping-cart"><span><?php echo $row_count; ?></span></i></a></li>
    </ul>
</nav>