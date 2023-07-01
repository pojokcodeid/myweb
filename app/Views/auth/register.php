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
  <img style="display: none;" id="logo" src="" alt="" width="200" />
  <img style="display: none;" id="logow" src="" alt="" width="200" />

  <section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 bg-primary bg-opacity-10">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card bg-body shadow-sm border-0" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">BUAT SEBUAH AKUN</h2>

                <form>

                  <div class="form-outline mb-4">
                    <label for="nama">Nama Lengkap :</label>
                    <input type="text" id="nama" name="nama" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label for="password1">Password :</label>
                    <input type="password" id="password1" name="password1" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label for="password2">Ulangi Password :</label>
                    <input type="password" id="password2" name="password2" class="form-control" />
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                      Saya setuju semua pernyataan di <a href="#!" class="text-body"><u>Ketentuan layanan</u></a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary btn-block">Daftar</button>
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