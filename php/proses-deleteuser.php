<?php

include 'koneksi.php';
// delete
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($kon, "DELETE FROM `user` WHERE userid = $delete_id ") or die('query failed');
    if($delete_query){
        echo" <script>
                alert('User Berhasil di Hapus');
                window.location.href='../admin-akun.php';
                </script>";
    }else{
        echo" <script>
                alert('User Gagal di Hapus');
                window.location.href='../admin-akun.php';
                </script>";
    };
 };
?>