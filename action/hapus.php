<?php 
include "../functions/functions.php";
$id = $_GET["id"];
if (hapusData($id) > 0) {
    echo "
    <script>
            alert('data berhasil dihapus!');
        document.location.href='../pages/DataProduk.php';
    </script>
    ";
} else {
     echo "
    <script>
            alert('data gagal dihapus!');
        document.location.href='DataProduk.php';
    </script>
    ";
}
?>