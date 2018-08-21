<ul class="nav nav-list sidebar-list">
	<li style="margin-bottom: 12px"><strong>Installed:</strong> Kirby <?php echo $kirby; ?></li>
	<li>
	<?php if($latest == $kirby):
		echo '<strong style="color: #8dae28">You have the latest version installed!</strong>';
	else:
		echo '<a href="' . $link . '" style="padding-left: 0; color: #b3000a"><i class="fa fa-chain"></i> <strong> New version available: </strong> Kirby ' . $latest . ' </a>';
	endif; ?>
	</li>
</ul>
