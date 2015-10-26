<p>
<time class="updated" datetime="<?= get_post_time('c', true); ?>"><span class="glyphicon glyphicon-calendar"></span>  <?= get_the_date(); ?></time>
	<span class="glyphicon glyphicon-user"></span> 
	<?php __('Autor/ica:', 'sage');
	echo get_field('autor') ? get_field('autor') : get_the_author();
	?>
</p>
