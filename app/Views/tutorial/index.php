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
      <nav aria-label="breadcrumb" class="ps-1 mt-2">
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
                <a class="text-decoration-none" href="#">
                  <?= $val ?>
                </a>
              <?php endif ?>
            </li>
          <?php endforeach ?>
        </ol>
      </nav>
      <!-- Post Content-->
      <article class="bg-body p-4 rounded shadow-sm">
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
  </div>
</div>

<?= $this->endSection(); ?>