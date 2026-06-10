<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?>
<?= lang('Auth.register') ?>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<?php $validationErrors = validation_errors(); ?>
<div class="card form-auth mx-auto shadow">
    <div class="card-body">
        <h1 class="fw-bold h4 mb-3">
            <?= lang('Auth.register') ?>
        </h1>

        <?= $this->include('partials/alert_error') ?>

        <?= form_open(url_to('register')) ?>
        <input id="email" name="email" type="hidden">
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
                <input autocomplete="new-password"
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
        <div class="mb-3">
            <label class="form-label" for="passwordConfirm">Konfirmasi Kata Sandi <strong
                    class="text-danger">*</strong></label>
            <div class="has-validation input-group">
                <input autocomplete="new-password"
                    aria-invalid="<?= isset($validationErrors['password_confirm']) ? 'true' : 'false' ?>"
                    <?= isset($validationErrors['password_confirm']) ? 'aria-describedby="passwordConfirmError"' : '' ?>
                    class="form-control<?= isset($validationErrors['password_confirm']) ? ' is-invalid' : '' ?>"
                    id="passwordConfirm" inputmode="text" name="password_confirm"
                    placeholder="Masukkan konfirmasi kata sandi" type="password">
                <button aria-label="Tampilkan Kata Sandi" class="btn btn-secondary btn-show-password" tabindex="-1"
                    type="button">
                    <i aria-hidden="true" class="bi bi-eye-slash pe-none"></i>
                </button>
                <?php if (isset($validationErrors['password_confirm'])): ?>
                    <div class="invalid-feedback" id="passwordConfirmError">
                        <?= esc($validationErrors['password_confirm']) ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="align-items-center column-gap-3 d-flex">
            <button class="btn btn-primary fw-medium flex-fill" type="submit"><?= lang('Auth.register') ?></button>
            <a class="btn btn-secondary fw-medium flex-fill" href="<?= url_to('login') ?>"><?= lang('Auth.login') ?></a>
        </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
