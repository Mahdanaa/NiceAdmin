<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

      <?php if (session()->getFlashData('success')): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
              <?= session()->getFlashData('success') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php endif; ?>

      <?php if (session()->getFlashData('failed')): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= session()->getFlashData('failed') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      <?php endif; ?>

      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
          Tambah Data
      </button>

<!-- Table with stripped rows -->
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Foto</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $index => $produk): ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td><?= $produk['nama'] ?></td>
                            <td><?= $produk['harga'] ?></td>
                            <td><?= $produk['jumlah'] ?></td>
                            <td>
                                <?php if ($produk['foto'] != '' and file_exists("img/" . $produk['foto'])): ?>
                                    <img src="<?= base_url('img/' . $produk['foto']) ?>" width="100">
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                                    Ubah
                                </button>
                                <a href="<?= base_url('product/delete/' . $produk['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data produk</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
<!-- End Table with stripped rows -->

<?= $this->include('product/modal_add') ?>
<?= $this->include('product/modal_update') ?>

<?= $this->endSection() ?>
