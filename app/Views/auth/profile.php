<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<div class="container content">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card border-0 shadow-sm">
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
          </svg>
          <?php if (isset(session()->getFlashdata('pesan')['success'])): ?>
            <div class="m-2 border-0 alert alert-success alert-dismissible fade show" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
              </svg>
              <strong>Selamat!</strong>
              <?php
              echo session()->getFlashdata('pesan')['success'];
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
          <?php if (isset(session()->getFlashdata('pesan')['errors'])): ?>
            <div class="m-2 border-0 alert alert-danger alert-dismissible fade show" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
              </svg>
              <strong>Maaf !</strong>
              <?php
              echo session()->getFlashdata('pesan')['errors'];
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>
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
                      <a class="nav-link active" data-bs-toggle="tab" href="#data"><i
                          class="bi bi-person-lines-fill"></i> Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#akun"><i class="bi bi-person-fill-lock"></i>
                        Akun</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="data" class="container tab-pane active"><br>
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
                    <div id="akun" class="container tab-pane fade"><br>
                      <h4>Personal Akun</h4>
                      <form action="#">
                        <input type="hidden" name="email" value="<?= $user['email']; ?>">
                        <div class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4">
                          <label for="oldpassword">Password Lama :</label>
                          <input type="password" id="oldpassword" value="" name="oldpassword" class="form-control"
                            autocomplete="off" />
                          <small></small>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4">
                          <label for="newpassword1">Password Baru :</label>
                          <input type="password" id="newpassword1" value="" name="newpassword1" class="form-control"
                            autocomplete="off" />
                          <small></small>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-4 form-outline mb-4">
                          <label for="newpassword2">Ulangi Password Baru :</label>
                          <input type="password" value="" id="newpassword2" name="newpassword2" class="form-control" />
                          <small></small>
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