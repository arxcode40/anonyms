<?php require_once(sprintf('%s/system/Message/Read.php', App::base_dir())); ?>

<form action="<?= App::base_url(); ?>" class="input-group mb-3" method="get">
	<a class="btn btn-secondary" href="<?= App::base_url(); ?>" role="button">
		<i class="bi bi-arrow-clockwise"></i>
	</a>
	<input class="form-control" name="s" placeholder="Cari Pesan" type="search">
	<button class="btn btn-secondary" type="submit">
		<i class="bi bi-search"></i>
	</button>
</form>
<?php if($get_messages->num_rows): ?>
	<p class="card-text">Menampilkan <?= $total_messages; ?> Pesan</p>
	<?php while($message = $get_messages->fetch_assoc()): ?>
		<div class="alert alert-secondary" role="alert">
		  <div class="mb-3">
		  	<p class="text-truncate mb-0"><?= $message['message']; ?></p>
		  	<a class="alert-link flex-shrink-0 message" href="" data-bs-target="#modal" data-bs-toggle="modal" id="<?= $message['id']; ?>" role="button">Lihat Detail</a>
		  </div>
		  <div class="d-flex justify-content-between">
		  	<small><?= date('d-m-Y', $message['timestamp']); ?></small>
		  	<small><?= date('H:i:s', $message['timestamp']); ?></small>
		  </div>
		</div>
	<?php endwhile; ?>
	<nav>
	  <ul class="pagination mb-0">
	  	<?php $navigate = Get::has('s') ? sprintf('?s=%s&p', Get::get('s')) : '?p'; ?>
	    <li class="page-item">
	    	<a class="<?php if($active_page == 1) echo('disabled'); ?> page-link" href="<?= sprintf('%s=%s', $navigate, $active_page - 1); ?>">&laquo;</a>
	    </li>
	    <?php for($i = 1; $i <= $total_page; $i++): ?>
		    <li class="page-item">
		    	<a class="<?php if($i === $active_page) echo('active'); ?> page-link" href="<?= sprintf('%s=%s', $navigate, $i); ?>"><?= $i; ?></a>
		    </li>
	  	<?php endfor; ?>
	    <li class="page-item">
	    	<a class="<?php if($active_page == $total_page) echo('disabled'); ?> page-link" href="<?= sprintf('%s=%s', $navigate, $active_page + 1); ?>">&raquo;</a>
	    </li>
	  </ul>
	</nav>
<?php else: ?>
	<p class="mb-0">Pesan anonim kamu tidak tersedia.</p>
<?php endif; ?>