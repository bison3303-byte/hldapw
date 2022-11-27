<div class="card-body pt-0 pb-2">
  <div class="table-responsive p-0">
    <table class="table align-items-center mb-0">
      <thead>
        <tr>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">ID</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Nama Produk</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Deskrispi</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Harga Jual Satuan</th>
          <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Stok Barang</th>
          <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Tanggal</th>
          <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($dataproduk as $row) :  ?>
          <tr>
            <td class="text-center">
              <div class="d-flex flex-column justify-content-center">
                <h5 class="mb-0 text-sm"><?= $i; ?></h5>
              </div>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["namaproduk"] ?></span>
            </td>
            <td>
              <p class="align-middle text-center "><?= $row["deskripsi"] ?></p>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["harga"] ?></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["stok"] ?></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary font-weight-bold"><?= $row["tanggal"] ?></span>
            </td>
            <td class="align-middle text-center">
              <a href="../action/ubah.php?id=<?= $row["id"] ?>" class="btn btn-danger btn-sm">Ubah</a>
              <a href="../action/hapus.php?id=<?= $row["id"] ?>" class="btn btn-success btn-sm" onclick="return confirm ('Anda yakin ingin menghapus data?');">Hapus</a>
            </td>
          </tr>
      </tbody>
      <?php $i++; ?>
    <?php endforeach; ?>
    </table>
  </div>
