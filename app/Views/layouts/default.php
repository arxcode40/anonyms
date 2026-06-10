<!DOCTYPE html>
<html lang="id">

<head>
    <?= $this->include('partials/head') ?>
</head>

<body class="bg-primary-subtle d-flex flex-column min-dvh-100">
    <header class="bg-body-tertiary container mt-sm-3 navbar navbar-expand rounded-pill shadow sticky-top">
        <div class="container-fluid">
            <a class="align-items-center d-flex navbar-brand" href="/">
                <img alt="Logo Aplikasi" class="border border-1 rounded-circle" decoding="async" fetchpriority="high"
                    height="24" loading="lazy" src="/icon.svg" width="24">
                <span class="fw-bold h5 mb-0 ms-2"><?= esc(env('APP_NAME')) ?></span>
            </a>

            <nav aria-label="Navigasi Utama" class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="ms-auto navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link pe-0" href="/p/">
                            <i aria-hidden="true" class="bi bi-person-circle"></i>
                            Profilku
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container flex-grow-1 p-3">
        <?= $this->renderSection('main') ?>
    </main>
    <div class="bottom-0 end-0 p-3 position-fixed" tabindex="-1">
        <button aria-label="Kembali Ke Atas" class="btn btn-secondary btn-lg d-none lh-1 p-fab rounded-circle"
            id="scrollToTop" type="button">
            <i aria-hidden="true" class="bi bi-arrow-up pe-none"></i>
        </button>
    </div>
    <div aria-live="assertive" aria-atomic="true" class="bottom-0 end-0 p-3 position-fixed toast-container">
        <div class="align-items-center toast" data-bs-delay="2000" id="toast" role="alert">
            <div class="d-flex">
                <div class="toast-body" id="toastBody"></div>
                <button aria-label="Tutup Notifikasi" class="btn-close m-auto me-2" data-bs-dismiss="toast"
                    type="button"></button>
            </div>
        </div>
    </div>
    <footer class="container p-3 text-center">
        &copy; <?= current_year() ?>
        <a class="link-body-emphasis" href="/"><?= esc(env('APP_NAME')) ?></a>. Semua
        hak dilindungi.
    </footer>

    <?= $this->renderSection('screenshot') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html-to-image/dist/html-to-image.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/downloadjs/download.min.js"></script>
    <script src="<?= esc(app_asset_url('js/app.js'), 'attr') ?>"></script>
</body>

</html>
