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

<div class="table-section">
   <div class="table-caption">Daftar Transaksi</div>
    <div>
        <div class="table-headerrow">
            <div class="table-headercell">No.</div>
            <div class="table-headercell">No Transaksi</div>
            <div class="table-headercell">User</div>
            <div class="table-headercell">Buku</div>
            <div class="table-headercell">Quantity</div>
            <div class="table-headercell">Total</div>
            <div class="table-headercell">Tanggal Transaksi</div>
            <div class="table-headercell">Edit</div>
            <div class="table-headercell">Delete</div>
        </div>
            <!-- PHP SELECT -->
            <?php
            // variabel i untuk nomor supaya gak acak nanti urutannya
                $i = 1; 
                $mysqli = "SELECT *FROM detail_transaksi order by transaksiid DESC";
                $query = $kon->query($mysqli);
                while($row = $query->fetch_array()){
            ?>
            <!-- //PHP SELECT -->

            <div class="table-body">
                <div class="table-row">
                    <div class="table-cellrow text-center"><?php echo $i++; ?></div>
                    <div class="table-cellrow"><?php echo $row ['no_transaksi'];?></div> 
                    <div class="table-cellrow"><?php echo $row ['id_user'];?></div>
                    <div class="table-cellrow"><?php echo $row ['id_buku'];?></div> 
                    <div class="table-cellrow"><?php echo $row ['quantity'];?></div> 
                    <div class="table-cellrow"><?php echo $row ['total'];?></div> 
                    <div class="table-cellrow"><?php echo date('M d, Y h:i A', strtotime($row ['tgl_transaksi']));?></div> 
                    <div class="table-cellrow"><a href="php/proses-update.php">Edit</a></div> <!-- edit php -->
                    <div class="table-cellrow"><a href="php/proses-delete.php">Delete</a></div> <!-- delete php -->
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