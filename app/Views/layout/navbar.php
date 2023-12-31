<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
  <symbol id="check2" viewBox="0 0 16 16">
    <path
      d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
  </symbol>
  <symbol id="circle-half" viewBox="0 0 16 16">
    <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
  </symbol>
  <symbol id="moon-stars-fill" viewBox="0 0 16 16">
    <path
      d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
    <path
      d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
  </symbol>
  <symbol id="sun-fill" viewBox="0 0 16 16">
    <path
      d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
  </symbol>
</svg>

<!-- <nav class="navbar navbar-expand-lg bg-body py-3 mb-3 shadow-sm fixed-top"> -->
<nav class="navbar navbar-expand-lg bg-body fixed-top shadow-sm">
  <div class="container">
    <div>
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img id="logo" src="<?= base_url('img/pojokcode.png'); ?>" alt="Pojok Code" width="200" />
        <img style="display: none;" id="logow" src="<?= base_url('img/pojokcode-w.png'); ?>" alt="Pojok Code"
          width="200" />
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
        <li class="nav-item dropdown dropdown-c">
          <a class="nav-link p-2 rounded dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-grid-fill"></i> Tutorial
          </a>
          <div class="dropdown-menu dropdown-menu-c" aria-labelledby="navbarDropdown">
            <?php foreach ($groupKategori as $group): ?>
              <ul>
                <li><a class="dropdown-item <?= $group['text_color'] ?> mega-title"
                    href="<?= base_url('kategori/') ?><?= $group['slug'] ?>">
                    <?= $group['icon'] ?>&nbsp;
                    <?= $group['nama_group'] ?>
                  </a></li>
                <?php foreach ($allKategori as $kategori) {
                  if ($kategori['group_kategori_id'] == $group['id']) {
                    ?>
                    <li><a class="dropdown-item" href="<?= base_url('tutorial/' . $kategori['slug']) ?>">
                        <?= $kategori['nama'] ?>
                      </a></li>
                  <?php }
                } ?>
              </ul>
            <?php endforeach ?>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link p-2 rounded"><i class="bi bi-card-text"></i> Arikel</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link p-2 rounded"><i class="bi bi-chat-text-fill"></i> Forum</a>
        </li>
      </ul>

      <form class="d-flex">
        <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
        <div class="dropdown bd-mode-toggle">
          <button class="btn btn-link py-1 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
              <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#sun-fill"></use>
                </svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
                </svg>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#moon-stars-fill"></use>
                </svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
                </svg>
              </button>
            </li>
            <li>
              <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                aria-pressed="true">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                  <use href="#circle-half"></use>
                </svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em">
                  <use href="#check2"></use>
                </svg>
              </button>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav mr-auto mb-lg-0 me-2">
          <li class="nav-item py-2 py-lg-1 col-12 col-lg-auto">
            <div class="vr d-none d-lg-flex h-100 mx-lg-2"></div>
            <hr class="d-lg-none my-2 text-white-50" />
          </li>
        </ul>
        <?php if (session('user_id')): ?>
          <div id="user1">
            <div class="dropdown ms-1 me-3">
              <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle link-body-emphasis"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?= base_url('img/profile/') . session('image'); ?>" alt="" width="32" height="32"
                  class="rounded-circle me-2" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end text-small shadow-sm">
                <li class="p-3 justify-content-center border-bottom">
                  <strong>
                    <?= ucwords(session('nama')) ?>
                  </strong>
                </li>
                <li><a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a></li>
                <!-- <li>
                  <hr class="dropdown-divider" />
                </li> -->
                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Sign Out</a></li>
              </ul>
            </div>
          </div>
        <?php else: ?>
          <a class="btn btn-primary" href="<?= base_url('register') ?>">Daftar</a>
          <a class="btn btn-outline-primary ms-1" href="<?= base_url('login') ?>">Masuk</a>
        <?php endif ?>
      </form>
    </div>
  </div>
</nav>