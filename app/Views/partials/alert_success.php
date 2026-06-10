<?php if (session('message') !== null): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= esc(session('message')) ?>
        <button aria-label="Tutup Peringatan" class="btn-close" data-bs-dismiss="alert" type="button"></button>
    </div>
<?php endif ?>