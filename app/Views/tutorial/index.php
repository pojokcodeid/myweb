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
                  <div class="w-100">
                    <h6 class=" fw-bold text-primary mb-1">
                      <?= ucwords($item['nama']) ?>
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="text-muted small mb-0">
                        Dibuat Pada -
                        <?= date_format(date_create($item['created_at']), "Y M d H:i") ?>
                      </p>
                      <?php if (session('user_id') == $item['user_id']): ?>
                        <div class="btn-group">
                          <button type="button" class="btn btn-link dropdown-toggle text-decoration-none"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" onclick="editMode(<?= $item['comment_id'] ?>)"
                                href="javascript:void(0);">Ubah</a>
                            </li>
                            <li><a class="dropdown-item"
                                href="<?= base_url('commentDelete/') . $slug . '/' . $item['comment_id'] ?>">Hapus</a>
                            </li>
                          </ul>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <p class=" mt-2 mb-2 pb-2">
                <div class="mb-3 row">
                  <form>
                    <input type="hidden" id="targetUrl<?= $item['comment_id'] ?>"
                      value="<?= base_url('commentUpdate/') . $slug ?>">
                    <input type="hidden" id="comid<?= $item['comment_id'] ?>" name="comid"
                      value="<?= $item['comment_id'] ?>">
                    <input type="hidden" id="defaultVal<?= $item['comment_id'] ?>" value="<?= $item['comment'] ?>">
                    <div class="col-lg-12">
                      <textarea disabled class="form-control-plaintext" id="txtComment<?= $item['comment_id'] ?>"
                        name="txtComment" rows="3"><?= $item['comment'] ?></textarea>
                    </div>
                    <!--  -->
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <div class="small d-flex justify-content-start mt-2">
                          <a href="#!"
                            class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                            <i class="bi bi-hand-thumbs-up"></i>&nbsp;<p class="mb-0">0</p>
                          </a>
                          <a href="#!"
                            class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                            <i class="bi bi-hand-thumbs-down"></i>&nbsp;
                            <p class="mb-0">0</p>
                          </a>
                          <a href="#!" data-bs-target="#nestedComment<?= $item['comment_id'] ?>" data-bs-toggle="modal"
                            class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                            <i class="bi bi-chat-left-text"></i></i>&nbsp;
                            <p class="mb-0">
                              <?= count($item['parent']) ?>
                            </p>
                          </a>
                        </div>
                      </div>
                      <!--  -->
                      <div class="col-6">
                        <div id="bSubmit<?= $item['comment_id'] ?>"
                          class="gap-1 d-flex justify-content-end visually-hidden mt-2">
                          <button type="reset" onclick="reset2(<?= $item['comment_id'] ?>)" class="btn b-xs btn-secondary"
                            type="button">Reset</button>
                          <button onclick="submitFrm(<?= $item['comment_id'] ?>)" type="button"
                            class="btn b-xs btn-primary" type="button">Ubah</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                </p>
                <!-- modal commenttar komen -->
                <div class="modal fade" id="nestedComment<?= $item['comment_id'] ?>" aria-hidden="true"
                  aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <form onsubmit="validInput(this);return false;"
                        action="<?= base_url('nestedComment/') . $slug . '/' . $content['id'] ?>" method="post">
                        <div class="modal-header border-0">
                          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Untuk -
                            <?= ucwords($item['nama']) ?>
                          </h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="comid" value="<?= $item['comment_id'] ?>">
                          <div class="form-outline w-100">
                            <textarea class="form-control" maxlength="200" id="txtComment" name="txtComment"
                              rows="4"></textarea>
                          </div>
                        </div>
                        <div class="modal-footer border-0">
                          <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Kirim</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- end modal -->

                <!-- <div class="small d-flex justify-content-start">
                  <a href="#!" class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                    <i class="bi bi-hand-thumbs-up"></i>&nbsp;<p class="mb-0">0</p>
                  </a>
                  <a href="#!" class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                    <i class="bi bi-hand-thumbs-down"></i>&nbsp;
                    <p class="mb-0">0</p>
                  </a>
                  <a href="#!" data-bs-target="#nestedComment<?= $item['comment_id'] ?>" data-bs-toggle="modal"
                    class="btn btn-outline-success btn-sm d-flex align-items-center me-3 text-decoration-none">
                    <i class="bi bi-chat-left-text"></i></i>&nbsp;
                    <p class="mb-0">
                      <?= count($item['parent']) ?>
                    </p>
                  </a>
                </div> -->

                <!-- parent start -->
                <?php
                foreach ($item['parent'] as $parent):
                  ?>
                  <div class="ms-3 d-flex flex-start mt-2 p-2 rounded shadow-sm">
                    <a class="me-3" href="#">
                      <img class="rounded-circle shadow-1-strong" src="<?= base_url('img/profile/') . $parent['image'] ?>"
                        alt="avatar" width="50" height="50" />
                    </a>
                    <div class="flex-grow-1 flex-shrink-1">
                      <div>
                        <div class="d-flex justify-content-between align-items-center">
                          <p class="mb-1">
                            <?= ucwords($parent['nama']) ?> <span class="small">-
                              <?= date_format(date_create($parent['created_at']), "Y M d H:i") ?>
                              &nbsp;
                            </span>
                          </p>
                          <?php if (session('user_id') == $parent['user_id']): ?>
                            <div class="btn-group">
                              <button type="button" class="btn btn-link dropdown-toggle text-decoration-none"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item"
                                    href="<?= base_url('commentDelete/') . $slug . '/' . $parent['comment_id'] ?>">Delete</a>
                                </li>
                              </ul>
                            </div>
                          <?php endif ?>
                        </div>
                        <p class="small mb-0">
                          <?= $parent['comment'] ?>
                        </p>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
                <!-- parent end -->

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