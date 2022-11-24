<?php 
session_start();
require "../functions/functions.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$result = mysqli_query($conn, "SELECT *FROM user WHERE username = '$username' AND password = '$password' ");
$cek = mysqli_num_rows($result);
      if($cek > 0){
        $data=mysqli_fetch_array($result);
          if($data['jabatan'] == "admin" ){
            $_SESSION['username'] = $username;
            $_SESSION['jabatan'] = "admin";
            header("location:sidenavigationadmin.php");
          }
          else if ($data['jabatan'] == "kasir"){
            $_SESSION['username'] = $username;
            $_SESSION['jabatan'] = "kasir";
            header("location:sidenavigationkasir.php");
          } else {
            header("location:login.php?pesan=gagal");
          }
        
        }

?>

