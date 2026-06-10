<?php
use App\Entities\MessageEntity;

/** @var MessageEntity $message */ ?>
<div aria-describedby="deleteModalDescription" aria-labelledby="deleteModalTitle" class="fade modal" id="deleteModal"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Hapus Pesan</h5>
                <button aria-label="Tutup Modal" class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger mb-0" id="deleteModalDescription">
                    <i aria-hidden="true" class="bi bi-exclamation-circle-fill me-2"></i>
                    Apakah kamu yakin ingin menghapus pesan ini?
                </div>
            </div>
            <div class="modal-footer">
                <?= form_open(url_to('message-delete', esc($message->uid))) ?>
                <?= method_spoofing('DELETE') ?>
                <button class="btn btn-secondary fw-medium" data-bs-dismiss="modal" type="button">Batal</button>
                <button class="btn btn-danger fw-medium" type="submit">Hapus</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
