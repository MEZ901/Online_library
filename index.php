<?php include('main.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />

  <title>Online Library</title>

  <!-- ================== BEGIN core-css ================== -->
  <link rel="stylesheet" href="assets/bootstrap-5.2.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/style.css" />
  <!-- ================== END core-css ==================== -->
</head>

<body>
  <div class="container">
    <header id="home">
      <nav class="d-flex justify-content-between bg-white" id="navbar">
        <img class="logo mt-2 mb-2" src="assets/img/Logo.png" alt="Logo" />
        <div class="w-25 mt-2 mb-2">
          <ul class="d-flex justify-content-around w-100 list-unstyled mb-0">
            <li>
              <a href="#home" class="text-decoration-none text-dark">home</a>
            </li>
            <li>
              <a href="#about" class="text-decoration-none text-dark">about</a>
            </li>
            <li>
              <a href="#feedback" class="text-decoration-none text-dark">feedback</a>
            </li>
          </ul>
        </div>
      </nav>
      <h1 class="p-3 text-center text-cstm">
        online library management system
      </h1>
      <div class="d-flex pt-2">
        <div class="align-items-center w-25 d-none d-md-flex">
          <p class="">
            Online Library Management System is an Automated Library System
            that handles the various functions of the library
            <a href="#about" class="text-decoration-none">...read more</a>
          </p>
        </div>
        <div class="w-75 m-auto">
          <img class="w-100" src="assets/img/img1.png" alt="cover" />
        </div>
      </div>
      <div class="text-center">
        <button type="button" class="btn btn-cstm shadow-sm"
          style="--bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2.25rem; --bs-btn-font-size: 1rem;"
          onclick="loginJs(); window.location.href='#login';">
          Login
        </button>
        <div class="homeDivider d-flex align-items-center my-2 justify-content-center">
          <p class="text-center mx-3 mb-0">Or</p>
        </div>
        <button type="button" class="btn btn-cstm shadow-sm"
          style=" --bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2rem; --bs-btn-font-size: 1rem;"
          onclick="signUpJs(); window.location.href='#signUp';">
          Sign up
        </button>
      </div>
    </header>
    <main>

      <!-- about -->

      <section class="mt-5" id="about">
        <img class="about-img d-none d-md-block" src="assets/img/img4.png" alt="cover" />
        <h3 class="text-center text-uppercase m-5">about:</h3>
        <p>
          Online Library Management System is an Automated Library System
          that handles the various functions of the library. It provides a
          complete solution to the library management software. The online
          Library Management System is classified into two parts Bar Code
          System and RFID System.<br />Library plays an important role in
          all schools and colleges, no educational institution can exist
          without Library Administration Software. It is an important part
          of every school and college and it helps the librarian to keep
          records of available books as well as issued books. Library
          Management System software helps in different ways by providing
          students the facility to learn, gather resources, promote group
          learning and improve knowledge and skills.
        </p>
      </section>

      <!-- login -->

      <section class="vh-100" id="login">
        <div class="h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-6 col-xl-5">
              <img src="assets/img/img3.png" class="img-fluid d-none d-lg-block" alt="cover" />
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form action="main.php" method="POST">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-center">
                  <p class="fs-2 fw-bold mb-0 me-3 text-cstm">Login</p>
                </div>

                <div class="loginDivider d-flex align-items-center my-4">
                  <p class="text-center text-muted mx-3 mb-0">
                    welcome back!
                  </p>
                </div>

                <div class="form-floating mb-4">
                  <input name="loginEmail" type="email" id="loginEmail" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                  <label class="form-label text-muted" for="loginEmail">Email address</label>
                </div>

                <div class="form-floating mb-3">
                  <input name="loginPassword" type="password" id="loginPassword" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label text-muted" for="loginPassword">Password</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe">
                      Remember me
                    </label>
                  </div>
                  <a href="#!" class="text-body text-decoration-none">Forgot password?</a>
                </div>

                <div class="text-center text-lg-start mt-3 pt-2">
                  <button name="login" type="submit" class="btn btn-cstm shadow" style="padding-left: 1.5rem; padding-right: 1.5rem">
                    LOGIN
                  </button>
                  <p class="small mt-2 pt-1 mb-0">
                    Don't have an account?
                    <a href="#signUp" class="link-primary text-decoration-none" onclick="signUpJs()">Register</a>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- sign up -->

      <section id="signUp">
        <div class="h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center text-cstm fs-2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                    <form action="main.php" method="POST" class="mx-1 mx-md-4">

                      <div class="d-flex gap-2">
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-floating flex-fill mb-0">
                            <input name="fname" type="text" id="fname" class="form-control" placeholder="First Name" />
                            <label class="form-label text-muted" for="fname">First Name</label>
                          </div>
                        </div>

                        <div class="form-floating flex-fill mb-0">
                          <input name="lname" type="text" id="lname" class="form-control" placeholder="Last Name" />
                          <label class="form-label text-muted" for="lname">Last Name</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-floating flex-fill mb-0">
                          <input name="email" type="email" id="email" class="form-control" placeholder="Your Email" />
                          <label class="form-label text-muted" for="email">Your Email</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-floating flex-fill mb-0">
                          <input name="password" type="password" id="password" class="form-control" placeholder="Password" />
                          <label class="form-label text-muted" for="password">Password</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-2">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-floating flex-fill mb-0">
                          <input name="repeatPassword" type="password" id="repeatPassword" class="form-control" placeholder="Repeat your password" />
                          <label class="form-label text-muted" for="repeatPassword">Repeat your password</label>
                        </div>
                      </div>

                      <div class="text-center text-lg-start mt-3 pt-2">
                        <button name="signUp" type="submit" class="btn btn-cstm shadow"
                          style="padding-left: 1.5rem; padding-right: 1.5rem;">
                          Sign up
                        </button>
                        <p class="small mt-2 pt-1 mb-0">
                          Already have an account?
                          <a href="#login" class="link-primary text-decoration-none" onclick="loginJs()">Login</a>
                        </p>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="assets/img/img2.jpg" class="img-fluid d-none d-lg-block" alt="cover" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- feedback -->

      <section id="feedback">
        <div class="w-25 m-auto">
          <img src="assets/img/img5.jpg" class="img-fluid d-none d-md-block" alt="cover">
        </div>
        <div class="">
          <p>Leave your feedback so we can improve this website!</p>
          <textarea class="form-control" aria-label="With textarea" rows="6"></textarea>
        </div>
        <div class="text-end mb-5 mt-2 pt-2">
          <button type="button" class="btn btn-cstm shadow" style="padding-left: 1.5rem; padding-right: 1.5rem;">
            submit
          </button>
        </div>
      </section>
    </main>
  </div>
  <footer
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-cstm">

    <div class="text-white mb-3 mb-md-0">
      Copyright © 2022. All rights reserved.
    </div>

    <div>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>

  </footer>

  <!-- ================== BEGIN core-js ================== -->
  <!-- <script src="assets/bootstrap-5.2.2/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="assets/script.js"></script>
  <script src="https://kit.fontawesome.com/e29eb6764b.js" crossorigin="anonymous"></script>
  <!-- ================== END core-js ==================== -->
</body>
</html>