<?PHP include('inc/header.php'); ?>
	<article class="post format-standard hentry">
		<header class="entry-header has-text-align-center header-footer-group">
			<div class="entry-header-inner section-inner medium">
				<h1 class="entry-title page-title"><?PHP echo $page_title; ?></h1>
			</div>
		</header>
		<div class="post-inner thin">
			<div class="entry-content">
<?PHP echo render($page_content); ?>
			</div>
		</div>
	</article>
	<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />
</main>
<?PHP include('inc/footer.php'); ?>
