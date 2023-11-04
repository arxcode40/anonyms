<?php
  Template::page(sprintf('%s/system/Template/Begin.php', App::base_dir()),
    array(
      'title' => 'Kirim Pesan Anonim'
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
        <?php if(Session::has('auth')): ?>
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
        <?php else: ?>
          <li class="nav-item">
            <a class="btn btn-primary" href="<?= sprintf('%s/auth/?a=signin', App::base_url()); ?>" role="button">Masuk</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<?php if(Session::has('flash_message')): ?>
  <div class="container pt-3">
    <div class="alert alert-<?= App::get_flash_message('status'); ?>" role="alert">
      <span class="bi <?= App::get_flash_message('icon'); ?> me-2"></span>
      <?= App::get_flash_message('text'); ?>
    </div>
  </div>
  <?php Session::del('flash_message'); ?>
<?php endif; ?>
<div class="container mt-auto py-3">
  <div class="col-12 col-sm-6 col-lg-4 mx-auto">
    <form action="<?= sprintf('%s/system/Message/Create.php', App::base_url()); ?>" class="card" method="post">
      <h5 class="card-header">
        <i class="bi bi-person-circle"></i> <?= App::get_username_from_token(Get::get('u')); ?>
      </h5>
      <input name="token" type="hidden" value="<?= Get::get('u'); ?>">
      <div class="card-body">
        <label class="form-label" for="message">Kirim Pesan Anonim</label>
        <textarea autofocus class="form-control" id="message" maxlength="500" name="message" required rows="3"></textarea>
      </div>
      <div class="card-footer">
        <button class="btn btn-primary w-100" name="send" type="submit">Kirim</button>
      </div>
    </form>
    <div class="d-grid mt-3">
      <a class="btn btn-outline-primary" href="<?= App::base_url(); ?>" role="button">Dapatkan Pesan Anonim</a>
    </div>
  </div>
</div>
<?php Template::page(sprintf('%s/system/Template/End.php', App::base_dir())); ?>