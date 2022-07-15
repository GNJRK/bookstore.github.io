<?php
session_start();
include ('koneksi.php');

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($kon, "DELETE FROM `buku` WHERE bukuid = $delete_id ") or die('query failed');
    if($delete_query){
        echo" <script>
                alert('Buku Berhasil di Hapus');
                window.location.href='../index-admin.php';
                </script>";
    }else{
        echo" <script>
                alert('Buku Gagal di Hapus');
                window.location.href='../index-admin.php';
                </script>";
    };
 };
?>