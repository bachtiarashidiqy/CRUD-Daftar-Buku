<?php   
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'daftar_buku';

  // Connect database
  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );

  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  function query($query) {
    global $mysqli;
    $result = mysqli_query($mysqli, $query);
    $rows =[];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
  }
  
  function add($data)
  {
    global $mysqli;

    $judul = htmlspecialchars($data["judul"]);
    $penulis = htmlspecialchars($data["penulis"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $isbn_13 = htmlspecialchars($data["isbn_13"]);
    $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `isbn_13`, `gambar`) 
              VALUES (NULL, '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn_13', '$gambar')";
    mysqli_query($mysqli, $query);

    return mysqli_affected_rows($mysqli);
  }

  function delete($id) {
    global $mysqli;
    mysqli_query($mysqli, "DELETE FROM buku WHERE id = $id");
    return mysqli_affected_rows($mysqli);
  }
