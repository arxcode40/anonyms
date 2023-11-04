<?php
  if(!Session::has('auth')):
    App::set_flash_message(
      'bi-exclamation-circle-fill',
      'warning',
      'Masuk Terlebih Dahulu'
    );
    Header::location(sprintf('%s/auth/?a=signin', App::base_url()));
    exit();
  endif;
  Template::page(sprintf('%s/system/Template/Begin.php', App::base_dir()),
    array(
      'title' => 'Beranda'
    )
  );
?>
<nav class="bg-body-tertiary navbar navbar-expand sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= App::base_url(); ?>">
      <?= Config::get('app_name'); ?>
    </a>
    <div class="collapse navbar-collapse">
      <ul class="ms-auto navbar-nav">
        <li class="dropdown nav-item">
          <a aria-expanded="false" class="dropdown-toggle nav-link" data-bs-auto-close="false" data-bs-toggle="dropdown" href="" role="button">
            <i class="bi bi-person-circle fs-5"></i>
          </a>
          <form action="<?= sprintf('%s/system/Auth/Update.php', App::base_url()); ?>" class="dropdown-menu dropdown-menu-end min-w-15rem p-3" id="profileForm" method="post">
            <h5>Profil Kamu</h5>
            <div class="mb-3">
              <label class="form-label" for="username">Nama Pengguna</label>
              <input class="form-control" id="username" maxlength="16" minlength="6" name="username" required type="text" value="<?= App::get_auth('username'); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Kata Sandi</label>
              <div class="input-group">
                <input class="form-control" id="password" maxlength="16" minlength="6" name="password" required type="password" value="<?= App::get_auth('password'); ?>">
                <button class="btn btn-secondary" id="showPassword" type="button">
                  <i class="bi bi-eye-slash"></i>
                </button>
              </div>
            </div>
            <div class="btn-group" role="group">
              <button class="btn btn-primary" name="update" type="submit">Simpan</button>
              <button class="btn btn-secondary" type="reset">Batal</button>
              <a class="btn btn-danger" href="<?= sprintf('%s/auth/?a=signout', App::base_url()); ?>" role="button">Keluar</a>
            </div>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container py-3">
  <?php if(Session::has("flash_message")): ?>
    <div class="alert alert-<?= App::get_flash_message('status'); ?>" role="alert">
      <span class="bi <?= App::get_flash_message('icon'); ?> me-2"></span>
      <?= App::get_flash_message('text'); ?>
    </div>
    <?php Session::del('flash_message'); ?>
  <?php endif; ?>
  <div class="g-3 row">
    <div class="col-md-6">
      <div class="card">
        <h5 class="card-header">Hai, <?= App::get_auth('username'); ?>
        </h5>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="link">Tautan Kamu</label>
            <div class="input-group">
              <span class="input-group-text">
                <i class="bi bi-link-45deg"></i>
              </span>
              <input class="form-control" id="link" readonly type="url" value="<?= sprintf('%s/?u=%s', App::base_url(), App::get_auth('token')); ?>">
              <button class="btn btn-outline-secondary" id="copyLink" type="button">
                <i class="bi bi-copy"></i>
              </button>
              <button class="btn btn-outline-secondary" id="shareLink" type="button">
                <i class="bi bi-share-fill"></i>
              </button>
            </div>
          </div>
          <div class="alert alert-primary align-items-center d-flex justify-content-between mb-0" role="alert">
            <div class="">
              <h5 class="alert-heading">Total Pesan Kamu</h5>
              <div class="display-6">
                <?= App::get_total_message(App::get_auth('token')); ?>
              </div>
            </div>
            <div class="display-3">
              <i class="bi bi-envelope"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <h5 class="card-header">Pesan Kamu</h5>
        <div class="card-body">
          <?php require_once sprintf('%s/system/Template/Message.php', App::base_dir()); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="fade modal" id="modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pesan Anonim</h5>
        <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Tutup</button>
        <a class="btn btn-danger" id="btnDelete" href="" role="button">Hapus</a></div>
    </div>
  </div>
</div>
<?php Template::page(sprintf('%s/system/Template/End.php', App::base_dir())); ?>