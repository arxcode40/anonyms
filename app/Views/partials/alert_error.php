<?php if (session('error') !== null): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= esc(session('error')) ?>
        <button aria-label="Tutup Peringatan" class="btn-close" data-bs-dismiss="alert" type="button"></button>
    </div>
<?php endif ?>
