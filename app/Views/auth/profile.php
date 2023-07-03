<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<?= $this->include('validation/alert'); ?>
<?= $this->include('validation/warning'); ?>
<?php
// memastikan tab active default =1
$tab = 1;
if (session()->getFlashdata('tabActive')) {
  if (session()->getFlashdata('tabActive') == 2) {
    $tab = 2;
  }
}
?>
<div class="container content">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card border-0 shadow-sm">
          <?php
          showSuccess('pesan', 'success');
          showError('pesan', 'errors');
          ?>
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded"
                      style="height: 140px; background-color: rgb(233, 236, 239);">
                      <img width="140" height="140" src="<?= base_url('img/profile/') . $user['image']; ?>"
                        class="rounded" alt="<?= $user['nama']; ?>">
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-left text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">
                      <?= ucwords($user['nama']); ?>
                    </h4>
                    <p class="mb-0">
                      <?= '@' . str_replace(' ', '', strtolower($user['nama'])) ?>
                    </p>
                    <div class="text-muted"><small>
                        <?= 'Active Sejak : ' . date_format(date_create($user['activated_at']), "Y M d H:i:s"); ?>
                      </small></div>
                    <div class="mt-2">
                      <form action="<?= base_url('auth/updatefoto') ?>" method="post" enctype="multipart/form-data">
                        <label for="foto" class="form-label"><small>Ubah Foto :</small></label>
                        <div class="mb-3 form-outline <?php if (isset(session()->getFlashdata('errors')['foto']))
                          echo 'error'; ?>">
                          <div class="input-group">
                            <input type="file" class="form-control" name="foto" id="foto" aria-describedby="foto"
                              aria-label="Upload">
                            <button class="btn btn-primary" type="submit" id="foto">Ubah</button>
                          </div>
                          <small>
                            <?php
                            if (isset(session()->getFlashdata('errors')['foto']))
                              echo session()->getFlashdata('errors')['foto'];
                            ?>
                          </small>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- start tab -->
              <div class="row">
                <div class="container mt-3">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs border-0" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link <?php if ($tab == 1)
                        echo 'active'; ?>" data-bs-toggle="tab" href="#data"><i class="bi bi-person-lines-fill"></i>
                        Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?php if ($tab == 2)
                        echo 'active'; ?>" data-bs-toggle="tab" href="#akun"><i class="bi bi-person-fill-lock"></i>
                        Akun</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="data" class="container tab-pane <?php if ($tab == 1)
                      echo 'active'; ?>"><br>
                      <h4>Personal Data</h4>
                      <form action="<?= base_url('auth/updateprofil') ?>" method="post">
                        <div class="col-md-6 col-lg-6 col-xl-4 mb-4 form-outline <?php if (isset(session()->getFlashdata('errors')['nama']))
                          echo 'error'; ?>">
                          <label for="nama">Nama Lengkap :</label>
                          <input type="text" value="<?= $user['nama']; ?>" id="nama" name="nama" class="form-control"
                            autocomplete="off" />
                          <small>
                            <?php
                            if (session()->getFlashdata('errors')) {
                              if (isset(session()->getFlashdata('errors')['nama']))
                                echo session()->getFlashdata('errors')['nama'];
                            }
                            ?>
                          </small>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4 <?php if (isset(session()->getFlashdata('errors')['email']))
                          echo 'error'; ?>">
                          <label for="email">Email :</label>
                          <input type="email" value="<?= $user['email']; ?>" id="email" name="email"
                            class="form-control" autocomplete="off" />
                          <small>
                            <?php
                            if (session()->getFlashdata('errors')) {
                              if (isset(session()->getFlashdata('errors')['email']))
                                echo session()->getFlashdata('errors')['email'];
                            }
                            ?>
                          </small>
                        </div>
                        <div class="d-flex justify-content-start">
                          <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                        </div>
                      </form>
                    </div>
                    <div id="akun" class="container tab-pane <?php if ($tab == 2)
                      echo 'active'; ?>"><br>
                      <h4>Personal Akun</h4>
                      <form action="<?= base_url('auth/updatepassword') ?>" method="post">
                        <input type="hidden" name="email" value="<?= $user['email']; ?>">
                        <div
                          class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4 <?php setErrorClass('errors', 'oldpassword'); ?>">
                          <label for="oldpassword">Password Lama :</label>
                          <input type="password" id="oldpassword" value="" name="oldpassword" class="form-control"
                            autocomplete="off" />
                          <small>
                            <?php setErrorMsg('errors', 'oldpassword') ?>
                          </small>
                        </div>
                        <div
                          class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4 <?php setErrorClass('errors', 'newpassword1'); ?>">
                          <label for="newpassword1">Password Baru :</label>
                          <input type="password" id="newpassword1" value="" name="newpassword1" class="form-control"
                            autocomplete="off" />
                          <small>
                            <?php setErrorMsg('errors', 'newpassword1') ?>
                          </small>
                        </div>

                        <div
                          class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4 <?php setErrorClass('errors', 'newpassword2'); ?>">
                          <label for="newpassword2">Ulangi Password Baru :</label>
                          <input type="password" value="" id="newpassword2" name="newpassword2" class="form-control" />
                          <small>
                            <?php setErrorMsg('errors', 'newpassword2') ?>
                          </small>
                        </div>
                        <div class="d-flex justify-content-start">
                          <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?= $this->endSection(); ?>