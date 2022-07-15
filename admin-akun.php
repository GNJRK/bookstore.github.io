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
<div class="section-login">
    <div class="kotak-login col-4">
        <form action="php/proses-akunadmin.php" method="post">
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
<!-- //INPUT BUKU -->

<div class="table-section">
   <div class="table-caption">Daftar Akun</div>
    <div>
        <div class="table-headerrow">
            <div class="table-headercell">No.</div>
            <div class="table-headercell">Username</div>
            <div class="table-headercell">Password</div>
            <div class="table-headercell">E-Mail</div>
            <div class="table-headercell">Level</div>
            <div class="table-headercell">Edit</div>
            <div class="table-headercell">Delete</div>
        </div>
            <!-- PHP SELECT -->
            <?php
            // variabel i untuk nomor supaya gak acak nanti urutannya
                $i = 1; 
                $mysqli = "SELECT *FROM user order by userid DESC";
                $query = $kon->query($mysqli);
                while($row = $query->fetch_array()){
            ?>
            <!-- //PHP SELECT -->

            <div class="table-body">
                <div class="table-row">
                    <div class="table-cellrow text-center"><?php echo $i++; ?></div>
                    <div class="table-cellrow"><?php echo $row ['username'];?></div> <!-- php echonya masukin samping di gambar/,  sampul diambil dari tabel buku -->
                    <div class="table-cellrow"><?php echo $row ['passwordd'];?></div> <!-- php echo pengarang -->
                    <div class="table-cellrow"><?php echo $row ['email'];?></div> <!-- php echo harga -->
                    <div class="table-cellrow"><?php echo $row ['level'];?></div> <!-- php echo deskripsi -->
                    <div class="table-cellrow"><a href="admin-editakun.php?edit=<?php echo $row['userid'];?>" >Edit</a></div> <!-- edit php -->
                    <div class="table-cellrow"><a href="php/proses-deleteuser.php?delete=<?php echo $row['userid'];?>" onclick="return confirm('Anda yakin ingin menghapus akun ini?');">Delete</a></div> <!-- delete php -->
                </div>
            </div>
            <?php
                    }
            ?>
    </div>
</div>
<!-- //DATABASE BUKU -->

<!-- FOOTER -->
<?php include ('php/footer.php');?>
<!-- //FOOTER -->
