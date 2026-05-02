<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
include 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $jumlah = intval($_POST['jumlah']);
    $stmt = mysqli_prepare($conn, "INSERT INTO prestasi (kategori, jumlah) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "si", $kategori, $jumlah);
    mysqli_stmt_execute($stmt);
    header('Location: prestasi.php');
    exit;
}

include 'template/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Tambah Prestasi</h1>
<div class="card shadow mb-4">
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <label>Kategori Prestasi</label>
        <select name="kategori" class="form-control" required>
          <option value="">-- Pilih Kategori --</option>
          <option value="Akademik">Akademik</option>
          <option value="Non Akademik">Non Akademik</option>
          <option value="Prestasi Sekolah">Prestasi Sekolah</option>
        </select>
      </div>
      <div class="form-group">
        <label>Jumlah Prestasi</label>
        <input type="number" name="jumlah" class="form-control" required>
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="prestasi.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>

<?php include 'template/footer.php'; ?>