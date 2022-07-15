<!-- KONEKSI -->
<?php include('php/koneksi.php');?>
<!-- KONEKSI -->
<!DOCTYPE html>
<html lang="en">
<!-- HEADER -->
<?php include('php/header.php');?>
<title>INDEX - ADMIN</title>
<!-- //HEADER -->
<body>
<!-- NAVIGASI -->
<?php include('php/admin-navigasi.php');?>
<!-- //NAVIGASI -->
<body>
<!-- CEK LOGIN USER -->

<!-- //CEK LOGIN USER -->

<!-- INPUT BUKU -->
    <div class="container-input">
        <h3></h3>
        <div class="input-section">
            <form action="php/proses-inputbuku.php" enctype="multipart/form-data" method="post">
                <label for="">Judul</label>
                    <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku" required="required" class="kotak-input">
                <label for="">Sampul</label>
                    <input type="file" name="foto" id="foto" class="kotak-input">
                <label for="">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" placeholder="Masukkan Nama Pengarang/author" required="required" class="kotak-input">
                <label for="">Harga</label>
                    <input type="text" name="harga" id="harga" placeholder="Masukkan Harga" required="required" class="kotak-input ">
                <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Sinopsis/Deskripsi buku..." class="kotak-input"></textarea>
                <input type="submit" value="Upload" class="btn-admin btn-input">
                <input type="reset" value="Batal" class="btn-admin btn-reset">
            </form>
        </div>
    </div>
<!-- //INPUT BUKU -->

<!-- DATABASE BUKU -->
<div class="table-section col-10">
   <div class="table-caption">Daftar Buku</div>
    <div>
        <div class="table-headerrow">
            <div class="table-headercell">No.</div>
            <div class="table-headercell">Judul</div>
            <div class="table-headercell">Sampul</div>
            <div class="table-headercell">Pengarang</div>
            <div class="table-headercell">Harga</div>
            <div class="table-headercell">Deskripsi</div>
            <div class="table-headercell">Upload</div>
            <div class="table-headercell">Edit</div>
            <div class="table-headercell">Delete</div>
        </div>
            <!-- PHP SELECT -->
            <?php
            // variabel i untuk nomor supaya gak acak nanti urutannya
                $i = 1; 
                $mysqli = "SELECT *FROM buku order by bukuid DESC";
                $query = $kon->query($mysqli);
                while($row = $query->fetch_array()){
            ?>
            <!-- //PHP SELECT -->

            <div class="table-body">
                <div class="table-row">
                    <div class="table-cellrow text-center"><?php echo $i++; ?></div>
                    <div class="table-cellrow"><?php echo $row ['judul'];?></div> <!-- php echonya masukin samping di gambar/,  sampul diambil dari tabel buku -->
                    <div class="table-cellrow"><img class="img-bukudb" src="gambar/<?php echo $row ['foto'];?>"></div> <!-- php echo judul diambil dari tabel buku -->
                    <div class="table-cellrow"><?php echo $row ['pengarang'];?></div> <!-- php echo pengarang -->
                    <div class="table-cellrow">Rp.<?php echo number_format($row ['harga']);?></div> <!-- php echo harga -->
                    <div class="table-cellrow"><div class="data-section"><?php echo $row ['deskripsi'];?></div></div>
                    <div class="table-cellrow"><div class="data-section"><?php echo date('M d, Y h:i A', strtotime($row ['tgl_upload']));?></div></div>
                    <div class="table-cellrow"><a href="admin-editbuku.php?edit=<?php echo $row['bukuid'];?>">Edit</a></div> <!-- edit php -->
                    <div class="table-cellrow"><a href="php/proses-delete.php?delete=<?php echo $row['bukuid'];?>" onclick="return confirm('Anda yakin ingin menghapus buku ini?');">Delete</a></div> <!-- delete php -->
                </div>
            </div>
            <?php
                    }
                    mysqli_close($kon);
            ?>
    </div>
</div>
<!-- //DATABASE BUKU -->

<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
</body>
</html>