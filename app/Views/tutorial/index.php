<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<?= $this->include('validation/alert'); ?>
<?= $this->include('validation/warning'); ?>

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
    <div class="col-lg-3 justify-content-start p-0 pt-2" id="mySidebar">
      <div class="flex-shrink-0 bg-body rounded p-2 shadow-sm">
        <!-- content menu -->
        <div class="p-0 pb-2">
          <ul id="nav-tree" class="mb-2">
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
      <!-- for subscription -->
      <div class="position-sticky z-3" style="top: 70px">
        <div class="flex-shrink-0 bg-body rounded p-3 mt-3 shadow-sm">
          <h5><i class="bi bi-pencil-square"></i> Langganan</h5>
          <div class="input-group mb-2">
            <input type="text" id="email" class="form-control" placeholder="Email..." aria-label="Recipient's username"
              aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2">Kirim</button>
          </div>
        </div>
        <!-- list populer -->
        <div class="flex-shrink-0 bg-body rounded p-3 mt-3 shadow-sm">
          <h5><i class="bi bi-newspaper"></i> Populer Tutorial</h5>
          <div class="list-group list-group-light">
            <a href="#" class="list-group-item list-group-item-action px-3 border-0 ripple">1. HTML - Form
              Registration</a>
            <a href="#" class="list-group-item list-group-item-action px-3 border-0 ripple">2. Javascript Validator</a>
            <a href="#" class="list-group-item list-group-item-action px-3 border-0 ripple">3. Javascript DOM</a>
            <a href="#" class="list-group-item list-group-item-action px-3 border-0 ripple">4. Typescript OOP</a>
          </div>
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
        <blockquote class="blockquote">
          <p>
            <strong>INFORMSI : </strong>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Blanditiis amet in nam debitis laborum quod?
          </p>
        </blockquote>
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
            <?php foreach ($comment as $item): ?>
              <div class="card-body bg-body-tertiary mb-2 rounded">
                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3 float-end"
                    src="<?= base_url('img/profile/') . $item['image'] ?>" alt="avatar" width="60" height="60" />
                  <div>
                    <h6 class="fw-bold text-primary mb-1">
                      <?= ucwords($item['nama']) ?>
                    </h6>
                    <p class="text-muted small mb-0">
                      Dibuat Pada -
                      <?= date_format(date_create($item['created_at']), "Y M d H:i") ?>
                    </p>
                    <?php if (session('user_id') == $item['user_id']): ?>
                      <div class="modal fade" id="exampleModalToggle<?= $item['comment_id'] ?>" aria-hidden="true"
                        aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <form onsubmit="validInput(this);return false;"
                              action="<?= base_url('tutorial/commentUpdate/') . $slug ?>" method="post">
                              <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Ubah Komentar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" name="comid" value="<?= $item['comment_id'] ?>">
                                <div class="form-outline w-100">
                                  <textarea class="form-control" maxlength="200" id="txtComment" name="txtComment"
                                    rows="4"><?= $item['comment'] ?></textarea>
                                </div>
                              </div>
                              <div class="modal-footer border-0">
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Ubah</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-link dropdown-toggle text-decoration-none"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li><a class="dropdown-item" data-bs-target="#exampleModalToggle<?= $item['comment_id'] ?>"
                              data-bs-toggle="modal" href="#">Update</a></li>
                          <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>

                <p class="mt-3 mb-4 pb-2">
                  <?= $item['comment'] ?>
                </p>

                <div class="small d-flex justify-content-start">
                  <a href="#!" class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                    <i class="bi bi-hand-thumbs-up"></i>&nbsp;<p class="mb-0">(0) Suka</p>
                  </a>
                  <a href="#!" class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                    <i class="bi bi-hand-thumbs-down"></i>&nbsp;
                    <p class="mb-0">(0) Tidak Suka</p>
                  </a>
                </div>
              </div>
            <?php endforeach ?>
            <div class="card-body">
              <a href="#" class="text-decoration-none" role="button">Tampil Lebih Banyak<i
                  class="bi bi-arrow-right-short" style="font-size: 24px"></i></a>
            </div>
            <div class="bg-body-tertiary rounded p-2">
              <form id="frmComment" name="frmComment"
                action="<?= base_url('tutorial/comment/') . $slug . '/' . $content['id'] ?>" method="post">
                <div class="card-footer bg-body-tertiary py-3 border-0">
                  <div class="d-flex flex-start w-100">
                    <img class="rounded-circle shadow-1-strong me-3" src="              
                <?php
                if (session('image')) {
                  echo base_url('img/profile/' . session('image'));
                } else {
                  echo base_url('img/img_avatar1.png');
                }
                ?>
                " alt="avatar" width="40" height="40" />
                    <div class="form-outline w-100 error">
                      <label class="form-label" for="txtComment">Tulis Komentar</label>
                      <textarea maxlength="225" oninput="removeError(this)"
                        class="form-control <?php setInvalid('errors', 'txtComment') ?>" id="txtComment"
                        name="txtComment" rows="4"></textarea>
                      <small class="invalid-feedback">
                        <?php setErrorMsg('errors', 'txtComment') ?>
                      </small>
                    </div>
                  </div>
                  <div class="float-end mt-2 pt-1">
                    <button onclick="validInput(document.frmComment)" type="button"
                      class="btn btn-primary btn-sm">Simpan Komentar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>