<div class="ms-3 d-flex flex-start mt-2 p-2 rounded shadow-sm" id="container<?= $parent['comment_id'] ?>">
  <a class="me-3" href="#">
    <img class="rounded-circle shadow-1-strong" src="<?= base_url('img/profile/') . $parent['image'] ?>" alt="avatar"
      width="50" height="50" />
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
            <button type="button" class="btn btn-link dropdown-toggle text-decoration-none" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" onclick="editMode(<?= $parent['comment_id'] ?>)"
                  href="javascript:void(0);">Ubah</a>
              </li>
              <li><a class="dropdown-item"
                  href="javascript:delCom('<?= base_url('commentDelete/') . $slug . '/' . $parent['comment_id'] ?>',<?= $parent['parent_id'] ?>);">Delete</a>
              </li>
            </ul>
          </div>
        <?php endif ?>
      </div>
      <p class="small mb-0">
        <!-- start -->
      <form action="">
        <input type="hidden" id="targetUrl<?= $parent['comment_id'] ?>"
          value="<?= base_url('commentUpdate/') . $slug ?>">
        <input type="hidden" id="temp<?= $parent['comment_id'] ?>" value="<?= $parent['comment'] ?>">
        <input type="hidden" id="comid<?= $parent['comment_id'] ?>" name="comid" value="<?= $parent['comment_id'] ?>">
        <input type="hidden" id="defaultVal<?= $parent['comment_id'] ?>" value="<?= $parent['comment'] ?>">
        <div class="col-lg-12">
          <div id="div<?= $parent['comment_id'] ?>">
            <?= $parent['comment'] ?>
          </div>
        </div>
        <div class="row justify-content-between">
          <div class="col-6">

          </div>
          <!--  -->
          <div class="col-6">
            <div id="bSubmit<?= $parent['comment_id'] ?>" class="gap-1 d-flex justify-content-end visually-hidden mt-2">
              <button onclick="reset2(<?= $parent['comment_id'] ?>)" class="btn b-xs btn-secondary"
                type="button">Reset</button>
              <button onclick="submitFrm(<?= $parent['comment_id'] ?>)" type="button" class="btn b-xs btn-primary"
                type="button">Ubah</button>
            </div>
          </div>
        </div>
      </form>
      <!--  end -->
      </p>
    </div>
  </div>
</div>