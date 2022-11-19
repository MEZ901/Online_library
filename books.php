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

    <title>Online Library | All Books</title>

    <!-- ================== BEGIN core-css ================== -->
    <link rel="stylesheet" href="assets/bootstrap-5.2.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/style.css" />
    <!-- ================== END core-css ==================== -->
</head>

<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white justify-content-between">
                <img class="logo mt-2 mb-2" src="assets/img/Logo.png" alt="logo">
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item dropdown">
                        <a class="nav-link hidden-arrow" href="#" id="notificationToggle" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
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
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="settings.php">settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="main.php?logout">log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="d-flex justify-content-between my-3">
                <h2 class="fw-bold">All books</h2>
                <button type="button" class="btn btn-cstm" onclick="window.location.href='addBook.php';"><i class="fa fa-plus" aria-hidden="true"></i> Add book</button>
            </div>
        </header>
        <main>
            <?php if (isset($_SESSION['book_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Success!</strong>
                    <?php 
                    echo $_SESSION['book_message']; 
                    unset($_SESSION['book_message']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                </div>
			<?php endif ?>

            <section class="d-flex justify-content-around flex-wrap gap-3 overflow-hidden my-3">
                <?php showBooks(0) ?>
            </section>

            <div class="modal fade" id="bookInfo" tabindex="-1" aria-labelledby="bookInfo" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-cstm">
                            <h1 class="modal-title fs-5 text-white" id="modal-title">Crime and Punishment</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="fw-bold">Author : <span class="fw-normal" id="modal-author">Fyodor Dostoevsky</span></p>
                            <p class="fw-bold">Price : <span class="fw-normal" id="modal-price">13$</span></p>
                            <p class="fw-bold">Language : <span class="fw-normal" id="modal-language">Russian</span></p>
                            <p class="fw-bold">Genre : <span class="fw-normal" id="modal-genre">Literary fiction</span></p>
                            <p class="fw-bold">Publication date : <span class="fw-normal" id="modal-publication-date">1866</span></p>
                            <p class="fw-bold">Description : <span class="fw-normal" id="modal-description">Crime and Punishment is a novel by the Russian author Fyodor Dostoevsky. It was first published in the literary journal The Russian Messenger in twelve monthly installments during 1866. It was later published in a single volume.</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-regular fa-trash-can"></i> Delete</button>
                            <button type="button" class="btn btn-cstm"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
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