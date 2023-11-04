<!doctype html>
<html data-bs-theme="dark" lang="id">
  <head>
    <meta charset="utf-8">
    <meta content="initial-scale=1.0, width=device-width" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <link rel="icon" href="<?= App::base_url(); ?>/assets/img/favicon.ico">
    <title><?= $data['title'] ?></title>
    <?= Template::css('https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?= Template::js('https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>
    <?= Template::css('https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css'); ?>
    <?= Template::js('https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js'); ?>
    <?= Template::css(sprintf('%s/assets/css/Custom.css', App::base_url())); ?>
    <?= Template::js(sprintf('%s/assets/js/Index.js', App::base_url()), 'module'); ?>
  </head>
  <body class="d-flex flex-column min-vh-100">