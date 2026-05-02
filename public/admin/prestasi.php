<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';
include 'template/header.php';

$prestasi = mysqli_query($conn, "SELECT * FROM prestasi ORDER BY id DESC");
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Prestasi</h1>
    <a href="prestasi_add.php" class="btn btn-primary btn-sm shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Prestasi
    </a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Prestasi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr align="center">
              <th>No</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          while($p = mysqli_fetch_assoc($prestasi)):
          ?>
            <tr>
              <td align="center"><?= $no++ ?></td>
              <td><?= htmlspecialchars($p['kategori']) ?></td>
              <td align="center"><?= $p['jumlah'] ?></td>
              <td align="center">
                <a href="prestasi_edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="prestasi_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger"
                   onclick="return confirm('Yakin ingin menghapus?')">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php'; ?>