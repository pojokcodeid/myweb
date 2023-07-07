<div class="card-body bg-body-tertiary mb-2 rounded" id="container<?= $item['comment_id'] ?>">
  <div class="d-flex flex-start align-items-center">
    <img class="rounded-circle shadow-1-strong me-3 float-end" src="<?= base_url('img/profile/') . $item['image'] ?>"
      alt="avatar" width="60" height="60" />
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
            <button type="button" class="btn btn-link dropdown-toggle text-decoration-none" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" onclick="editMode(<?= $item['comment_id'] ?>)"
                  href="javascript:void(0);">Ubah</a>
              </li>
              <li><a class="dropdown-item"
                  href="javascript:delCom('<?= base_url('commentDelete/') . $slug . '/' . $item['comment_id'] ?>')">Hapus</a>
              </li>
            </ul>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <p class=" mt-2 mb-2 pb-2">
  <div class="mb-3 row">
    <form id="frmEdit">
      <input type="hidden" id="targetUrl<?= $item['comment_id'] ?>" value="<?= base_url('commentUpdate/') . $slug ?>">
      <input type="hidden" id="temp<?= $item['comment_id'] ?>" value="<?= $item['comment'] ?>">
      <input type="hidden" id="comid<?= $item['comment_id'] ?>" name="comid" value="<?= $item['comment_id'] ?>">
      <input type="hidden" id="defaultVal<?= $item['comment_id'] ?>" value="<?= $item['comment'] ?>">
      <div class="col-lg-12">
        <textarea disabled class="form-control-plaintext" id="txtComment<?= $item['comment_id'] ?>" name="txtComment"
          rows="3"><?= $item['comment'] ?></textarea>
      </div>
      <div class="row justify-content-between">
        <div class="col-6">
          <div class="small d-flex justify-content-start mt-2">
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
              <p class="mb-0" id="count<?= $item['comment_id'] ?>">
                0
              </p>
            </a>
          </div>
        </div>
        <!--  -->
        <div class="col-6">
          <div id="bSubmit<?= $item['comment_id'] ?>" class="gap-1 d-flex justify-content-end visually-hidden mt-2">
            <button onclick="reset2(<?= $item['comment_id'] ?>)" class="btn b-xs btn-secondary"
              type="button">Reset</button>
            <button onclick="submitFrm(<?= $item['comment_id'] ?>)" type="button" class="btn b-xs btn-primary"
              type="button">Ubah</button>
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
          action="<?= base_url('nestedComment/') . $slug . '/' . $item['tutorial_id'] ?>" method="post">
          <div class="modal-header border-0">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Untuk -
              <?= ucwords($item['nama']) ?>
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="comid" value="<?= $item['comment_id'] ?>">
            <div class="form-outline w-100">
              <textarea class="form-control" maxlength="200" id="txtComment" name="txtComment" rows="4"></textarea>
            </div>
          </div>
          <div class="modal-footer border-0">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- end modal -->
</div>