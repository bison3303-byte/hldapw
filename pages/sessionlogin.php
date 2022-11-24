<?php 
session_start();
include '../functions/functions.php';
$username = $_POST['username'];
$password =md5($_POST['password']);
$query = mysqli_query($conn, "SELECT * FROM user WHERE 
        username = '$username' AND
        password = '$password' ");

        $cek = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);

        if ($cek) {
            $_SESSION['nama'] = $data ['nama'];
            $_SESSION['username']= $username;
            $_SESSION['level']=$data ['level'];
            header('Location: ../pages/dashboard.php');
        }else {
            header('Location: ../pages/login.php');
        }
?>