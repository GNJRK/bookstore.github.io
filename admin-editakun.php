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
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($kon, "SELECT * FROM `user` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

<!-- INPUT BUKU -->
<div class="container-input">
    <h3></h3>
    <div class="input-section">
        <form action="php/proses-edituser.php" enctype="multipart/form-data" method="post">
        <input type="hidden" height="150" name="update_b_id" value="<?php echo $fetch_edit['id'];?>">
        <div class="row">    
            <div class="col-25">
                <label for="">Username</label>
            </div>
            <div class="col-75">
                <input type="text" placeholder="Masukkan username" required name="update_u_username" value="<?php echo $fetch_edit['username'];?>" class="kotak-input text-center">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="">Password</label>
            </div>
            <div class="col-75">
            <input type="text" required name="update_u_passwordd" value="<?php echo $fetch_edit['passwordd'];?>" placeholder="Masukkan Password" class="kotak-input text-center">
            </div>
        </div>
            <label for="">E-mail</label>
                <input type="text" required name="update_u_email" value="<?php echo $fetch_edit['email'];?>" placeholder="Masukkan E-mail" class="kotak-input text-center">
            <label for="">Level</label>
                <input type="text" require name="update_u_level" value="<?php echo $fetch_edit['level'];?>" placeholder="Level user" class="kotak-input text-center">
                <div class="row">
                    <input type="submit" value="Upload" name="update_user" class="btn-admin btn-input">
                </div>
                <div class="row">
                    <input type="reset" value="Batal" class="btn-admin btn-reset">
                </div>
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