<?PHP include('inc/header.php'); ?>
<header class="archive-header has-text-align-center header-footer-group">
	<div class="archive-header-inner section-inner medium">
		<h1 class="archive-title"><span class="color-accent">Posts from</span> <?PHP echo dater($date_start, 'F Y'); ?></h1>
	</div>
</header>
<?PHP include('inc/archive-body.php'); ?>
</main>
<?PHP include('inc/footer.php'); ?>
