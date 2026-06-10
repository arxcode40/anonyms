<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Navigasi Halaman" class="mt-3 mb-0">
    <ul class="flex-wrap justify-content-center pagination">
        <?php if ($pager->hasPreviousPage()): ?>
            <li class="page-item">
                <a aria-label="Halaman Pertama" class="page-link" href="<?= $pager->getFirst() ?>">
                    <i aria-hidden="true" class="bi bi-chevron-double-left"></i>
                </a>
            </li>
            <li class="page-item">
                <a aria-label="Halaman Sebelumnya" class="page-link" href="<?= $pager->getPreviousPage() ?>">
                    <i aria-hidden="true" class="bi bi-chevron-left"></i>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
            <li class="<?= $link['active'] ? 'active' : '' ?> page-item">
                <a aria-label="Halaman <?= esc($link['title']) ?>" <?= $link['active'] ? 'aria-current="page"' : '' ?>
                    class="page-link" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()): ?>
            <li class="page-item">
                <a aria-label="Halaman Berikutnya" class="page-link" href="<?= $pager->getNextPage() ?>">
                    <i aria-hidden="true" class="bi bi-chevron-right"></i>
                </a>
            </li>
            <li class="page-item">
                <a aria-label="Halaman Terakhir" class="page-link" href="<?= $pager->getLast() ?>">
                    <i aria-hidden="true" class="bi bi-chevron-double-right"></i>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>
