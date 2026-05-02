<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$_SESSION['admin'] = 'admin11';
include 'config.php';
include 'template/header.php';
?>
<h1>Test Berhasil</h1>
<?php include 'template/footer.php'; ?>

<?php
echo "Hello World";
?>