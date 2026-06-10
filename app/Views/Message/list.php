<?php

use App\Enums\MessageStatus;

?><?= $this->extend('layouts/default') ?>

<?= $this->section('main') ?>
<?= $this->include('partials/alert_success') ?>

<div class="card mb-3 shadow">
    <div class="card-body">
        <label class="form-label" for="url">Tautanku</label>
        <div class="input-group">
            <input class="form-control" disabled id="url" readonly type="url"
                value="<?= base_url('u/' . auth()->user()->username) ?>">
            <button aria-label="Salin Tautan" class="btn btn-secondary" id="copyLink" type="button">
                <i aria-hidden="true" class="bi bi-copy"></i>
            </button>
            <button aria-label="Bagikan Tautan" class="btn btn-secondary" id="shareLink" type="button">
                <i aria-hidden="true" class="bi bi-share-fill"></i>
            </button>
        </div>
    </div>
</div>
<h1 class="fw-bold h5">Pesanku <span class="badge text-bg-info"><?= esc($messages_total) ?></span> | Belum dibaca <span
        class="badge text-bg-danger"><?= esc($messages_unseen) ?></span></h1>
<div class="g-3 row">
    <?php if (! count($messages)): ?>
        <div class="col-12 text-center">
            <svg aria-hidden="true" class="d-block mb-3 mx-auto text-danger" fill="currentColor" height="40"
                viewBox="0 0 16 16" width="40" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
            </svg>
            Belum ada pesan rahasia.
        </div>
    <?php endif ?>
    <?php foreach ($messages as $message): ?>
        <div class="col-4">
            <div class="list-group shadow">
                <a class="list-group-item list-group-item-action p-2 text-center <?= esc($message->status) === MessageStatus::Seen ? 'active' : '' ?>"
                    href="/m/<?= esc($message->uid) ?>">
                    <?php if (esc($message->status) === MessageStatus::Unseen): ?>
                        <svg aria-hidden="true" fill="currentColor" height="48" viewBox="0 0 16 16" width="48"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555l-4.2 2.568-.051-.105c-.666-1.3-2.363-1.917-3.699-1.25-1.336-.667-3.033-.05-3.699 1.25l-.05.105zM11.584 8.91l-.073.139L16 11.8V4.697l-4.003 2.447c.027.562-.107 1.163-.413 1.767Zm-4.135 3.05c-1.048-.693-1.84-1.39-2.398-2.082L.19 12.856A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144L10.95 9.878c-.559.692-1.35 1.389-2.398 2.081L8 12.324l-.551-.365ZM4.416 8.91c-.306-.603-.44-1.204-.413-1.766L0 4.697v7.104l4.49-2.752z" />
                            <path d="M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                        </svg>
                    <?php else: ?>
                        <svg aria-hidden="true" fill="currentColor" height="48" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg" width="48">
                            <path
                                d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l4.222 2.475q.035-.087.08-.17c.665-1.3 2.362-1.917 3.698-1.25 1.336-.667 3.033-.05 3.699 1.25a3 3 0 0 1 .08.17L16 5.713V5.4a2 2 0 0 0-1.059-1.765zM0 6.873l4 2.344c-.012.542.124 1.117.416 1.694l.004.006L0 13.372v-6.5Zm.059 7.611 4.9-2.723c.563.73 1.383 1.467 2.49 2.198l.551.365.551-.365c1.107-.73 1.927-1.467 2.49-2.198l4.9 2.723A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516M16 13.372l-4.42-2.455.004-.006c.292-.577.428-1.152.415-1.694L16 6.873v6.5Z" />
                            <path d="M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                        </svg>
                    <?php endif ?>
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $pager->links() ?>
<?= $this->endSection() ?>
