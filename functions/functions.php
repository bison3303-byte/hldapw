<?php

$conn = mysqli_connect("localhost", "root", "", "db_pembelian");

if (mysqli_connect_errno()) {
  echo "Koneksi gagal" . mysqli_connect_error();
}

function query($query)
{
  global $conn;
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
  // ambil data dari masing masing elemen dalam form


  $nama = htmlspecialchars($data["namaproduk"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $harga = htmlspecialchars($data["harga"]);
  $stok = htmlspecialchars($data["stok"]);
  $tanggal = date('Y-m-d');


  //query insert data
  $query = "INSERT INTO produk
        VALUES
        ('', '$nama', '$deskripsi', '$harga', '$stok', '$tanggal')
        ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusData($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function updateData($data)
{
  global $conn;
  // ambil data dari masing masing elemen dalam form
  $id = $data["id"];

  $namaproduk = htmlspecialchars($data["namaproduk"]);
  $deskripsi = htmlspecialchars($data["deskripsi"]);
  $harga = htmlspecialchars($data["harga"]);
  $stok = htmlspecialchars($data["stok"]);
  $tanggal = date('Y-m-d');

  //query insert data
<<<<<<< HEAD
  $query = "UPDATE produk SET          
=======
  $query = "UPDATE produk SET 
>>>>>>> c36e954cf9239659d71913ea930eb69d1a5d2ab0
            namaproduk = '$namaproduk',
            deskripsi = '$deskripsi',
            harga = '$harga',
            stok = '$stok'
            WHERE id = $id 
    ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function register($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
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

function cari($keyword)
{
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
  $nama = htmlspecialchars($data["namapelanggan"]);
  $notelp = htmlspecialchars($data["notelp"]);
  $alamat = htmlspecialchars($data["alamat"]);

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
  $harga = htmlspecialchars($data["hargajual"]);
  $jumlah = ($data["jumlah"]);
  $idproduk = htmlspecialchars($data["idproduk"]);
  $tanggal = date('Y-m-d');
  $total = $jumlah*$harga;
  

  //query insert data
  $query = "INSERT INTO pesanan
       VALUES
       ('', '$harga', '$idproduk', '$tanggal', '$jumlah', '$total')
       ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function updatePesanan($data)
{
  global $conn;
  // ambil data dari masing masing elemen dalam form
  $id = $data["idproduk"];

  $harga = htmlspecialchars($data["hargajual"]);
  $idproduk = htmlspecialchars($data["idproduk"]);
  $jumlah = ($data["jumlah"]);
  $total = $jumlah*$harga;

  //query insert data
  $query = "UPDATE pesanan SET 
            hargajual = '$harga',
            idproduk = '$idproduk',
            jumlah = '$jumlah',
            total = '$total'
            WHERE idproduk = $id 
    ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
function hapusPesanan($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM pesanan WHERE id = $id");
  return mysqli_affected_rows($conn);
}

function get_data_hari_ini()
{
  $hari_ini = date('Y-m-d');

  $data = query("SELECT SUM(`stok_terjual`) AS terjual, SUM(`stok_sisa`) AS sisa
FROM datapenjualan WHERE tanggal='$hari_ini'
")[0];

  return $data;
}

function get_bulan_hari_ini()
{
  $first_month = date("Y-m-1");
  $last_month = date("Y-m-t", strtotime(date('Y-m-d')));

  $data = query("
SELECT SUM(`stok_terjual`) AS terjual, SUM(`stok_sisa`) AS sisa
FROM datapenjualan WHERE tanggal >= '$first_month' AND tanggal < '$last_month'
")[0];

  return $data;
}

function get_tahun_hari_ini()
{
  $first_year = date("Y-1-1");
  $last_year = date("Y-12-t", strtotime(date("Y-12-d")));


  $data = query("
SELECT SUM(`stok_terjual`) AS terjual, SUM(`stok_sisa`) AS sisa
FROM datapenjualan WHERE tanggal >= '$first_year' AND tanggal < '$last_year'
")[0];


  return $data;
}
