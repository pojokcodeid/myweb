<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

<!-- load data for navbar -->

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
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="#">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="#">Tutorial</a>
          </li>
          <li class="breadcrumb-item">
            <a class="text-decoration-none" href="#">HTML</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Pengenalan HTML
          </li>
        </ol>
      </nav>
      <!-- Post Content-->
      <article class="bg-body p-4 rounded shadow-sm">
        <div class="container-fluid px-0 px-lg-0">
          <h1 class="section-heading text-primary">The Final Frontier</h1>
          <img src="../img/header/ts.png" alt="" class="img-fluid rounded mb-2 shadow-sm">
          <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-12 col-lg-2 col-xl-12">
              <div>
                <p>
                  There can be no thought of finishing for ‘aiming for
                  the stars.’ Both figuratively and literally, it is a
                  task to occupy the generations. And no matter how much
                  progress one makes, there is always the thrill of just
                  beginning.
                </p>
                <p>
                  There can be no thought of finishing for ‘aiming for
                  the stars.’ Both figuratively and literally, it is a
                  task to occupy the generations. And no matter how much
                  progress one makes, there is always the thrill of just
                  beginning.
                </p>
                <blockquote class="blockquote">
                  The dreams of yesterday are the hopes of today and the
                  reality of tomorrow. Science has not yet mastered
                  prophecy. We predict too much for the next year and
                  yet far too little for the next ten.
                </blockquote>
                <p>
                  Spaceflights cannot be stopped. This is not the work
                  of any one man or even a group of men. It is a
                  historical process which mankind is carrying out in
                  accordance with the natural laws of human development.
                </p>
                <p>Copy Code Dibawah :</p>
                <pre><code>.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}</code></pre>

                <p>Dengan Script berikut:</p>
                <pre><code>window.addEventListener('DOMContentLoaded', () => {
  showActiveTheme(getPreferredTheme())
  document.querySelectorAll('[data-bs-theme-value]')
    .forEach(toggle => {
      toggle.addEventListener('click', () => {
        const theme = toggle.getAttribute('data-bs-theme-value')
        localStorage.setItem('theme', theme)
        setTheme(theme)
        showActiveTheme(theme, true)
      })
    })
})</code></pre>
                <!-- gunakan link ini untuk encode -->
                <!-- https://mothereff.in/html-entities -->
                <p>INi Code HTMLnya :</p>
                <pre><code>&#x3C;!DOCTYPE html&#x3E;
&#x3C;html lang=&#x22;en&#x22;&#x3E;
&#x3C;head&#x3E;
  &#x3C;meta charset=&#x22;UTF-8&#x22;&#x3E;
  &#x3C;meta http-equiv=&#x22;X-UA-Compatible&#x22; content=&#x22;IE=edge&#x22;&#x3E;
  &#x3C;meta name=&#x22;viewport&#x22; content=&#x22;width=device-width, initial-scale=1.0&#x22;&#x3E;
  &#x3C;title&#x3E;Document&#x3C;/title&#x3E;
&#x3C;/head&#x3E;
&#x3C;body&#x3E;
  &#x3C;h1&#x3E;Hello World&#x3C;/h1&#x3E;
&#x3C;/body&#x3E;
&#x3C;/html&#x3E;</code></pre>
                <h2 class="section-heading">Reaching for the Stars</h2>
                <p>
                  As we got further and further away, it [the Earth]
                  diminished in size. Finally it shrank to the size of a
                  marble, the most beautiful you can imagine. That
                  beautiful, warm, living object looked so fragile, so
                  delicate, that if you touched it with a finger it
                  would crumble and fall apart. Seeing this has to
                  change a man.
                </p>
                <a href="#!"><img class="img-fluid" src="../img/header/ts.png" alt="..." /></a>
                <span class="caption text-muted">To go places and do things that have never been done
                  before – that’s what living is all about.</span>
                <p>
                  Space, the final frontier. These are the voyages of
                  the Starship Enterprise. Its five-year mission: to
                  explore strange new worlds, to seek out new life and
                  new civilizations, to boldly go where no man has gone
                  before.
                </p>
                <p>
                  As I stand out here in the wonders of the unknown at
                  Hadley, I sort of realize there’s a fundamental truth
                  to our nature, Man must explore, and this is
                  exploration at its greatest.
                </p>
                <p>
                  Placeholder text by
                  <a href="http://spaceipsum.com/">Space Ipsum</a>
                  &middot; Images by
                  <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>