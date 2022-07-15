<?php
    session_start();
    
    // koneksi database
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['passwordd'];
    $msg = "Login Gagal";

    // mengambil data dari username dan password
    $sql = mysqli_query($kon,"SELECT * FROM user WHERE username='$username' AND passwordd='$password'");

    // validasi data user
    $count = mysqli_num_rows($sql);
    $fetchData = mysqli_fetch_array($sql);

    if ($count > 0) {
            $level = $fetchData['level'];
            // validasi admin
            if($level == "admin"){
                $_SESSION['username'] = $username;
                $_SESSION['passwordd'] = $password;
                echo" <script>
                        alert('Halo Anda berhasil Login sebagai Admin!');
                        window.location.href='../index-admin.php';
                        </script>";

            // validasi user
            }elseif($level == "user") {
                $_SESSION['username'] = $username;
                $_SESSION['passwordd'] = $password;
                echo" <script>
                        alert('Halo Anda berhasil Login sebagai User Bookstore!');
                        window.location.href='../book.php';
                     </script>";
            }    
    }else{
        echo"<script> alert('LOGIN GAGAL!');</script>";
    }
    
?>