<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="<?= base_url('img/icon/logo_2.png') ?>" type="image/x-icon" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $title ?>
  </title>
  <link href="#" rel="stylesheet" id="codeStyle" />
  <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('bootstrap-icon/font/bootstrap-icons.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/main.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/error.css') ?>" rel="stylesheet">
</head>

<?php
$email = "";
$password = "";
if (session()->getFlashdata('data')) {
  $email = session()->getFlashdata('data')['email'];
  $password = session()->getFlashdata('data')['password'];
}
?>

<body class="bg-body-tertiary">
  <section class="vh-100 bg-primary bg-opacity-10">
    <div class="container h-100">
      <input type="hidden" id="logo">
      <input type="hidden" id="logow">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-body border-0 shadow-sm" style="border-radius: 1rem;">
            <div class="card-body p-5">
              <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
              </svg>
              <?php if (session()->getFlashdata('success')): ?>
                <div>
                  <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                      <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                      <strong>Selamat ! </strong>
                      <?= session()->getFlashdata('success')['success']; ?>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
              <?php endif ?>
              <!-- untuk error message -->
              <?php if (session()->getFlashdata('msg')): ?>
                <div>
                  <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                      <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                      <strong>Perhatian ! </strong>
                      <?= session()->getFlashdata('msg')['invalid']; ?>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
              <?php endif ?>
              <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center">Masuk</h2>
              <p class="mb-5 d-flex justify-content-center">Silahkan masukan email dan password!</p>
              <form action="<?= base_url('login/auth') ?>" method="post">
                <div class="form-outline form-white mb-4 <?php if (isset(session()->getFlashdata('errors')['email']))
                  echo 'error'; ?>">
                  <label for="email">Email :</label>
                  <input type="email" value="<?= $email ?>" id="email" name="email" class="form-control"
                    autocomplete="off" placeholder="Email" />
                  <small>
                    <?php
                    if (session()->getFlashdata('errors')) {
                      if (isset(session()->getFlashdata('errors')['email']))
                        echo session()->getFlashdata('errors')['email'];
                    }
                    ?>
                  </small>
                </div>

                <div class="form-outline form-white mb-4 <?php if (isset(session()->getFlashdata('errors')['password']))
                  echo 'error'; ?>">
                  <label for="password">Password :</label>
                  <input type="password" id="password" value="<?= $password ?>" name="password" class="form-control"
                    placeholder="Password" autocomplete="off" />
                  <small>
                    <?php
                    if (session()->getFlashdata('errors')) {
                      if (isset(session()->getFlashdata('errors')['password']))
                        echo session()->getFlashdata('errors')['password'];
                    }
                    ?>
                  </small>
                </div>

                <p class="small mb-5 pb-lg-2"><a href="#!">Tidak ingat kata sandi?</a></p>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary px-5" type="submit">Masuk</button>
                </div>
              </form>

            </div>

            <div class="d-flex justify-content-center mb-5">
              <p class="mb-0">Belum punya akun? <a href="<?= base_url('register') ?>" class="fw-bold">Mendaftar</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('js/script.js') ?>"></script>
</body>

</html>