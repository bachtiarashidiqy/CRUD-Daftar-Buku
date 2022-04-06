<?php
session_start();
// Check session
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require '../functions.php';

$id = $_GET["id"];

if (delete($id) > 0) {
	echo "
		<script>
			alert('Data berhasil dihapus!');
			document.location.href = '../index.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('Data gagal ditambahkan!');
			document.location.href = '../index.php';
		</script>
	";
}
