<?php
session_start();
session_destroy();
    echo "Anda berhasil logout, silahkan login kembali
    <a href='login.php'>Halaman Login</a>"
?>