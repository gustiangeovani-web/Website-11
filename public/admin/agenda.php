<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';
include 'template/header.php';

$agenda = mysqli_query($conn, "SELECT * FROM agenda ORDER BY tanggal DESC");
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Agenda</h1>
    <a href="agenda_add.php" class="btn btn-primary btn-sm shadow-sm">
      <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Agenda
    </a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar Agenda</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr align="center">
              <th>No</th>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1;
          while($a = mysqli_fetch_assoc($agenda)):
          ?>
            <tr>
              <td align="center"><?= $no++ ?></td>
              <td><?= htmlspecialchars($a['judul']) ?></td>
              <td align="center"><?= date('d M Y', strtotime($a['tanggal'])) ?></td>
              <td align="center">
                <a href="agenda_edit.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="agenda_delete.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-danger"
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