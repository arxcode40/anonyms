<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?>
<?= lang('Auth.login') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<?php $validationErrors = validation_errors(); ?>
<div class="card form-auth mx-auto shadow">
    <div class="card-body">
        <h1 class="fw-bold h4 mb-3">
            <?= lang('Auth.login') ?>
        </h1>

        <?= $this->include('partials/alert_error') ?>
        <?= $this->include('partials/alert_success') ?>

        <?= form_open(url_to('login')) ?>
        <div class="mb-3">
            <label class="form-label" for="username">Nama Pengguna <strong class="text-danger">*</strong></label>
            <input autocapitalize="off" autocomplete="username" autofocus
                aria-invalid="<?= isset($validationErrors['username']) ? 'true' : 'false' ?>"
                <?= isset($validationErrors['username']) ? 'aria-describedby="usernameError"' : '' ?>
                class="form-control<?= isset($validationErrors['username']) ? ' is-invalid' : '' ?>" id="username"
                inputmode="text" name="username" placeholder="Masukkan nama pengguna" type="text"
                value="<?= set_value('username') ?>">
            <?php if (isset($validationErrors['username'])): ?>
                <div class="invalid-feedback" id="usernameError">
                    <?= esc($validationErrors['username']) ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Kata Sandi <strong class="text-danger">*</strong></label>
            <div class="has-validation input-group">
                <input autocomplete="current-password"
                    aria-invalid="<?= isset($validationErrors['password']) ? 'true' : 'false' ?>"
                    <?= isset($validationErrors['password']) ? 'aria-describedby="passwordError"' : '' ?>
                    class="form-control<?= isset($validationErrors['password']) ? ' is-invalid' : '' ?>" id="password"
                    inputmode="text" name="password" placeholder="Masukkan kata sandi" type="password">
                <button aria-label="Tampilkan Kata Sandi" class="btn btn-secondary btn-show-password" tabindex="-1"
                    type="button">
                    <i aria-hidden="true" class="bi bi-eye-slash pe-none"></i>
                </button>
                <?php if (isset($validationErrors['password'])): ?>
                    <div class="invalid-feedback" id="passwordError">
                        <?= esc($validationErrors['password']) ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="form-check mb-3">
            <input <?= set_checkbox('remember', 'remember') ?> class="form-check-input" id="remember" name="remember"
                type="checkbox" value="remember">
            <label class="form-check-label" for="remember">
                <?= lang('Auth.rememberMe') ?>
            </label>
        </div>
        <div class="align-items-center column-gap-3 d-flex">
            <button class="btn btn-primary fw-medium flex-fill" type="submit"><?= lang('Auth.login') ?></button>
            <a class="btn btn-secondary fw-medium flex-fill"
                href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a>
        </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
