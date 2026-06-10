<?= $this->extend('layouts/default') ?>

<?= $this->section('main') ?>
<?php $validationErrors = validation_errors(); ?>
<?= $this->include('partials/alert_error') ?>
<?= $this->include('partials/alert_success') ?>

<div class="card mb-3 shadow">
    <div class="card-body">
        <?= form_open(url_to('profile-update')) ?>
        <h1 class="fw-bold h5 mb-3">Profilku</h1>
        <div class="mb-3">
            <label class="form-label" for="username">Nama Pengguna</label>
            <input autocapitalize="off" autocomplete="username" autofocus
                aria-invalid="<?= isset($validationErrors['username']) ? 'true' : 'false' ?>"
                <?= isset($validationErrors['username']) ? 'aria-describedby="usernameError"' : '' ?>
                class="form-control<?= isset($validationErrors['username']) ? ' is-invalid' : '' ?>" id="username"
                name="username" placeholder="Masukkan nama pengguna" type="text"
                value="<?= set_value('username', auth()->user()->username) ?>">
            <?php if (isset($validationErrors['username'])): ?>
                <div class="invalid-feedback" id="usernameError">
                    <?= esc($validationErrors['username']) ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="currentPassword">Kata Sandi Saat Ini</label>
            <div class="has-validation input-group">
                <input autocomplete="current-password"
                    aria-invalid="<?= isset($validationErrors['current_password']) ? 'true' : 'false' ?>"
                    <?= isset($validationErrors['current_password']) ? 'aria-describedby="currentPasswordError"' : '' ?>
                    class="form-control<?= isset($validationErrors['current_password']) ? ' is-invalid' : '' ?>"
                    id="currentPassword" name="current_password" placeholder="Masukkan kata sandi saat ini"
                    type="password">
                <button aria-label="Tampilkan Kata Sandi" class="btn btn-secondary btn-show-password" tabindex="-1"
                    type="button">
                    <i aria-hidden="true" class="bi bi-eye-slash pe-none"></i>
                </button>
                <?php if (isset($validationErrors['current_password'])): ?>
                    <div class="invalid-feedback" id="currentPasswordError">
                        <?= esc($validationErrors['current_password']) ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="newPassword">Kata Sandi Baru</label>
            <div class="has-validation input-group">
                <input autocomplete="new-password"
                    aria-invalid="<?= isset($validationErrors['new_password']) ? 'true' : 'false' ?>"
                    <?= isset($validationErrors['new_password']) ? 'aria-describedby="newPasswordError"' : '' ?>
                    class="form-control<?= isset($validationErrors['new_password']) ? ' is-invalid' : '' ?>"
                    id="newPassword" name="new_password" placeholder="Masukkan kata sandi baru" type="password">
                <button aria-label="Tampilkan Kata Sandi" class="btn btn-secondary btn-show-password" tabindex="-1"
                    type="button">
                    <i aria-hidden="true" class="bi bi-eye-slash pe-none"></i>
                </button>
                <?php if (isset($validationErrors['new_password'])): ?>
                    <div class="invalid-feedback" id="newPasswordError">
                        <?= esc($validationErrors['new_password']) ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="newPasswordConfirm">Konfirmasi Kata Sandi Baru</label>
            <div class="has-validation input-group">
                <input autocomplete="new-password"
                    aria-invalid="<?= isset($validationErrors['new_password_confirm']) ? 'true' : 'false' ?>"
                    <?= isset($validationErrors['new_password_confirm']) ? 'aria-describedby="newPasswordConfirmError"' : '' ?>
                    class="form-control<?= isset($validationErrors['new_password_confirm']) ? ' is-invalid' : '' ?>"
                    id="newPasswordConfirm" name="new_password_confirm" placeholder="Masukkan konfirmasi kata sandi baru"
                    type="password">
                <button aria-label="Tampilkan Kata Sandi" class="btn btn-secondary btn-show-password" tabindex="-1"
                    type="button">
                    <i aria-hidden="true" class="bi bi-eye-slash pe-none"></i>
                </button>
                <?php if (isset($validationErrors['new_password_confirm'])): ?>
                    <div class="invalid-feedback" id="newPasswordConfirmError">
                        <?= esc($validationErrors['new_password_confirm']) ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <div class="align-items-center column-gap-1 d-flex">
            <button class="btn btn-primary fw-medium" type="submit">Simpan</button>
            <a class="btn btn-danger fw-medium" href="<?= url_to('logout') ?>">Keluar</a>
        </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
