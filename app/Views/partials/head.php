<?php
$siteName    = env('APP_NAME') ?: 'Anonyms';
$pageTitle   = trim((string) ($title ?? '')) ?: $siteName;
$fullTitle   = $pageTitle === $siteName ? $siteName : "{$pageTitle} | {$siteName}";
$description = $description
    ?? (env('APP_DESC') ?: 'Kirim dan terima pesan rahasia anonim dengan Anonyms. Buat tautan pribadi, bagikan ke teman, lalu dapatkan pesan anonim secara mudah, aman, dan rahasia.');
$robots ??= 'noindex, nofollow';
$canonicalUrl = current_url();
$imageUrl ??= base_url('img/og.png');
$imageAlt ??= "Gambar {$siteName}";
$jsonOptions = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT;
$jsonLd      = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'Organization',
            '@id'   => base_url('#organization'),
            'name'  => $siteName,
            'url'   => base_url(),
            'logo'  => [
                '@type' => 'ImageObject',
                'url'   => $imageUrl,
            ],
        ],
        [
            '@type'       => 'WebSite',
            '@id'         => base_url('#website'),
            'name'        => $siteName,
            'url'         => base_url(),
            'description' => $description,
            'inLanguage'  => 'id-ID',
            'publisher'   => [
                '@id' => base_url('#organization'),
            ],
        ],
        [
            '@type'               => 'WebApplication',
            '@id'                 => base_url('#web-application'),
            'name'                => $siteName,
            'url'                 => base_url(),
            'description'         => $description,
            'applicationCategory' => 'CommunicationApplication',
            'operatingSystem'     => 'Web',
            'inLanguage'          => 'id-ID',
            'isAccessibleForFree' => true,
            'publisher'           => [
                '@id' => base_url('#organization'),
            ],
        ],
    ],
];
?>
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1.0, width=device-width">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?= esc($fullTitle) ?></title>
<link href="<?= esc($canonicalUrl, 'attr') ?>" rel="canonical">
<link href="https://cdn.jsdelivr.net" rel="preconnect">
<link href="https://cdn.jsdelivr.net" rel="dns-prefetch">
<link href="https://cdn.jsdelivr.net/npm/bootswatch/dist/brite/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="<?= esc(app_asset_url('css/style.css'), 'attr') ?>" rel="stylesheet">
<meta name="description" content="<?= esc($description, 'attr') ?>">
<meta name="robots" content="<?= esc($robots, 'attr') ?>">
<meta name="author" content="ArX Code">
<meta name="application-name" content="<?= esc($siteName, 'attr') ?>">
<meta property="og:site_name" content="<?= esc($siteName, 'attr') ?>">
<meta property="og:title" content="<?= esc($fullTitle, 'attr') ?>">
<meta property="og:description" content="<?= esc($description, 'attr') ?>">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= esc($canonicalUrl, 'attr') ?>">
<meta property="og:image" content="<?= esc($imageUrl, 'attr') ?>">
<meta property="og:image:secure_url" content="<?= esc($imageUrl, 'attr') ?>">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= esc($imageAlt, 'attr') ?>">
<meta property="og:locale" content="id_ID">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= esc($fullTitle, 'attr') ?>">
<meta name="twitter:description" content="<?= esc($description, 'attr') ?>">
<meta name="twitter:image" content="<?= esc($imageUrl, 'attr') ?>">
<meta name="twitter:image:alt" content="<?= esc($imageAlt, 'attr') ?>">
<script <?= csp_script_nonce() ?> type="application/ld+json"><?= json_encode($jsonLd, $jsonOptions) ?></script>
<link href="/favicon.ico" rel="icon" sizes="any">
<link href="/icon.svg" rel="icon" type="image/svg+xml">
<link href="/icon.png" rel="apple-touch-icon">
<link href="/site.webmanifest" rel="manifest">
<meta name="theme-color" content="#a2e436">
