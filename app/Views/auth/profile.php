<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<div class="container content">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card border-0 shadow-sm">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded"
                      style="height: 140px; background-color: rgb(233, 236, 239);">
                      <img width="140" height="140" src="<?= base_url('img/') . $user['image']; ?>" class="rounded"
                        alt="<?= $user['nama']; ?>">
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
                      <div class="mb-3">
                        <label for="foto" class="form-label"><small>Ubah Foto :</small></label>
                        <div class="input-group">
                          <input type="file" class="form-control" id="foto" aria-describedby="foto" aria-label="Upload">
                          <button class="btn btn-primary" type="button" id="foto">Ubah</button>
                        </div>
                      </div>
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
                      <form action="#">
                        <div class="col-md-6 col-lg-6 col-xl-4 mb-4 form-outline">
                          <label for="nama">Nama Lengkap :</label>
                          <input type="text" value="<?= $user['nama']; ?>" id="nama" name="nama" class="form-control"
                            autocomplete="off" />
                          <small></small>
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