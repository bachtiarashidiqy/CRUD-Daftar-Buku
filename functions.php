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
  echo 'Errno: ' . $mysqli->connect_errno;
  echo '<br>';
  echo 'Error: ' . $mysqli->connect_error;
  exit();
}

function query($query)
{
  global $mysqli;
  $result = mysqli_query($mysqli, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function add($data)
{
  global $mysqli;

  $title = htmlspecialchars($data["title"]);
  $writer = htmlspecialchars($data["writer"]);
  $publisher = htmlspecialchars($data["penerbit"]);
  $isbn_13 = htmlspecialchars($data["isbn_13"]);
  $year = htmlspecialchars($data["year"]);
  // $image = htmlspecialchars($data["gambar"]);

  $image = upload();
  if (!$image) {
    return false;
  }

  $query = "INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `isbn_13`, `gambar`) 
              VALUES (NULL, '$title', '$writer', '$publisher', '$year', '$isbn_13', '$image')";
  mysqli_query($mysqli, $query);

  return mysqli_affected_rows($mysqli);
}

function upload()
{
  $fileName = $_FILES['image']['name'];
  $fileSize = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $tmpName = $_FILES['image']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
          alert('Pilih gambar terlebih dahulu!');
          </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $validImgExtension = ['jpg', 'jpeg', 'png'];
  $imgExtension = explode('.', $fileName);
  $imgExtension = strtolower(end($imgExtension));
  if (!in_array($imgExtension, $validImgExtension)) {
    echo "<script>
          alert('Ekstensi file salah!');
          </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($fileSize > 1500000) {
    echo "<script>
          alert('Ukuran gambar terlalu besar!');
          </script>";
    return false;
  }

  // generate nama gambar baru
  $newFileName = uniqid();
  $newFileName .= '.';
  $newFileName .= $imgExtension;

  move_uploaded_file($tmpName, 'images/' . $newFileName);

  return $newFileName;
}

function delete($id)
{
  global $mysqli;
  mysqli_query($mysqli, "DELETE FROM buku WHERE id = $id");
  return mysqli_affected_rows($mysqli);
}

function edit($data)
{
  global $mysqli;

  $id = $data["id"];
  $title = htmlspecialchars($data["title"]);
  $writer = htmlspecialchars($data["writer"]);
  $publisher = htmlspecialchars($data["publisher"]);
  $isbn_13 = htmlspecialchars($data["isbn_13"]);
  $year = htmlspecialchars($data["year"]);
  $oldImg = htmlspecialchars($data["old_image"]);

  if ($_FILES['image']['error'] === 4) {
    $image = $oldImg;
  } else {
    $image = upload();
  }

  $query = "UPDATE `buku` SET 
             `judul` = '$title', 
             `penulis` = '$writer', 
             `penerbit` = '$publisher', 
             `tahun_terbit` = '$year', 
             `isbn_13` = '$isbn_13', 
             `gambar` = '$image' 
             WHERE `buku`.`id` = $id";

  mysqli_query($mysqli, $query);

  return mysqli_affected_rows($mysqli);
}

function find($keyword)
{
  $query = "SELECT * FROM `buku` WHERE 
              `judul` LIKE '%$keyword%' OR 
              `penulis` LIKE '%$keyword%' OR 
              `penerbit` LIKE '%$keyword%' OR 
              `tahun_terbit` LIKE '%$keyword%' OR 
              `isbn_13` LIKE '%$keyword%' OR 
              `gambar` LIKE '%$keyword%'
              ";

  return query($query);
}

function registration($data)
{
  global $mysqli;

	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($mysqli, $data["password"]);
	$password2 = mysqli_real_escape_string($mysqli, $data["password2"]);

  
	$result = mysqli_query($mysqli, "SELECT `email` FROM `users` WHERE `email` = '$email'");
  
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('email sudah terdaftar!')
		      </script>";
		return false;
	}

	// Check password confirmation
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
  }

	// Password encryption
	$password = password_hash($password, PASSWORD_DEFAULT);

  $queryadd = "INSERT INTO `users` (`id`, `email`, `password`)
            VALUES(NULL, '$email', '$password')";

	// Add a new user to the database
	mysqli_query($mysqli, $queryadd);

	return mysqli_affected_rows($mysqli);
}