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
<meta content="initial-scale=1.0, width=device-width" name="viewport">
<meta content="ie=edge" http-equiv="X-UA-Compatible">
<title><?= esc($fullTitle) ?></title>
<link href="<?= esc($canonicalUrl, 'attr') ?>" rel="canonical">
<link href="https://cdn.jsdelivr.net" rel="preconnect">
<link href="https://cdn.jsdelivr.net" rel="dns-prefetch">
<link href="https://cdn.jsdelivr.net/npm/bootswatch/dist/brite/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="<?= esc(app_asset_url('css/style.css'), 'attr') ?>" rel="stylesheet">
<meta content="<?= esc($description, 'attr') ?>" name="description">
<meta content="<?= esc($robots, 'attr') ?>" name="robots">
<meta content="ArX Code" name="author">
<meta content="<?= esc($siteName, 'attr') ?>" name="application-name">
<meta content="<?= esc($siteName, 'attr') ?>" property="og:site_name">
<meta content="<?= esc($fullTitle, 'attr') ?>" property="og:title">
<meta content="<?= esc($description, 'attr') ?>" property="og:description">
<meta content="website" property="og:type">
<meta content="<?= esc($canonicalUrl, 'attr') ?>" property="og:url">
<meta content="<?= esc($imageUrl, 'attr') ?>" property="og:image">
<meta content="<?= esc($imageAlt, 'attr') ?>" property="og:image:alt">
<meta content="id_ID" property="og:locale">
<meta content="summary_large_image" name="twitter:card">
<meta content="<?= esc($fullTitle, 'attr') ?>" name="twitter:title">
<meta content="<?= esc($description, 'attr') ?>" name="twitter:description">
<meta content="<?= esc($imageUrl, 'attr') ?>" name="twitter:image">
<meta content="<?= esc($imageAlt, 'attr') ?>" name="twitter:image:alt">
<script <?= csp_script_nonce() ?> type="application/ld+json"><?= json_encode($jsonLd, $jsonOptions) ?></script>
<link href="/favicon.ico" rel="icon" sizes="any">
<link href="/icon.svg" rel="icon" type="image/svg+xml">
<link href="/icon.png" rel="apple-touch-icon">
<link href="/site.webmanifest" rel="manifest">
<meta content="#a2e436" name="theme-color">