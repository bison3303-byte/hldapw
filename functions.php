<?php

$conn = mysqli_connect("localhost", "root", "", "db_pembelian");
if (mysqli_connect_errno()) {
  echo "Koneksi gagal" . mysqli_connect_error();
}

function sanitizeInput($data){ // Memastikan input aman.
  global $conn;

  $data = stripslashes($data);
  $data = mysqli_real_escape_string($conn, $data);
  $data = htmlspecialchars($data, ENT_SUBSTITUTE, 'utf-8', TRUE);
  $data = strip_tags($data);
  
  return $data;
}

function checkNumericInput($id){
  if (is_numeric($id) && ((int)$id == $id) && preg_match("/^[0-9]+$/", $id)){
    return true;
  }
  return false;
}

function preventNegative($id){
  $id = max((int)$id, 0);
  return $id;
}

function query($query)
{
  global $conn;

  $query = sanitizeInput($query);
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahData($data)
{
  global $conn;
  if (checkNumericInput($data["harga"]) === checkNumericInput($data["stok"])){
    // Ambil data dari HTTP request (POST)
    $nama = sanitizeInput($data["namaproduk"]);
    $deskripsi = sanitizeInput($data["deskripsi"]);
    $harga = sanitizeInput($data["harga"]);
    $stok = sanitizeInput($data["stok"]);

    //query insert data
    $query = "INSERT INTO produk
        ( namaproduk, deskripsi, harga, stok )
        VALUES
        ( \"$nama\", \"$deskripsi\", \"$harga\", \"$stok\")
        ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }
  return false;
}

function hapusData($id)
{
  global $conn;
  if (checkNumericInput($id) === true){
    $id = sanitizeInput($id); // idk why. but FUCK_OFF malicious input
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
    
    return mysqli_affected_rows($conn);
  }
  // Throw error here
  return false;
}

function updateData($data)
{
  global $conn;
  // ambil data dari masing masing elemen dalam form
  $id = $data["id"];

  if (checkNumericInput($id) === true){

    $namaproduk = sanitizeInput($data["namaproduk"]);
    $deskripsi = sanitizeInput($data["deskripsi"]);
    $harga = max((int)$data["harga"], 0);
    $stok = max((int)$data["stok"], 0);

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
  // Throw error here
  return false;
}

function register($data)
{
  global $conn;

  $username = sanitizeInput( strtolower(stripslashes($data["username"])) );
  $password = sanitizeInput($conn, $data["password"]);
  $password2 = sanitizeInput($conn, $data["password2"]);


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

  //enskripsi password engkripsyen kah?
  $password = password_hash($password, PASSWORD_DEFAULT);


  //Tambahkan user baru ke dalam database
  mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $keyword = sanitizeInput($keyword);
  $query = "SELECT *FROM dataproduk
    WHERE 
    nama LIKE '%$keyword%' OR 
    kode LIKE '%$keyword%' OR 
    harga LIKE '%$keyword%'
    ";

  return query($query);
}
function tambahpelanggan($data)
{
  global $conn;
  // ambil data dari masing masing elemen dalam form

  $nama = sanitizeInput($data["namapelanggan"]);
  $notelp = sanitizeInput($data["notelp"]);
  $alamat = sanitizeInput($data["alamat"]);



  //query insert data
  $query = "INSERT INTO pelanggan
        VALUES
        ('', '$nama', '$notelp', '$alamat')
        ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function tambahDataPesanan($data)
{
  global $conn;
  // ambil data dari masing masing elemen dalam form

  $harga = sanitizeInput($data["hargajual"]);
  $laba = sanitizeInput($data["laba"]);
  $tanggal = $data["tanggal"];
  $idproduk = sanitizeInput($data["idproduk"]);

  //query insert data
  $query = "INSERT INTO pesanan
       VALUES
       ('', '$harga', ' $laba', ' $tanggal', '$idproduk')
       ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function updatePesanan($data)
{
  global $conn;
  // ambil data dari masing masing elemen dalam form
  $id = $data["id"];
  if (checkNumericInput($id) === true){

    $harga = sanitizeInput($data["hargajual"]);
    $laba = sanitizeInput($data["laba"]);
    $idproduk = sanitizeInput($data["idproduk"]);

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
  return false;
}

function hapusPesanan($id)
{
  global $conn;
  if (checkNumericInput($id) === true){
    mysqli_query($conn, "DELETE FROM pesanan WHERE id = $id");
    return mysqli_affected_rows($conn);
  }
  return false;
}
