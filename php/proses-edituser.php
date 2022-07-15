
<?php

include 'koneksi.php';
// update
// menyimpan data kedalam variabel
if(isset($_POST['update_user'])){
  $update_u_id = $_POST['update_u_id'];
  $update_u_username = $_POST['update_u_username'];
  $update_u_password = $_POST['update_u_passwordd'];
  $update_u_email = $_POST['update_u_email'];
  $update_u_level = $_POST['update_u_level'];

  $update_query = mysqli_query($kon, "UPDATE user SET username = '$update_u_username', passwordd = '$update_u_password' , email = '$update_u_email', level = '$update_u_level'");

  if($update_query){
     echo" <script>
                alert('User berhasil di update');
                window.location.href='admin-akun.php';
            </script>";
  }else{
    echo" <script>
    alert('user gagal di update');
    window.location.href='admin-akun.php';
</script>";
  }

}
?>