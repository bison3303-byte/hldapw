<div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Barang</th>
                      <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Harga Jual</th>
                      <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Laba</th>
                      <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Tanggal</th>
                      <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataproduk as $row) :  ?>
                      <tr>
                        <td>
                          <div class="d-flex flex-column justify-content-center">
                            <h5 class="mb-0 text-sm"><?= $i; ?></h5>
                          </div>
                        </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary font-weight-bold"><?= $row["hargajual"] ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary font-weight-bold"><?= $row["laba"] ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary font-weight-bold"><?= $row["tanggal"] ?></span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="../action/ubahpesanan.php?id=<?= $row["id"] ?>" class="btn btn-danger btn-sm">Ubah</a>
                          <a href="../action/hapuspesanan.php?id=<?= $row["id"] ?>" class="btn btn-success btn-sm" onclick="return confirm ('Anda yakin ingin menghapus data?');">Hapus</a>

                        </td>
                        </tr>
                        </tbody>
                        <?php $i++; ?>
                        <?php endforeach; ?>
              </table>
            </div>