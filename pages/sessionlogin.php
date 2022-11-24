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
?>
Anda berhasil login. Silahkan menuju <a href="dashboard.php">HALAMAN HOME</a><br><br>
<a href="session_logout.php">Log out</a>
<?php 
}else {
?>
Anda gagal login. Silahkan <a href="login.php">Login Kembali</a>
<?php 
}
?>