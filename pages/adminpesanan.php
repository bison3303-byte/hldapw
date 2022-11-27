<div class="card-body  pt-0 pb-2">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">ID Produk</th>
        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Nama</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Harga Jual</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Jumlah Order</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Total</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tanggal</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Aksi</th>
        </tr>
      </thead>
      <tbody>
       
        <?php foreach ($dataproduk as $row) :  ?>
          <tr>
              <td class="align-middle text-center">
                <span class="text-secondary font-weight-bold"><?= $row["idproduk"] ?></span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary font-weight-bold"><?= $row["namaproduk"] ?></span>
              </td> 
              <td class="align-middle text-center">
                <span class="text-secondary font-weight-bold"><?= $row["hargajual"] ?></span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary font-weight-bold"><?= $row["jumlah"] ?></span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary font-weight-bold"><?= $row["total"] ?></span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary font-weight-bold"><?php $date =  date_create($row["tanggal"]); echo date_format($date, "d-m-Y"); ?></span>
              </td>
              <td class="align-middle text-center">
                <a href="../action/ubahpesanan.php?id=<?= $row["idproduk"] ?>" class="btn btn-success btn-sm">Ubah</a>
                <a href="../action/hapuspesanan.php?id=<?= $row["idproduk"] ?>" class="btn btn-danger btn-sm" onclick="return confirm ('Anda yakin ingin menghapus data?');">Hapus</a>

              </td>
              </tr>
              </tbody>
              
            <?php endforeach; ?>
            </table>
            </div>
