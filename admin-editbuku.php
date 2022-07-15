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

<?php
   
   if(isset($_GET['edit'])){
      $edit_bukuid = $_GET['edit'];
      $edit_query = mysqli_query($kon, "SELECT * FROM `buku` WHERE bukuid = $edit_bukuid");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

<!-- INPUT BUKU -->
<div class="container-input">
    <h3></h3>
    <div class="input-section">
        <form action="php/proses-update.php" enctype="multipart/form-data" method="post">
        <img src="gambar/<?php echo $fetch_edit['foto'];?>">
        <input type="hidden" height="150" name="update_b_bukuid" value="<?php echo $fetch_edit['bukuid'];?>">
        <div class="row">    
            <div class="col-25">
                <label for="">Judul</label>
            </div>
            <div class="col-75">
                <input type="text" placeholder="Masukkan Judul Buku" required name="update_b_judul" value="<?php echo $fetch_edit['judul'];?>" class="kotak-input text-center">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="">Sampul</label>
            </div>
            <div class="col-75">
                <input type="file" required name="update_b_foto" accept="image/png, image/jpg, image/jpeg" class="kotak-input">
            </div>
        </div>
            <label for="">Pengarang</label>
                <input type="text" required name="update_b_pengarang" value="<?php echo $fetch_edit['pengarang'];?>" placeholder="Masukkan Nama Pengarang/author" class="kotak-input text-center">
            <label for="">Harga</label>
                <input type="text" require name="update_b_harga" value="<?php echo $fetch_edit['harga'];?>" placeholder="Masukkan Harga" class="kotak-input text-center">
            <label for="">Deskripsi</label>
                <textarea require name="update_b_deskripsi" value="<?php echo $fetch_edit['deskripsi'];?>"cols="30" rows="10" class="kotak-input"></textarea>
            
                    <input type="submit" value="Upload" name="update_buku" class="btn-admin btn-input">
                
               
                    <input type="reset" value="Batal" class="btn-admin btn-reset">
                
        </form>
        <?php
                };
            };
        };
        ?>
    </div>
</div>
<!-- //INPUT BUKU -->

<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
</body>
</html>