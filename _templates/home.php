<?PHP include('inc/header.php'); ?>
<?PHP foreach($archive_post_ids as $id) : ?>
	<?PHP
		$post = $site_posts[$id];
		extract($post, EXTR_PREFIX_ALL, 'post');
	?>
	<article class="post-2018 post type-post status-publish format-standard hentry category-apps category-favorite-things category-macos category-reviews" id="post-2018">
		<header class="entry-header has-text-align-center">
			<div class="entry-header-inner section-inner medium">
				<h2 class="entry-title heading-size-1"><a href="<?PHP echo $post_permalink; ?>"><?PHP echo $post_title; ?></a></h2>
				<div class="post-meta-wrapper post-meta-single post-meta-single-top">
					<ul class="post-meta">
						<li class="post-date meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text">Post date</span>
								<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"><path fill="" d="M4.60069444,4.09375 L3.25,4.09375 C2.47334957,4.09375 1.84375,4.72334957 1.84375,5.5 L1.84375,7.26736111 L16.15625,7.26736111 L16.15625,5.5 C16.15625,4.72334957 15.5266504,4.09375 14.75,4.09375 L13.3993056,4.09375 L13.3993056,4.55555556 C13.3993056,5.02154581 13.0215458,5.39930556 12.5555556,5.39930556 C12.0895653,5.39930556 11.7118056,5.02154581 11.7118056,4.55555556 L11.7118056,4.09375 L6.28819444,4.09375 L6.28819444,4.55555556 C6.28819444,5.02154581 5.9104347,5.39930556 5.44444444,5.39930556 C4.97845419,5.39930556 4.60069444,5.02154581 4.60069444,4.55555556 L4.60069444,4.09375 Z M6.28819444,2.40625 L11.7118056,2.40625 L11.7118056,1 C11.7118056,0.534009742 12.0895653,0.15625 12.5555556,0.15625 C13.0215458,0.15625 13.3993056,0.534009742 13.3993056,1 L13.3993056,2.40625 L14.75,2.40625 C16.4586309,2.40625 17.84375,3.79136906 17.84375,5.5 L17.84375,15.875 C17.84375,17.5836309 16.4586309,18.96875 14.75,18.96875 L3.25,18.96875 C1.54136906,18.96875 0.15625,17.5836309 0.15625,15.875 L0.15625,5.5 C0.15625,3.79136906 1.54136906,2.40625 3.25,2.40625 L4.60069444,2.40625 L4.60069444,1 C4.60069444,0.534009742 4.97845419,0.15625 5.44444444,0.15625 C5.9104347,0.15625 6.28819444,0.534009742 6.28819444,1 L6.28819444,2.40625 Z M1.84375,8.95486111 L1.84375,15.875 C1.84375,16.6516504 2.47334957,17.28125 3.25,17.28125 L14.75,17.28125 C15.5266504,17.28125 16.15625,16.6516504 16.15625,15.875 L16.15625,8.95486111 L1.84375,8.95486111 Z" /></svg>
							</span>
							<span class="meta-text">
								<a href="<?PHP echo $post_permalink; ?>"><?PHP echo dater($post_date, 'F j, Y'); ?></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<?PHP include('inc/post-excerpt.php'); ?>
		<div class="section-inner thin">
			<br>
			<div class="entry-categories">
				<span class="screen-reader-text">Categories</span>
				<div class="entry-categories-inner">
					<?PHP foreach($post_categories as $cat_name) : ?>
					<?PHP $c = $site_categories_by_name[$cat_name]; ?>
					<a href="<?PHP echo $c['permalink']; ?>" rel="category tag"><?PHP echo $c['name']; ?></a>
					<?PHP endforeach; ?>
				</div>
			</div>
		</div>
	</article>
	<div class="section-inner thin">
		<hr class="post-separator styled-separator is-style-wide" aria-hidden="true" />
	</div>
<?PHP endforeach; ?>
	<div class="pagination-wrapper section-inner">
		<nav class="navigation pagination" role="navigation" aria-label="Posts">
			<h2 class="screen-reader-text">Posts navigation</h2>
			<div class="nav-links">
				<?PHP if(isset($archive_previous_archive_permalink)) : ?>
				<a class="prev page-numbers" href="<?PHP echo $archive_previous_archive_permalink; ?>"><span aria-hidden="true">&larr;</span> <span class="nav-prev-text">Newer <span class="nav-short">Posts</span></span></a>
				<?PHP else: ?>
				<span class="prev page-numbers placeholder" aria-hidden="true"><span aria-hidden="true">&larr;</span> <span class="nav-prev-text">Newer <span class="nav-short">Posts</span></span></span>
				<?PHP endif; ?>

				<?PHP $numbers = compute_pages($archive_total_pages, $archive_page_number); ?>
				
				<?PHP foreach($numbers as $page_num) : ?>
				<?PHP if($page_num === false) : ?>
				<span class="page-numbers dots">&hellip;</span>				
				<?PHP elseif($page_num == $archive_page_number) : ?>
				<span aria-current="page" class="page-numbers current"><?PHP echo $page_num; ?></span>
				<?PHP elseif($page_num == 1) : ?>
				<a class="page-numbers" href="<?PHP echo $site_base_url; ?>">1</a>
				<?PHP else : ?>
				<a class="page-numbers" href="<?PHP echo $site_base_url; ?>page/<?PHP echo $page_num; ?>/"><?PHP echo $page_num; ?></a>
				<?PHP endif; ?>
				<?PHP endforeach; ?>

				<?PHP if(isset($archive_next_archive_permalink)) : ?>
				<a class="next page-numbers" href="<?PHP echo $archive_next_archive_permalink; ?>"><span class="nav-next-text">Older <span class="nav-short">Posts</span></span> <span aria-hidden="true">&rarr;</span></a>
				<?PHP else: ?>
				<span class="next page-numbers placeholder" aria-hidden="true"><span class="nav-next-text">Older <span class="nav-short">Posts</span></span> <span aria-hidden="true">&rarr;</span></span>
				<?PHP endif; ?>
			</div>
		</nav>
	</div>
</main>
<?PHP include('inc/footer.php'); ?>
