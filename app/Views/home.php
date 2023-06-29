<?= $this->extend('layout/template') ?>

<?= $this->section('content'); ?>
<div class="container content">
  <div class="row p-2">
    <div class="mb-4 bg-body rounded-3 shadow-sm">
      <div class="row">
        <div class="col py-5 m-5">
          <h1 class="display-5 fw-bold">Pojok Code</h1>
          <p class="col-md-8 fs-4">Berbagi Code dan Tutorial.</p>
          <button class="btn btn-primary btn-lg" type="button">Mulai Belajar</button>
          <button class="btn btn-outline-primary btn-lg mt-1" type="button">Daftar</button>
        </div>
        <div class="col-auto">
          <img src="./img/admin.png" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
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
        <a href="#" class="text-decoration-none">
          <div class="shadow-sm card <?= $group['line_color'] ?> h-100 py-2 bg-body border-0">
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
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
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
        Testimoni dari yang sudah belajar disini...
      </p>
    </div>
    <div class="container py-5">
      <div class="main-timeline">
        <div class="timeline left">
          <div class="card">
            <div class="card-body p-4">
              <h3>Putra</h3>
              <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                dignissim per, habeo iusto primis ea eam.</p>
            </div>
          </div>
        </div>
        <div class="timeline right">
          <div class="card">
            <div class="card-body p-4">
              <h3>Jono</h3>
              <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                dignissim per, habeo iusto primis ea eam.</p>
            </div>
          </div>
        </div>
        <div class="timeline left">
          <div class="card">
            <div class="card-body p-4">
              <h3>Agung Hamdan</h3>
              <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                dignissim per, habeo iusto primis ea eam.</p>
            </div>
          </div>
        </div>
        <div class="timeline right">
          <div class="card">
            <div class="card-body p-4">
              <h3>Belekik</h3>
              <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                dignissim per, habeo iusto primis ea eam.</p>
            </div>
          </div>
        </div>
        <div class="timeline left">
          <div class="card">
            <div class="card-body p-4">
              <h3>Jambrud</h3>
              <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                dignissim per, habeo iusto primis ea eam.</p>
            </div>
          </div>
        </div>
        <div class="timeline right">
          <div class="card">
            <div class="card-body p-4">
              <h3>Test</h3>
              <p class="mb-0">Lorem ipsum dolor sit amet, quo ei simul congue exerci, ad nec admodum perfecto
                mnesarchum, vim ea mazim fierent detracto. Ea quis iuvaret expetendis his, te elit voluptua
                dignissim per, habeo iusto primis ea eam.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>