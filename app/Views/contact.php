<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>

<div class="container content">
  <div class="row justify-content-center">
    <div class="col-md-9 mb-4">
      <div class="card border-0 rounded shadow-sm p-4">
        <div class="card-body bg-body">
          <!-- Wrapper container -->
          <div class="container py-4">
            <h1>Hubungi Kami</h1>
            <!-- Bootstrap 5 starter form -->
            <form id="contactForm">

              <!-- Name input -->
              <div class="mb-3 col-6">
                <label class="form-label" for="name">Nama</label>
                <input class="form-control" id="name" type="text" placeholder="Name" />
              </div>

              <!-- Email address input -->
              <div class="mb-3 col-6">
                <label class="form-label" for="emailAddress">Alamat Email</label>
                <input class="form-control" id="emailAddress" type="email" placeholder="Email" />
              </div>

              <!-- Message input -->
              <div class="mb-3">
                <label class="form-label" for="message">Pesan</label>
                <textarea class="form-control" id="message" type="text" placeholder="Pesan"
                  style="height: 10rem;"></textarea>
              </div>

              <!-- Form submit button -->
              <div class="d-grid col-4">
                <button class="btn btn-primary btn-lg" type="submit">Kirim</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>