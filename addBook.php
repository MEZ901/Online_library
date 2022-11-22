<?php
  include('main.php');
  if(!isset($_SESSION['firstName'])) header('location: index.php');
  $pageTitle=isset($_GET['id']) ? 'Edit book' : 'Add book';
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
            <h2 class="text-center fw-bold" id="pageTitle"><?=$pageTitle?></h2>
        </header>
        <main>
            <?php if (isset($_SESSION['F-message'])): ?>
                    <div class="alert alert-warning alert-dismissible fade show">
                        <strong>Sorry!</strong>
                        <?php 
                        echo $_SESSION['F-message']; 
                        unset($_SESSION['F-message']);
                        ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                    </div>
			<?php endif ?>
            
            <?php if(isset($_GET['id'])):?>
                <?php
                    global $conn;
                    $id = $_GET["id"];
                    $sql = "select * from book where book_ID = $id";
                    $result = mysqli_query($conn, $sql);

                    while($row = $result->fetch_assoc()){
                        $cover = $row["cover"];
                        $title = $row['title'];
                        $author = $row["author"];
                        $language = $row["language"];
                        $genre = $row["genre"];
                        $publication_date = $row["publication_date"];
                        $price = $row["price"];
                        $description = $row["description"];
                    }
                    $_SESSION['tmpBookCover'] = $cover;
                ?>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column flex-md-row align-items-center  m-auto gap-3" style="width: 60%;">
                        <!-- cover -->
                        <div class="w-100 w-md-50" style="cursor: pointer;">
                            <img id="cstmCover" class="img-thumbnail" src="assets/img/covers/<?= $cover ?>" alt="add cover">
                        </div>
                        <!-- inputs -->
                        <input type="hidden" name="bookId" value="<?= $id ?>">
                        <input name="cover" type="file" class="form-control" id="cover" value="assets/img/covers/<?= $cover ?>" hidden>
                        <div class="p-3 rounded shadow border w-100 w-md-50">
                            <div class="d-block d-md-flex justify-content-between gap-3">
                                <!-- left side -->
                                <div class="w-100 w-md-50">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title:</label>
                                        <input name="bookTitle" type="text" class="form-control" id="title" value="<?= $title ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Language" class="form-label">Language:</label>
                                        <input name="bookLanguage" type="text" class="form-control" id="Language" value="<?= $language ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="publicationDate" class="form-label">Publication date:</label>
                                        <input name="bookPublicationDate" type="number" class="form-control" id="publicationDate" value="<?= $publication_date ?>">
                                    </div>
                                </div>

                                <!-- right side -->
                                <div class="w-100 w-md-50">
                                    <div class="mb-3">
                                        <label for="author" class="form-label">Author:</label>
                                        <input name="bookAuthor" type="text" class="form-control" id="author" value="<?= $author ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="genre" class="form-label">Genre:</label>
                                        <input name="bookGenre" type="text" class="form-control" id="genre" value="<?= $genre ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price:</label>
                                        <input name="bookPrice" type="number" min="0" max="10000" class="form-control" id="price" value="<?= $price ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="bookDescription" id="description" class="form-control" aria-label="With textarea" rows="3"><?= $description ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 d-flex justify-content-center gap-3">
                        <button type="submit" name="editBook" class="btn btn-cstm" style="--bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2.5rem; --bs-btn-font-size: 1rem;">Update</button>
                        <button type="button" class="btn btn-danger" style=" --bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: 1rem;" onclick="window.location.href='books.php';">Cancel</button>
                    </div>
                </form>          
            <?php else : ?>
                <form action="main.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column flex-md-row align-items-center  m-auto gap-3" style="width: 60%;">
                        <!-- cover -->
                        <div class="w-100 w-md-50" style="cursor: pointer;">
                            <img id="cstmCover" class="img-thumbnail" src="assets/img/custom-book-cover" alt="add cover">
                        </div>
                        <!-- inputs -->
                        <div class="p-3 rounded shadow border w-100 w-md-50">
                            <div class="d-block d-md-flex justify-content-between gap-3">
                                <!-- left side -->
                                <div class="w-100 w-md-50">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title:</label>
                                        <input name="bookTitle" type="text" class="form-control" id="title" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Language" class="form-label">Language:</label>
                                        <input name="bookLanguage" type="text" class="form-control" id="Language" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="publicationDate" class="form-label">Publication date:</label>
                                        <input name="bookPublicationDate" type="number" class="form-control" id="publicationDate" value="">
                                    </div>
                                </div>

                                <!-- right side -->
                                <div class="w-100 w-md-50">
                                    <input name="cover" type="file" class="form-control" id="cover" value="" hidden>
                                    <div class="mb-3">
                                        <label for="author" class="form-label">Author:</label>
                                        <input name="bookAuthor" type="text" class="form-control" id="author" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="genre" class="form-label">Genre:</label>
                                        <input name="bookGenre" type="text" class="form-control" id="genre" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price:</label>
                                        <input name="bookPrice" type="number" min="0" max="10000" class="form-control" id="price" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="bookDescription" id="description" class="form-control" aria-label="With textarea" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 d-flex justify-content-center gap-3">
                        <button type="submit" name="addBook" class="btn btn-cstm" style="--bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2.5rem; --bs-btn-font-size: 1rem;">Add</button>
                        <button type="button" class="btn btn-danger" style=" --bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: 1rem;" onclick="window.location.href='books.php';">Cancel</button>
                    </div>
                </form>
            <?php endif ;?>
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