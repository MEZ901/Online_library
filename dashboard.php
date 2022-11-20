<?php
  include('main.php');
  if(!isset($_SESSION['firstName'])) header('location: index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

  <title>Online Library | dashboard</title>

  <!-- ================== BEGIN core-css ================== -->
  <link rel="stylesheet" href="assets/bootstrap-5.2.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/style.css" />
  <!-- ================== END core-css ==================== -->
</head>

<body>
  <div class="container">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-between">
      <a href="dashboard.php" class="my-2" style="height:35px;width:125px"><img class="logo w-100 h-100" src="assets/img/Logo.png" alt="logo"></a>
        <ul class="navbar-nav d-flex flex-row">
          <li class="nav-item dropdown mx-2">
            <a class="nav-link hidden-arrow" href="#" id="notificationToggle" role="button" data-mdb-toggle="dropdown"
              aria-expanded="false">
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationToggle">
              <li><a class="dropdown-item" href="#">Some news</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="settings.php">settings</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="main.php?logout">log out</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <h2 class="text-center fw-bold">Welcome, <?=$_SESSION['firstName']?>!</h2>
    </header>
    <main>

      <section class="books">
        <div class="booksDivider d-flex align-items-center my-3">
          <p class="text-center mx-3 mb-0">Books</p>
        </div>
        <div class="d-flex justify-content-around gap-3 overflow-hidden">
          <?php showBooks(1) ?>
          <a class="text-black text-decoration-none d-flex align-items-center justify-content-center" href="books.php">show all
            books ...</a>
        </div>
      </section>

      <section class="statistics">
        <div class="booksDivider d-flex align-items-center my-3">
          <p class="text-center mx-3 mb-0">Statistics</p>
        </div>
        <div class="d-flex justify-content-between">
          <div class="bg-cstm rounded my-3 d-flex flex-column justify-content-between" style="width: 30%;">
            <p class="text-white text-center py-2">Total books available</p>
            <p class="text-white text-center fs-1 fw-bold"><?php booksCounter() ?></p>
          </div>
          <div class="bg-cstm rounded my-3 d-flex flex-column justify-content-between" style="width: 30%;">
            <p class="text-white text-center py-2">Total books sold</p>
            <p class="text-white text-center fs-1 fw-bold">0</p>
          </div>
          <div class="bg-cstm rounded my-3 d-flex flex-column justify-content-between" style="width: 30%;">
            <p class="text-white text-center py-2">Total price of books sold</p>
            <p class="text-white text-center fs-1 fw-bold">0$</p>
          </div>
        </div>
      </section>

    </main>
  </div>

  <!-- ================== BEGIN core-js ================== -->
  <!-- <script src="assets/bootstrap-5.2.2/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="assets/script.js"></script>
  <script src="https://kit.fontawesome.com/e29eb6764b.js" crossorigin="anonymous"></script>
  <!-- ================== END core-js ==================== -->
</body>
</html>