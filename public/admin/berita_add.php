<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $isi = $_POST['isi'];
    $gambar_utama = '';

    if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK){
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $nama_file = 'thumb_' . time() . '.' . $ext;
        if (!file_exists(__DIR__ . '/upload')) {
            mkdir(__DIR__ . '/upload', 0777, true);
        }
        if(move_uploaded_file($_FILES['gambar']['tmp_name'], __DIR__ . '/upload/' . $nama_file)){
            $gambar_utama = $nama_file;
        }
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO berita (judul, kategori, isi, gambar, tanggal) VALUES (?, ?, ?, ?, NOW())");
    mysqli_stmt_bind_param($stmt, "ssss", $judul, $kategori, $isi, $gambar_utama);
    
    if(mysqli_stmt_execute($stmt)){
        echo "<script>alert('Berita Berhasil Terbit!'); window.location='berita.php';</script>";
        exit;
    }
}

include 'template/header.php';
?>

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Berita</h1>
    <a href="berita.php" class="btn btn-secondary btn-sm">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Judul Berita</label>
          <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <input type="text" name="kategori" class="form-control">
        </div>
        <div class="form-group">
          <label>Gambar Cover</label>
          <input type="file" name="gambar" class="form-control-file" accept="image/*">
        </div>
        <div class="form-group">
          <label>Isi Berita</label>
          <textarea name="isi" id="isi" class="form-control" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> Terbitkan Berita
        </button>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('isi');
</script>

<?php include 'template/footer.php'; ?>