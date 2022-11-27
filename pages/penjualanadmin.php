<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>No</td>
        <td>Barang</td>
        <tbody>
            <?php
            include "../functions/functions.php";
            $no=0;
            $query=mysqli_query($conn, "SELECT *FROM produk ORDER BY namaproduk");
            echo '<select name="idproduk" required>';
            echo '<option value="">...</option>';
            while($rowbar=mysqli_fetch_array($query)){
                echo '<option value="'.$rowbar['id'].'">'.$rowbar['namaproduk'].'</option>';   
            }
            echo '</select>';
            ?>
        </tbody>
    </tr>


    </table>
    <?php
    
    $data = mysqli_query($conn, "SELECT *FROM pesanan");
    $hasil = 0;
    while($tampil = mysqli_fetch_array($data)){
        $hasil += $tampil["total"];
    ?>
    <tr>
        <td>Rp. <?php echo number_format($tampil["total"]); ?> </td>
    </tr>
    <?php } ?> 
    <tr>
        <td>Total</td>
        <td><?php echo $hasil; ?></td>

    </tr>


</body>
</html>