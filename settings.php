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

    <title>Online Library | Settings</title>

    <!-- ================== BEGIN core-css ================== -->
    <link rel="stylesheet" href="assets/bootstrap-5.2.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/style.css" />
    <!-- ================== END core-css ==================== -->
</head>

<body>
    <div class="container">
        <header>
            <h2 class="text-center mt-5 fw-bold">Settings</h2>
        </header>
        <main>
            <section>
                <div class="h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1 mt-5">

                                        <form class="mx-1 mx-md-4">

                                            <div class="d-flex gap-2">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-floating flex-fill mb-0">
                                                        <input name="newFname" type="text" id="settings-fname" class="form-control" placeholder="First Name" value="<?= $_SESSION['firstName'] ?>" />
                                                        <label class="form-label text-muted" for="settings-fname">First Name</label>
                                                    </div>
                                                </div>

                                                <div class="form-floating flex-fill mb-0">
                                                    <input name="newLname" type="text" i d="settings-lname" class="form-control" placeholder="Last Name" value="<?= $_SESSION['lastName'] ?>" />
                                                    <label class="form-label text-muted" for="settings-lname">Last Name</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-floating flex-fill mb-0">
                                                    <input name="newEmail" type="email" id="settings-email" class="form-control" placeholder="Your Email" value="<?= $_SESSION['email'] ?>" />
                                                    <label class="form-label text-muted" for="settings-email">Your Email</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-floating flex-fill mb-0">
                                                    <input name="newPassword" type="password" id="settings-password" class="form-control" placeholder="Password" value="<?= $_SESSION['password'] ?>" />
                                                    <label class="form-label text-muted" for="settings-password">Password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-2">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-floating flex-fill mb-0">
                                                    <input type="password" id="settings-repeatePassword" class="form-control" placeholder="Repeat your password" />
                                                    <label class="form-label text-muted" for="settings-repeatePassword">Repeat your password</label>
                                                </div>
                                            </div>
                                            <div class="my-4 d-flex justify-content-between">
                                                <div>
                                                    <button type="button" class="btn btn-cstm mb-1">Save</button>
                                                    <button type="button" class="btn btn-danger" onclick="window.location.href='dashboard.php';">Cancel</button>
                                                </div>
                                                <a href="" class="text-danger text-decoration-none" data-bs-toggle="modal" data-bs-target="#delete-account-warning">remove account.</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="assets/img/img6.jpg" class="img-fluid mt-0 d-none d-lg-block" alt="cover" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="modal fade" id="delete-account-warning" tabindex="-1" aria-labelledby="delete-account-warning" aria-hidden="true">
                <form action="main.php" method="POST">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-cstm">
                                <h1 class="modal-title fs-5 text-white" id="warning">Warning</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-3 fw-bold text-center">Whoa, there!</p>
                                <p class="text-center">Once you delete your account, there's no gitting it back.<br> Make sure you want to do this.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cstm" data-bs-dismiss="modal">No</button>
                                <button name="removeAccount" type="submit" class="btn btn-danger">Yes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

    </div>

    <!-- ================== BEGIN core-js ================== -->
    <!-- <script src="assets/bootstrap-5.2.2/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="assets/script.js"></script>
    <script src="https://kit.fontawesome.com/e29eb6764b.js" crossorigin="anonymous"></script>
    <!-- ================== END core-js ==================== -->
</body>

</html>