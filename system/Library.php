<?php
	$libraries = glob(sprintf('%s/anonyms/system/Library/*.php', $_SERVER['DOCUMENT_ROOT']));
	foreach($libraries as $library):
		require_once($library);
	endforeach;
?>