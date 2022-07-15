<?php
   include 'php/koneksi.php';

   if(isset($_POST['update_update_btn'])){
      $update_value = $_POST['update_quantity'];
      $update_transaksiid = $_POST['update_quantity_transaksiid'];
      $update_quantity_query = mysqli_query($conn, "UPDATE `transaksi` SET quantity = '$update_value' WHERE transaksiid = '$update_transaksiid'");
      if($update_quantity_query){
         header('location:modal-cart.php');
      };
   };
   
   if(isset($_GET['remove'])){
      $remove_id = $_GET['remove'];
      mysqli_query($kon, "DELETE FROM `transaksi` WHERE transaksiid = '$remove_transaksiid'");
      header('location:modal-cart.php');
   };
   
   if(isset($_GET['delete_all'])){
      mysqli_query($kon, "DELETE FROM `transaksi`");
      header('location:modal-cart.php');
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
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
                <div class="modal-header">
                    <a href="book.php"><span class="close">&times;</span></a>
                    <h2 class="text-center">Daftar Keranjang</h2>
                </div> <!-- end modal-header -->
                <div class="modal-body">
                <form action="detail-pembayaran.php" ectype="multipart/form-data" method="post">
                        <div>
                                <div class="table-headerrow">
                                    <div class="table-headercell">Judul</div>
                                    <div class="table-headercell">Quantity</div>
                                    <div class="table-headercell">Harga satuan</div>
                                    <div class="table-headercell">Sub total</div>
                                    <div class="table-headercell">Batal</div>
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
                                        <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity'];?>">
                                            <input type="submit" value="update" name="update_update_btn">
                                        <div class="table-cellrow">Rp.<?php echo number_format($fetch_cart['harga']);?></div>
                                        <div class="table-cellrow">Rp. <?php echo $sub_total = number_format($fetch_cart['harga'] * $fetch_cart['quantity']);?></div>
                                        <div class="table-cellrow"><a href="modal-cart.php?remove=<?php echo $fetch_cart['transaksiid'];?>" onclick="return confirm('Batal beli?')" class="btn"> <i class="fas fa-trash"></i></a></div>
                                            <input type="hidden" name="update_quantity_transaksiid" value="<?php echo $fetch_cart['transaksiid'];?>">
 
                </form>
                                    </div><!-- end table-row -->
                                        
                                </div><!-- end table-body -->
                                <?php
                                    $grand_total += $sub_total;
                                        };
                                    };
                                ?>
                                <div class="">
                                    
                                </div>
                            </div><!-- end table-section -->
                </div>  <!-- div modal-body -->
                <div class="modal-footer">  
                    <div>Total: Rp.</div>
                    <div><?php echo number_format($grand_total);?></div>
                    <input type="submit" value="Beli" class="btn"><a class="modal-delete btn btn-danger" href="modal-cart.php?delete_all" onclick="return confirm('Apakah anda yakin ingin membatalkan semua ini ?');">Delete</a>

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