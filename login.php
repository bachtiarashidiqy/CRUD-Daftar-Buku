<?php 
  // Check if the submit button has been pressed
  if(isset($_POST["submit"])) {
    if($_POST["email"]== "admin@bukuku.com" && $_POST["password"] == "admin") {
      header("Location: index.php");
      exit;
    } else {
      $error = true;
    }
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
    <!-- CSS -->
    <link href="css/login.css" rel="stylesheet">
    <title>Daftar Buku</title>
</head>
<body>
<main class="form-signin">
  <form action="" method="POST">
    <div class="text-center">
        <svg class="bi bi-book text-primary mb-2" width="64" height="64" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
        <h1 class="h3 mb-3 fw-normal">Login Admin</h1>
    </div>
    <!-- View error messages -->
    <?php if(isset($error)) : ?>
      <div
        class="alert alert-success alert-dismissible fade show text-center ${color}"
        role="alert"
        >
        <strong>Error!</strong> Email atau password salah.
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
        ></button>
      </div>
    <?php endif; ?>  
    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      <label for="email">Alamat email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="password">Kata sandi</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign in</button>
  </form>
</main>
<!-- Bootstrap Min JS -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>