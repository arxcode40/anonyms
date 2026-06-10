<?= $this->extend('layouts/default') ?>

<?= $this->section('main') ?>
<div class="card shadow">
    <div class="card-body">
        <svg aria-hidden="true" class="d-block mb-3 mx-auto text-success" fill="currentColor" height="64"
            viewBox="0 0 16 16" width="64" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
            <path
                d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
        </svg>
        <h1 class="fw-bold h5 mb-3 text-center">Pesan rahasia berhasil dikirim!</h1>
        <div class="d-grid gap-2">
            <a class="btn btn-primary fw-medium" href="<?= url_to('register') ?>">Buat Akunku Sendiri</a>
            <a class="btn btn-primary fw-medium" href="/u/<?= esc(session('username')) ?>">Kirim Pesan Rahasia
                Lainnya</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
