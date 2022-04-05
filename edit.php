<?php
  require 'functions.php';

  $id = $_GET["id"];

  $buku = query("SELECT * FROM `buku` WHERE `id` = $id")[0];

  if(isset($_POST["submit"])){
    // var_dump(edit($_POST));
    if(edit($_POST) >= 0) {
      echo "
        <script>
          alert('Data berhasil diubah!');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo "
        <script>
          alert('Data gagal diubah!');
          document.location.href = 'index.php';
        </script>
      ";
    }
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap icons -->
  <link
    rel="stylesheet"
    href="icons/bootstrap-icons-1.8.1/bootstrap-icons.css"
  />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Ubah Data Buku</title>
</head>
<body>
  <section class="pt-4">
    <div class="container">
      <div class="row">
        <div class="h3 fw-bold text-center text-primary">
          UBAH DATA BUKU
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-3">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <div id="message"></div>
            <form action="" method="POST">
              <input
                  type="hidden"
                  id="id"
                  name="id"
                  required
                  value="<?= $buku["id"]; ?>"
                />
              <div class="form-group mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input
                  type="text"
                  class="form-control"
                  id="judul"
                  name="judul"
                  placeholder="Judul Buku"
                  required
                  value="<?= $buku["judul"]; ?>"
                />
              </div>
              <div class="form-group mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input
                  type="text"
                  class="form-control"
                  id="penulis"
                  name="penulis"
                  placeholder="Penulis Buku"
                  required
                  value="<?= $buku["penulis"]; ?>"
                />
              </div>
              <div class="form-group mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input
                  type="text"
                  class="form-control"
                  id="penerbit"
                  name="penerbit"
                  placeholder="Penerbit Buku"
                  value="<?= $buku["penulis"]; ?>"
                />
              </div>
              <div class="form-group mb-3">
                <label for="isbn_13" class="form-label">ISBN-13</label>
                <input
                  type="text"
                  class="form-control"
                  id="isbn_13"
                  name="isbn_13"
                  placeholder="Nomor ISBN-13"
                  required
                  value="<?= $buku["isbn_13"]; ?>"
                />
              </div>
              <div class="form-group mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input
                  type="text"
                  class="form-control"
                  id="tahun_terbit"
                  name="tahun_terbit"
                  placeholder="YYYY-MM-DD"
                  value="<?= $buku["tahun_terbit"]; ?>"
                />
              </div>
              <div class="form-group mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input
                  type="text"
                  class="form-control"
                  id="gambar"
                  name="gambar"
                  placeholder="Alamat Gambar"
                  value="<?= $buku["gambar"]; ?>"
                />
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-ubah mt-2">
                  <i class="bi bi-pencil-square text-light"></i>
                  &nbsp;Ubah
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>