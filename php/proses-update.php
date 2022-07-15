<?php
include ('koneksi.php');
// menyimpan data kedalam variabel
if(isset($_POST['update_buku'])){
  $update_b_bukuid = $_POST['update_b_bukuid'];
  $update_b_judul = $_POST['update_b_judul'];
  $update_b_pengarang = $_POST['update_b_pengarang'];
  $update_b_harga = $_POST['update_b_harga'];
  $update_b_deskripsi = $_POST['update_b_deskripsi'];
  $update_b_foto = $_FILES['update_b_foto']['name'];
  $update_b_foto_tmp_name = $_FILES['update_b_foto']['tmp_name'];
  $update_b_foto_folder = 'gambar/'.$update_b_foto;

  $update_query = mysqli_query($kon, "UPDATE buku SET judul = '$update_b_judul', pengarang = '$update_b_pengarang' ,harga = '$update_b_harga', deskripsi = '$update_b_deskripsi', foto = '$update_b_foto' WHERE bukuid = '$update_b_bukuid'");

  if($update_query){
     move_uploaded_file($update_b_foto_tmp_name, $update_b_foto_folder);
     echo" <script>
                alert('Buku berhasil di update');
                window.location.href='../index-admin.php';
            </script>";
  }else{
    echo" <script>
    alert('Buku gagal di update');
    window.location.href='../index-admin.php';
</script>";
  }

}
?>