<?php
session_start();
// Check session
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require "functions.php";
$buku = query("SELECT * FROM buku");

// Check if anyone presses the search button
if (isset($_POST['find'])) {
  $buku = find($_POST['keyword']);
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="icons/bootstrap-icons-1.8.1/bootstrap-icons.css">
  <title>Daftar Buku</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
      <a class="navbar-brand" href="">DAFTAR BUKU</a>
      <button class="navbar-toggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="p-5">
    <div class="row ps-4 pe-4 pt-5">
      <div class="col-md-9">
        <form action="" method="POST" class="col-md-5 d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" name="keyword" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit" name="find">Search</button>
        </form>
      </div>
      <div class="col-2 col-md-3 pe-3">
        <button type="submit" class="btn btn-primary btn-tambah mt-2 float-end" onclick="window.location.href = 'add.php';">
          <i class="bi bi-plus-square-fill text-light"></i>
          &nbsp;Tambah
        </button>
      </div>
    </div>
    <div class="row mt-4 ps-4 pe-4">
      <div id="table" class="col-md-12">
        <table class="table table-bordered border-secondary table-hover text-center align-middle">
          <thead>
            <tr class="table-info align-middle">
              <th scope="col" style="width: 5% ">No</th>
              <th scope="col" style="width: 13%">Gambar</th>
              <th scope="col" style="width: 20%">Judul</th>
              <th scope="col" style="width: 13%">Penulis</th>
              <th scope="col" style="width: 13%">Penerbit</th>
              <th scope="col" style="width: 13%">Tahun Terbit</th>
              <th scope="col" style="width: 13%">ISBN-13</th>
              <th scope="col" colspan="2" style="width: 10%">Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <!-- Display data from database to table on a website -->
            <?php $i = 1 ?>
            <?php foreach ($buku as $row) : ?>
              <tr>
                <th scope="row"><?php echo $i ?></th>
                <td>
                  <img src="images/<?php echo $row["gambar"] ?>" alt="<?php echo $row["judul"] ?>" width="50">
                </td>
                <td><?php echo $row["judul"] ?></td>
                <td><?php echo $row["penulis"] ?></td>
                <td><?php echo $row["penerbit"] ?></td>
                <td><?php echo $row["tahun_terbit"] ?></td>
                <td><?php echo $row["isbn_13"] ?></td>
                <td>
                  <a href="edit.php?id=<?= $row["id"]; ?>">
                    <i class="bi bi-pencil-square text-warning"></i>
                  </a>
                </td>
                <td>
                  <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">
                    <i class="bi bi-trash text-danger"></i>
                  </a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <!-- Bootstarp Min JS -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>