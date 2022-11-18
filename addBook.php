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

    <title>Online Library | Add Book</title>

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
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="settings.html">settings</a></li>
                      <li>
                        <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="main.php?logout">log out</a></li>
                    </ul>
                  </li>
                </ul>
            </nav>
            <h2 class="text-center fw-bold">Add book</h2>
        </header>
        <main>
            <section>
                <?php if (isset($_SESSION['book_message'])): ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong>Sorry!</strong>
                        <?php 
                        echo $_SESSION['book_message']; 
                        unset($_SESSION['book_message']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                    </div>
			    <?php endif ?>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                    <div class="d-block d-md-flex justify-content-between gap-5">
                        <div class="leftSide w-100 w-md-50">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input name="bookTitle" type="text" class="form-control" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="Language" class="form-label">Language:</label>
                                <input name="bookLanguage" type="text" class="form-control" id="Language">
                            </div>
                            <div class="mb-3">
                                <label for="genre" class="form-label">Genre:</label>
                                <input name="bookGenre" type="text" class="form-control" id="genre">
                            </div>
                            <div class="mb-3">
                                <label for="publicationDate" class="form-label">Publication date:</label>
                                <input name="bookPublicationDate" type="number" class="form-control" id="publicationDate">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price:</label>
                                <input name="bookPrice" type="number" min="0" max="10000" class="form-control" id="price">
                            </div>
                        </div>

                        <div class="rightSide w-100 w-md-50">
                            <div class="mb-3">
                                <label for="cover" class="form-label">Cover:</label>
                                <input name="cover" type="file" class="form-control" id="cover">
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author:</label>
                                <input name="bookAuthor" type="text" class="form-control" id="author">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="bookDescription" id="description" class="form-control" aria-label="With textarea" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <button type="submit" name="addBook" class="btn btn-cstm" style="--bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2.5rem; --bs-btn-font-size: 1rem;">Add</button>
                        <button type="button" class="btn btn-danger" style=" --bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: 1rem;" onclick="window.location.href='books.html';">Cancel</button>
                    </div>
                </form>
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