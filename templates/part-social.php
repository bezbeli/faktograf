<?php 
$facebook_account 	= get_field('facebook_account', 'options');
$twitter_account 	= get_field('twitter_account', 'options');
$youtube_account 	= get_field('youtube_account', 'options');
$search_box 		= get_field('search_box', 'options');

 ?>

<ul id="social" class="nav navbar-nav navbar-right hidden-xs hidden-sm hidden-md">
	<?php if ($facebook_account) { ?>
	<li class="menu-item">
		<a title="facebook" target="_blank" href="<?php echo $facebook_account; ?>"><span class="fa fa-facebook-square fa-lg"></span></a>
	</li>
	<?php } ?>
	<?php if ($twitter_account) { ?>
	<li class="menu-item">
		<a title="twitter" target="_blank" href="<?php echo $twitter_account; ?>"><span class="fa fa-twitter fa-lg"></span></a>
	</li>
	<?php } ?>
	<?php if ($youtube_account) { ?>
	<li class="menu-item">
		<a title="youtube" target="_blank" href="<?php echo $youtube_account; ?>"><span class="fa fa-youtube-square fa-lg"></span></a>
	</li>
	<?php } ?>
	<?php if ($search_box) { ?>
	<li class="menu-item">
		<a title="search" data-toggle="collapse" href="#search-box" aria-expanded="false" aria-controls="search-box">
			<span class="fa fa-search fa-lg"></span>
		</a>
	</li>
	<?php } ?>
</ul>

<ul id="mobile-social" class="hidden-lg">
	<?php if ($facebook_account) { ?>
	<li class="menu-item">
		<a title="facebook" target="_blank" href="https://www.facebook.com/"><span class="fa fa-facebook-square fa-lg"></span></a>
	</li>
	<?php } ?>
	<?php if ($twitter_account) { ?>
	<li class="menu-item">
		<a title="twitter" target="_blank" href="https://twitter.com/"><span class="fa fa-twitter fa-lg"></span></a>
	</li>
	<?php } ?>
	<?php if ($youtube_account) { ?>
	<li class="menu-item">
		<a title="youtube" target="_blank" href="https://www.youtube.com/channel/"><span class="fa fa-youtube-square fa-lg"></span></a>
	</li>
	<?php } ?>
	<?php if ($search_box) { ?>
	<li class="menu-item">
		<a title="search" data-toggle="collapse" href="#search-box" aria-expanded="false" aria-controls="search-box">
			<span class="fa fa-search fa-lg"></span>
		</a>
	</li>
	<?php } ?>
</ul>