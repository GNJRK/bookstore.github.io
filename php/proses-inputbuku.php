<?php
include ('koneksi.php');

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tipe_file = $_FILES['foto']['type'];
$tmp_file = $_FILES['foto']['tmp_name'];

$path = "../gambar/".$nama_file;
if($tipe_file == "image/jpg" || $tipe_file == "image/jpeg" || $tipe_file == "image/png"){
  if($ukuran_file <= 1000000){
    if(move_uploaded_file($tmp_file, $path)){
      $query = "INSERT INTO buku (foto, judul, pengarang, harga, deskripsi, tgl_upload) VALUES('$nama_file','$judul','$pengarang','$harga','$deskripsi', NOW())";
      $sql = mysqli_query($kon, $query);
      
      if($sql){
        echo" <script>
                  alert('Buku Berhasil di Upload');
                  window.location.href='../index-admin.php';
              </script>";

      }else{
        echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='../index-admin.php'>Kembali Ke Form</a>";
      }
    }else{
      echo "Maaf, Gambar gagal untuk diupload.";
      echo "<br><a href='../index-admin.php'>Kembali Ke Form</a>";
    }
  }else{
    echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
    echo "<br><a href='../index-admin.php'>Kembali Ke Form</a>";
  }
}else{
  echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
  echo "<br><a href='../index-admin.php'>Kembali Ke Form</a>";
}
?>