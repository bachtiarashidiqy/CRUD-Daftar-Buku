<?php
session_start();
require 'functions.php';

// Check cookie
if (isset($_COOKIE['x']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['x'];
  $key = $_COOKIE['key'];

  // Get email by id
  $result = mysqli_query($mysqli, "SELECT `email` FROM `users` WHERE `id` = $id");
  $row = mysqli_fetch_assoc($result);

  // Chech cookie and email
  if ($key === hash('sha256', $row['email'])) {
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE `email` = '$email'");

  // Check email
  if (mysqli_num_rows($result) === 1) {

    // check password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // Set session
      $_SESSION["login"] = true;

      // Check remember me
      if (isset($_POST['remember'])) {
        // Create cookie
        setcookie('x', $row['id'], time() + 360);
        setcookie('key', hash('sha256', $row['email']), time() + 360);
      }

      header("Location: index.php");
      exit;
    }
  }

  $error = true;
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
  <title>Masuk</title>
</head>

<body>
  <section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <h2 class="text-uppercase text-center text-primary fw-bold mb-4">Masuk</h2>
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">

                <form action="" method="POST">
                  <!-- View error messages -->
                  <?php if (isset($error)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show text-center ${color}" role="alert">
                      <strong>Error!</strong> Email atau password salah.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  <?php endif; ?>
                  <div class="form-outline mb-3">
                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    <label class="form-label" for="email">Email</label>
                  </div>

                  <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="form-check d-flex mb-3">
                    <input class="form-check-input me-2" type="checkbox" value="" id="remember" name="remember" />
                    <label class="form-check-label" for="remember">
                      Ingat saya
                    </label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" name="login" class="btn btn-primary m-2">
                      Masuk
                    </button>
                  </div>

                  <p class="text-center text-muted mt-3 mb-0">
                    Belum memiliki akun?
                    <a href="register.php" class="fw-bold text-body">
                      <u>Daftar</u>
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
  <script src="js/bootstrap.min.js"></script>
</body>

</html>