<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

<!-- load data for navbar -->

<?php
$list = $content['breadcrumb'];
$list = preg_replace('/\.$/', '', $list);
$list = explode(', ', $list);
$lastElement = end($list);
?>

<div class="container content">
  <div class="row">
    <!-- sidebar -->
    <div class="col-lg-3 justify-content-start bg-body p-0 pt-1 shadow-sm" id="mySidebar">
      <div class="flex-shrink-0 ps-1 mb-5">
        <!-- content menu -->
        <div class="p-0 pb-5">
          <ul id="nav-tree" class="mb-5">
            <li><a class="nav-link link-body-emphasis rounded" href="<?= base_url('tutorial/' . $kategori['slug']) ?>">
                <?= $kategori['nama'] ?>
              </a>
              <ul>
                <?php
                foreach ($categoriItem as $item):
                  $cssselected = "";
                  if ($itemselected['id'] == $item['id']) {
                    $cssselected = "selected";
                  }
                  ?>
                  <li>
                    <a class="link-body-emphasis rounded <?= $cssselected ?>"
                      href="<?= base_url('tutorial/' . $item['slug']) ?>">
                      <?= $item['nama'] ?>
                    </a>
                  </li>
                <?php endforeach ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- end sidebar -->
    <div class="col-lg-9">
      <div class="row mt-2 bg-body p-4 m-1 pb-0 rounded shadow-sm">
        <nav aria-label="breadcrumb" class="p-0">
          <ol class="breadcrumb">
            <?php foreach ($list as $val):
              $itmActive = "";
              if ($val == $lastElement) {
                $itmActive = "active";
              }
              ?>
              <li class="breadcrumb-item <?= $itmActive ?>">
                <?php if ($itmActive == "active"): ?>
                  <?= $val ?>
                <?php else: ?>
                  <a class="text-decoration-none pe-none" href="#" tabindex="-1" aria-disabled="true">
                    <?= $val ?>
                  </a>
                <?php endif ?>
              </li>
            <?php endforeach ?>
          </ol>
        </nav>
      </div>
      <!-- Post Content-->
      <div class="row bg-body p-4 rounded shadow-sm m-1">
        <article class="p-0">
          <div class="container-fluid px-0 px-lg-0">
            <h1 class="section-heading text-primary">
              <?= $content['title'] ?>
            </h1>
            <small>
              <table class="mb-2">
                <tr>
                  <td>Dituls Oleh</td>
                  <td>&nbsp;:&nbsp</td>
                  <td>Pojok Code</td>
                </tr>
                <tr>
                  <td>Dibuat Pada</td>
                  <td>&nbsp;:&nbsp</td>
                  <td>
                    <?= date_format(date_create($content['created_at']), "d M Y H:i:s"); ?>
                  </td>
                </tr>
              </table>
            </small>
            <img src="../img/header/<?= $content['img_header'] ?>" alt="" class="img-fluid rounded mb-2 shadow-sm">
            <div class="row gx-4 gx-lg-5 justify-content-center">
              <div class="col-md-12 col-lg-2 col-xl-12">
                <?= $content['content'] ?>
              </div>
            </div>
          </div>
        </article>
      </div>
      <div class="row bg-body p-4 rounded shadow-sm m-1">
        <h4>Tentang Penulis</h4>
        <div class="card mb-3 border-0">
          <div class="row g-0">
            <div class="col-md-2 d-flex align-items-center justify-content-center">
              <img src="<?= base_url('img/asep.png') ?>" width="150" height="150" class="img-fluid rounded-circle"
                alt="Pojok Code">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Asep Komarudin <i class="bi bi-patch-check-fill" style="color: #4d94ff;"></i>
                </h5>
                <p class="card-text">Setiap orang bodoh bisa menulis kode yang bisa dimengerti oleh komputer. Pemrogram
                  yang baik menulis kode yang bisa dimengerti oleh manusia</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-flex justify-content-center p-4 bg-body rounded shadow-sm m-1">
        <div class="col">
          <div class="card border-0">
            <h4>Komentar</h4>
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3 float-end" src="<?= base_url('img/img_avatar1.png') ?>"
                  alt="avatar" width="60" height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">Lily Coleman</h6>
                  <p class="text-muted small mb-0">
                    Shared publicly - Jan 2020
                  </p>
                </div>
              </div>

              <p class="mt-3 mb-4 pb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
              </p>

              <div class="small d-flex justify-content-start">
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">
                  <i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;<p class="mb-0">Like</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">
                  <i class="bi bi-chat-left-text-fill"></i>&nbsp;
                  <p class="mb-0">Comment</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">
                  <i class="bi bi-share"></i>&nbsp;
                  <p class="mb-0">Share</p>
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3 float-end" src="<?= base_url('img/asep.png') ?>"
                  alt="avatar" width="60" height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">Pojok Code</h6>
                  <p class="text-muted small mb-0">
                    Shared publicly - Jan 2020
                  </p>
                </div>
              </div>

              <p class="mt-3 mb-4 pb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip consequat.
              </p>

              <div class="small d-flex justify-content-start">
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">
                  <i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;<p class="mb-0">Like</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">
                  <i class="bi bi-chat-left-text-fill"></i>&nbsp;
                  <p class="mb-0">Comment</p>
                </a>
                <a href="#!" class="d-flex align-items-center me-3 text-decoration-none">
                  <i class="bi bi-share"></i>&nbsp;
                  <p class="mb-0">Share</p>
                </a>
              </div>
            </div>
            <div class="card-body">
              <a href="#" class="text-decoration-none" role="button">Tampil Lebih Banyak<i
                  class="bi bi-arrow-right-short" style="font-size: 24px"></i></a>
            </div>
            <div class="card-footer py-3 border-0 rounded">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong me-3" src="<?= base_url('img/img_avatar1.png') ?>"
                  alt="avatar" width="40" height="40" />
                <div class="form-outline w-100">
                  <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                  <label class="form-label" for="textAreaExample">Message</label>
                </div>
              </div>
              <div class="float-end mt-2 pt-1">
                <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>