<?php
    include "koneksi.php";

    $id = $_GET["transaksi"];
    $sql = "SELECT *FROM 'transaksi' WHERE 'transaksiid' ="$id;
    $query = mysqli_query($kon, $sql);
    $hasil = mysqli_fetch_object($query);

    $_SESSION[$id] = [
        "judul" => $fetch_buku->judul;
        "harga" => $fetch_buku->harga;
        "quantity" => 1;
    ];

    header("location:../modal-cart.php");
?>