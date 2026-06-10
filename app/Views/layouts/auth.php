<?php $title = trim($this->renderSection('title')) ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <?= $this->include('partials/head') ?>
</head>

<body class="align-items-center bg-primary-subtle d-flex justify-content-center min-dvh-100">
    <main class="flex-grow-1 p-3">
        <?= $this->renderSection('main') ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="<?= esc(app_asset_url('js/app.js'), 'attr') ?>"></script>
</body>

</html>
