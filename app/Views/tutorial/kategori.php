<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<div class="container content">
  <div class="row">
    <div class="col-lg-12">
      <h1>
        <?= $group['nama_group'] ?>
      </h1>
      <p>
        <?= $group['resume'] ?>
      </p>
    </div>
    <?php foreach ($kategoriByGroup as $kategori): ?>
      <div class="col-xl-3 col-md-3 mb-4">
        <a href="<?= base_url('tutorial/') ?><?= $kategori['slug'] ?>" class="text-decoration-none">
          <div class="shadow-sm card <?= $group['line_color'] ?> h-100 py-2 bg-body border-0 kategori">
            <div class="card-body">
              <div class="row no-gutters align-items-center ">
                <div class="col mr-2 ">
                  <div class="text-xs font-weight-bold <?= $group['text_color'] ?> text-uppercase mb-1">
                    <?= $kategori['nama'] ?>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <p>
                      <small>
                        <?= substr($kategori['resume'], 0, 50) ?> ...
                      </small>
                    </p>
                  </div>
                </div>
                <div class="col-auto cat-dtl <?= $group['text_color'] ?>">
                  <?= $kategori['icon'] ?>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach ?>
  </div>
</div>
<?= $this->endSection(); ?>