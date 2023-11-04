<?php
  Template::page(sprintf('%s/system/Template/Begin.php', App::base_dir()),
    array(
      'title' => 'Daftar'
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
        <li class="nav-item">
          <a class="btn btn-primary" href="<?= sprintf('%s/auth/?a=signin', App::base_url()); ?>" role="button">Masuk</a>
        </li>
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
<div class="container d-grid mt-auto py-3">
  <form action="<?= sprintf('%s/system/Auth/Signup.php', App::base_url()); ?>" class="card mx-auto" method="post">
    <h5 class="card-header">Daftar</h5>
    <div class="card-body">
      <div class="mb-3">
        <label class="form-label" for="username">Nama Pengguna</label>
        <input autofocus class="form-control" id="username" maxlength="16" minlength="6" name="username" required type="text">
      </div>
      <div class="mb-0">
        <label class="form-label" for="password">Kata Sandi</label>
        <div class="input-group">
          <input class="form-control" id="password" maxlength="16" minlength="6" name="password" required type="password">
          <button class="btn btn-secondary" id="showPassword" type="button">
            <i class="bi bi-eye-slash"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex column-gap-3">
        <button class="btn btn-primary flex-fill" name="signup" type="submit">Daftar</button>
        <a class="btn btn-outline-primary flex-fill" href="<?= sprintf('%s/auth/?a=signin', App::base_url()); ?>" role="button">Masuk</a>
      </div>
    </div>
  </form>
</div>
<?php Template::page(sprintf('%s/system/Template/End.php', App::base_dir())); ?>