<?php
session_start();
// Check session
if (isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}

require '../functions.php';

if(isset($_POST["register"])) {

	if(registration($_POST) > 0) {
		echo "<script>
				alert('User baru berhasil ditambahkan!');
        document.location.href = 'login.php';
			  </script>";
	} else {
		echo mysqli_error($mysqli);
	}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="../icons/bootstrap-icons-1.8.1/bootstrap-icons.css">
  <title>Register</title>
</head>

<body>
  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <h2 class="text-uppercase text-center text-primary fw-bold mb-4">Buat Akun</h2>
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-4">

                <form action="" method="POST">
                  <div class="form-outline mb-3">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="password" id="password2" name="password2" class="form-control form-control-lg" />
                    <label class="form-label" for="password2">Konfirmasi password</label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" name="register" class="btn btn-primary btn-tambah m-2">
                      Daftar
                    </button>
                  </div>

                  <p class="text-center text-muted mt-3 mb-0">
                    Sudah memiliki akun? 
                    <a href="login.php" class="fw-bold text-body">
                      <u>Masuk</u>
                    </a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Bootstarp Min JS -->
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>