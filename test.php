<?php
   include 'php/koneksi.php';

   if(isset($_POST['update_update_btn'])){
      $update_value = $_POST['update_quantity'];
      $update_transaksiid = $_POST['update_quantity_transaksiid'];
      $update_quantity_query = mysqli_query($conn, "UPDATE `transaksi` SET quantity = '$update_value' WHERE transaksiid = '$update_transaksiid'");
      if($update_quantity_query){
         header('location:test.php');
      };
   };
   
   if(isset($_GET['remove'])){
      $remove_id = $_GET['remove'];
      mysqli_query($kon, "DELETE FROM `transaksi` WHERE transaksiid = '$remove_transaksiid'");
      header('location:test.php');
   };
   
   if(isset($_GET['delete_all'])){
      mysqli_query($kon, "DELETE FROM `transaksi`");
      header('location:test.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include('php/header.php');
?>
<body>
<!-- NAVIGASI -->
<?php include('php/navigasi.php');?>
<br><br><br><br><br>
<!-- //NAVIGASI -->
<h2>Bottom Modal</h2>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <a class="modal-delete" href="test.php?delete_all" onclick="return confirm('Apakah anda yakin ingin membatalkan semua ini ?');">DELETE</a>
                    <h2>Daftar Belanja</h2>
                </div> <!-- end modal-header -->
                <div class="modal-body">
                        <div>
                                <div class="table-headerrow">
                                    <div class="table-headercell">Judul</div>
                                    <div class="table-headercell">Sampul</div>
                                    <div class="table-headercell">Quantity</div>
                                    <div class="table-headercell">Harga satuan</div>
                                    <div class="table-headercell">Sub total</div>
                                    <div class="table-headercell">Delete</div>
                                </div><!-- end table-headerrow -->
                                <?php 
                                    $select_cart = mysqli_query($kon, "SELECT * FROM `transaksi`");
                                    $grand_total = 0;
                                    if(mysqli_num_rows($select_cart) > 0){
                                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                                ?>
                                <div class="table-body">
                                    <div class="table-row">
                                        <div class="table-cellrow"><?php echo $fetch_cart['judul'];?></div>
                                        <div class="table-cellrow"><img class="img-bukudb" src="gambar/<?php echo $fetch_cart['foto'];?>"></div>
                                        <div class="table-cellrow"><?php echo $fetch_cart['quantity'];?></div>
                                        <div class="table-cellrow"><?php echo $fetch_cart['harga'];?></div>
                                        <form action="" method="post">
                                            <input type="hidden" name="update_quantity_transaksiid" value="<?php echo $fetch_cart['transaksiid'];?>">
                                            <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity'];?>">
                                            <input type="submit" value="update" name="update_update_btn">
                                        </form>
                                    </div><!-- end table-row -->
                                        <div class="table-cellrow">Rp<?php echo $sub_total = number_format($fetch_cart['harga'] * $fetch_cart['quantity']);?></div>
                                        <div class="table-cellrow"><a href="test.php?remove=<?php echo $fetch_cart['transaksiid'];?>" onclick="return confirm('Batal beli?')" class="btn"> <i class="fas fa-trash"></i></a></div>
                                </div><!-- end table-body -->
                                <?php
                                    $grand_total += $sub_total;
                                        };
                                    };
                                ?>
                                <div class="">
                                    <div>Total</div>
                                    <div><?php echo $grand_total;?></div>
                                </div>
                            </div><!-- end table-section -->
                </div>  <!-- div modal-body -->
                <div class="modal-footer">  
                    <h3>Modal Footer</h3>
                </div><!-- end modal-footer -->
    </div> <!-- end modal-content -->
</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>