<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';

$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM data_sekolah WHERE id=$id");
$row = mysqli_fetch_assoc($res);

if(!$row) {
    echo "Data tidak ditemukan.";
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $angka = mysqli_real_escape_string($conn, $_POST['angka']);
    $icon = mysqli_real_escape_string($conn, $_POST['icon']);
    
    $stmt = mysqli_prepare($conn, "UPDATE data_sekolah SET nama_lengkap=?, angka=?, icon=? WHERE id=?");
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $angka, $icon, $id);
    mysqli_stmt_execute($stmt);
    header('Location: sekolah.php');
    exit;
}

include 'template/header.php';
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Sekolah</h1>
    <a href="sekolah.php" class="btn btn-secondary btn-sm">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" value="<?= htmlspecialchars($row['nama_lengkap']) ?>" required>
        </div>
        <div class="form-group">
          <label>Angka</label>
          <input type="text" name="angka" class="form-control" value="<?= htmlspecialchars($row['angka']) ?>" required>
        </div>
        <div class="form-group">
          <label>Icon (emoji atau class)</label>
          <input type="text" name="icon" class="form-control" value="<?= htmlspecialchars($row['icon']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="sekolah.php" class="btn btn-secondary">Batal</a>
      </form>
    </div>
  </div>
</div>

<?php include 'template/footer.php'; ?>