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
  <link href="<?= base_url('css/main.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('css/error.css') ?>" rel="stylesheet">
</head>

<body class="bg-body-tertiary">
  <input type="hidden" id="logo">
  <input type="hidden" id="logow">
  <section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 bg-primary bg-opacity-10">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card bg-body shadow-sm border-0" style="border-radius: 15px;">
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

                <?php if (session()->getFlashdata('message')): ?>
                  <div>
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                      </svg>
                      <div>
                        <strong>Perhatian ! </strong>
                        <?= session()->getFlashdata('message')['errors']; ?>
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                <?php endif ?>

                <h2 class="text-uppercase text-center mb-5">BUAT SEBUAH AKUN</h2>
                <form id="signup" class="form" action="<?= base_url('register/insert') ?>" method="post">
                  <div class="mb-4 form-outline">
                    <label for="nama">Nama Lengkap :</label>
                    <input type="text" value="" id="nama" name="nama" class="form-control" autocomplete="off" />
                    <small></small>
                  </div>

                  <div class="form-outline mb-4 <?php if (isset(session()->getFlashdata('errors')['email']))
                    echo 'error'; ?>">
                    <label for="email">Email :</label>
                    <input type="email" value="" id="email" name="email" class="form-control" autocomplete="off" />
                    <small>
                      <?php
                      if (session()->getFlashdata('errors')) {
                        if (isset(session()->getFlashdata('errors')['email']))
                          echo session()->getFlashdata('errors')['email'];
                      }
                      ?>
                    </small>
                  </div>

                  <div class="form-outline mb-4">
                    <label for="password1">Password :</label>
                    <input type="password" id="password1" value="" name="password1" class="form-control"
                      autocomplete="off" />
                    <small></small>
                  </div>

                  <div class="form-outline mb-4">
                    <label for="password2">Ulangi Password :</label>
                    <input type="password" value="" id="password2" name="password2" class="form-control" />
                    <small></small>
                  </div>

                  <div class="col-12 mb-4">
                    <div class="form-check">
                      <input class="form-check-input me-2" type="checkbox" name="chkConfirm" value="1"
                        id="chkConfirm" />
                      <label class="form-check-label" for="chkConfirm">
                        Saya setuju semua pernyataan di <a href="#!" class="text-body"><u>Ketentuan layanan</u></a>
                      </label>
                      <small class="invalid-feedback" style="display:block"></small>
                    </div>
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                    <a href="<?= base_url('/') ?>" class="btn btn-outline-primary ms-2">Home</a>
                  </div>
                  <p class="text-center text-muted mt-5 mb-0">Sudah punya akun? <a href="<?= base_url('login') ?>"
                      class="fw-bold text-body"><u>Masuk disini</u></a></p>
                </form>
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