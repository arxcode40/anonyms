<?= $this->extend('layouts/default') ?>

<?= $this->section('main') ?>
<?php $validationErrors = validation_errors(); ?>
<div class="card shadow">
    <div class="card-body">
        <h1 class="fw-bold h5 mb-3">Kirim Pesan Rahasia ke @<?= esc($username) ?></h1>
        <?= form_open(url_to('message-create', esc($username))) ?>
        <div class="mb-3">
            <label class="form-label" for="secret">Pesan Rahasia</label>
            <textarea autofocus
                aria-invalid="<?= isset($validationErrors['secret']) ? 'true' : 'false' ?>"
                <?= isset($validationErrors['secret']) ? 'aria-describedby="secretError secretCounter"' : 'aria-describedby="secretCounter"' ?>
                class="form-control<?= isset($validationErrors['secret']) ? ' is-invalid' : '' ?> overflow-y-hidden resize-none"
                id="secret" maxlength="255" name="secret" placeholder="Ketik pesan rahasia di sini..."
                rows="1"><?= set_value('secret') ?></textarea>
            <?php if (isset($validationErrors['secret'])): ?>
                <div class="invalid-feedback" id="secretError">
                    <?= esc($validationErrors['secret']) ?>
                </div>
            <?php endif ?>
            <p class="form-text mb-0 text-end" id="secretCounter">0/255</p>
        </div>
        <button class="btn btn-primary fw-medium" type="submit">Kirim</button>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
