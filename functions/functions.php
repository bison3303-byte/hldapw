<?php 

$conn = mysqli_connect("localhost", "root", "", "db_pembelian");

if (mysqli_connect_errno()) {
    echo "Koneksi gagal".mysqli_connect_error();
}


function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;

    }
    return $rows;
   
}

function tambahData($data){
     global $conn;
    // ambil data dari masing masing elemen dalam form
    $nama = htmlspecialchars($data ["namaproduk"]) ;
    $deskripsi = htmlspecialchars($data ["deskripsi"]) ;
    $harga = htmlspecialchars($data ["harga"]) ;
    $stok = htmlspecialchars($data ["stok"]);
    
    //query insert data
$query = "INSERT INTO produk
        VALUES
        ('', '$nama', '$deskripsi', '$harga', '$stok')
        ";
   mysqli_query($conn, $query);
  
   return mysqli_affected_rows($conn);
}
function hapusData ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
     return mysqli_affected_rows($conn);
}

function updateData($data){
    global $conn;
    // ambil data dari masing masing elemen dalam form
    $id = $data["id"];
    
    $namaproduk = htmlspecialchars($data ["namaproduk"]) ;
    $deskripsi = htmlspecialchars($data ["deskripsi"]) ;
    $harga = htmlspecialchars($data ["harga"]) ;
    $stok = htmlspecialchars($data ["stok"]) ;

    //query insert data
    $query = "UPDATE produk SET 
            
            namaproduk = '$namaproduk',
            deskripsi = '$deskripsi',
            harga = '$harga',
            stok = '$stok'
            WHERE id = $id 
    ";
   mysqli_query($conn, $query);
  
   return mysqli_affected_rows($conn);

}

function register($data){
    global $conn;

    $username = strtolower(stripslashes( $data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  

    //CEK USERNAME APAKAH SUDAH ADA ATAU BELUM
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
                alert('Username sudah terdaftar!');
        </script>
        ";
        return false;
    }

    //CEK KONFIRMASI PASSWORD
    if ($password !== $password2) {
        echo "
        <script>
                alert('konfirmasi password tidak sesuai!');
        </script>
        ";
        return false;
    }

    //enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
   

    //Tambahkan user baru ke dalam database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
   
}

function cari($keyword){
    $query = "SELECT *FROM dataproduk
    WHERE 
    nama LIKE '%$keyword%' OR 
    kode LIKE '%$keyword%' OR 
    harga LIKE '%$keyword%'
    ";

    return query($query);
}
function tambahpelanggan($data){
     global $conn;
    // ambil data dari masing masing elemen dalam form
    
   
    $nama = htmlspecialchars($data ["namapelanggan"]) ;
    $notelp = htmlspecialchars($data ["notelp"]) ;
    $alamat = htmlspecialchars($data ["alamat"]) ;
    


    //query insert data
    $query = "INSERT INTO pelanggan
        VALUES
        ('', '$nama', '$notelp', '$alamat')
        ";
   mysqli_query($conn, $query);
  
   return mysqli_affected_rows($conn);


}
function tambahDataPesanan($data){
    global $conn;
   // ambil data dari masing masing elemen dalam form
   
  
   $harga = htmlspecialchars($data ["hargajual"]) ;
   $laba = htmlspecialchars($data ["laba"]) ;
   $tanggal = ($data["tanggal"]);
   $idproduk = htmlspecialchars($data ["idproduk"]);
 


   //query insert data
$query = "INSERT INTO pesanan
       VALUES
       ('', '$harga', ' $laba', ' $tanggal', '$idproduk')
       ";
  mysqli_query($conn, $query);
 
  return mysqli_affected_rows($conn);
}


function updatePesanan($data){
    global $conn;
    // ambil data dari masing masing elemen dalam form
    $id = $data["id"];
    
    $harga = htmlspecialchars($data ["hargajual"]) ;
    $laba = htmlspecialchars($data ["laba"]) ;
    $idproduk = htmlspecialchars($data ["idproduk"]) ;

    //query insert data
    $query = "UPDATE pesanan SET 
            
        
            hargajual = '$harga',
            laba = '$laba',
            idproduk = '$idproduk'
            WHERE id = $id 
    ";
   mysqli_query($conn, $query);
  
   return mysqli_affected_rows($conn);

}
function hapusPesanan ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM pesanan WHERE id = $id");
     return mysqli_affected_rows($conn);
}
?>
