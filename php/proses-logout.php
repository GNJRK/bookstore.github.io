<?php
    session_start();
    session_destroy();
    echo" <script>
                alert('Anda Berhasil Logout');
                window.location.href='../index.php';
            </script>";
?>