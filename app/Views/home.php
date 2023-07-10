<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container content">
  <div class="row p-2">
    <div class="mb-4 bg-body rounded-3 shadow-sm">
      <div class="row">
        <!-- <div class="col-lg-6 py-5 m-5 border"> -->
        <div class="col-lg-6 p-5">
          <div class="p-5">
            <h1 class="display-5 fw-bold">Pojok Code</h1>
            <p class="col-md-8 fs-4">Berbagi Code dan Tutorial.</p>
            <a href="#lstKategori" class="btn btn-primary btn-lg">Mulai Belajar</a>
            <a href="<?= base_url('register') ?>" class="btn btn-outline-primary btn-lg mt-1">Daftar</a>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="<?= base_url('img/admin.png') ?>" alt="" class="img-fluid avatar">
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="lstKategori">
    <h4 class="text-primary"><strong>Kategori</strong></h4>
    <h2><strong>Belajar Apa Sekarang ?</strong></h2>
    <p class="lead">
      Temukan tutorialnya disini...
    </p>
  </div>
  <div class="row">
    <!-- group kategori -->
    <?php foreach ($groupKategori as $group): ?>
      <div class="col-xl-4 col-md-6 mb-4">
        <a href="<?= base_url('kategori/') ?><?= $group['slug'] ?>" class="text-decoration-none">
          <div class="shadow-sm card <?= $group['line_color'] ?> h-100 py-2 bg-body border-0 kategori">
            <div class="card-body">
              <div class="row no-gutters align-items-center ">
                <div class="col mr-2 ">
                  <div class="text-xs font-weight-bold <?= $group['text_color'] ?> text-uppercase mb-1">
                    <?= $group['nama_group'] ?>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <p class="lead">
                      <small>
                        <?= $group['resume'] ?>
                      </small>
                    </p>
                  </div>
                </div>
                <div class="col-auto cat">
                  <?= $group['icon'] ?>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach ?>
  </div>
</div>
<!-- <div class="row bg-light-subtle pt-2"> -->
<div class="row  bg-primary bg-opacity-10 pt-2">
  <section>
    <div class="container">
      <div class="row">
        <h4 class="text-primary"><strong>Update</strong></h4>
        <h2><strong>Ada Informasi Apa Hari Ini ?</strong></h2>
        <p class="lead">
          Temukan informasinya disini...
        </p>
      </div>
      <div class="row">
        <div class="col-lg-4 col-sm-12 p-2">
          <a href="#" class="text-decoration-none">
            <div class="card w-auto border-0 shadow-sm bg-body p-2">
              <img class="card-img-top" src="./img/header/ts.png" alt="Pojok Code">
              <div class="card-body">
                <h4 class="card-title">Typescript</h4>
                <p class="card-text">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga porro neque rem molestiae excepturi
                  repellat explicabo voluptas, sint rerum, dolores corrupti vel vitae, exercitationem tenetur!
                  Consectetur
                  vel consequuntur modi dolore.
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-12 p-2">
          <div class="card w-auto border-0 shadow-sm bg-body p-2">
            <img class="card-img-top" src="./img/header/ts.png" alt="Pojok Code">
            <div class="card-body">
              <h4 class="card-title">Typescript</h4>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga porro neque rem molestiae excepturi
                repellat explicabo voluptas, sint rerum, dolores corrupti vel vitae, exercitationem tenetur!
                Consectetur
                vel consequuntur modi dolore.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12 p-2">
          <div class="card w-auto border-0 shadow-sm bg-body p-2">
            <img class="card-img-top" src="./img/header/ts.png" alt="Pojok Code">
            <div class="card-body">
              <h4 class="card-title">Typescript</h4>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga porro neque rem molestiae excepturi
                repellat explicabo voluptas, sint rerum, dolores corrupti vel vitae, exercitationem tenetur!
                Consectetur
                vel consequuntur modi dolore.
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12 p-2">
          <div class="card w-auto border-0 shadow-sm bg-body p-2">
            <img class="card-img-top" src="./img/header/ts.png" alt="Pojok Code">
            <div class="card-body">
              <h4 class="card-title">Typescript</h4>
              <p class="card-text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga porro neque rem molestiae excepturi
                repellat explicabo voluptas, sint rerum, dolores corrupti vel vitae, exercitationem tenetur!
                Consectetur
                vel consequuntur modi dolore.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col mb-5">
          <a href="#" class="btn btn-sm btn-outline-info" role="button">Explore Lebih Lanjut<i
              class="bi bi-arrow-right-short" style="font-size: 24px"></i></a>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="row bg-body-tertiary pt-2">
  <section>
    <div class="container">
      <h4 class="text-primary"><strong>Review</strong></h4>
      <h2><strong>Apa Kata Mereka ?</strong></h2>
      <p class="lead">
        Komentar dari pembaca ...
      </p>
    </div>
    <div class="container py-5">
      <div class="main-timeline">
        <?php
        $posisi = "";
        for ($i = 0; $i < 5; $i++):
          if (($i % 2) == 0) {
            $posisi = "left";
          } else {
            $posisi = "right";
          }
          ?>
          <div class="timeline <?= $posisi ?>">
            <div class="card">
              <div class="card-body p-4">
                <h3>Putra</h3>
                <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                  mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                  dignissim per, habeo iusto primis ea eam.</p>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>