<?php

use App\Entities\MessageEntity;

?><?= $this->extend('layouts/default') ?>
<?php /** @var MessageEntity $message */ ?>

<?= $this->section('main') ?>
<h1 class="visually-hidden">Pesan Rahasia</h1>
<div class="card shadow">
    <div class="card-body">
        <p><?= esc($message->secret) ?></p>
        <strong class="small text-muted"><?= str_replace('"', '', $message->created_at->humanize()) ?></strong>
        <div class="align-items-center column-gap-1 d-flex justify-content-end mt-3">
            <button aria-label="Unduh Tangkapan Layar" class="btn btn-sm" id="screenshot" type="button">
                <i aria-hidden="true" class="bi bi-camera-fill"></i>
            </button>
            <a class="btn btn-secondary btn-sm fw-medium" href="<?= previous_url() ?>">Kembali</a>
            <button aria-controls="deleteModal" class="btn btn-danger btn-sm fw-medium" data-bs-target="#deleteModal"
                data-bs-toggle="modal" type="button">Hapus</button>
        </div>
    </div>
</div>
<?= $this->include('partials/modal_delete') ?>
<?= $this->endSection() ?>

<?= $this->section('screenshot') ?>
<div class="position-fixed screenshot-area">
    <div class="bg-primary-subtle container p-3 m-0" id="screenshotArea">
        <div class="card shadow">
            <div class="card-body">
                <p><?= esc($message->secret) ?></p>
                <strong class="small text-muted"><?= str_replace('"', '', $message->created_at->humanize()) ?></strong>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
