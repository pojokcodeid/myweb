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
</head>

<body class="bg-body-tertiary">
  <img id="logo" src="" alt="Pojok Code" width="200" style="display: none;" />
  <section class="vh-100 bg-primary bg-opacity-10">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-body" style="border-radius: 1rem;">
            <div class="card-body p-5">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase d-flex justify-content-center">Masuk</h2>
                <p class="mb-5 d-flex justify-content-center">Silahkan masukan email dan password!</p>

                <div class="form-outline form-white mb-4">
                  <label for="email">Email :</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                </div>

                <div class="form-outline form-white mb-4">
                  <label for="password">Password :</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" />
                </div>

                <p class="small mb-5 pb-lg-2"><a href="#!">Tidak ingat kata sandi?</a></p>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary px-5" type="submit">Masuk</button>
                </div>

              </div>

              <div class="d-flex justify-content-center">
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