<?PHP include('inc/header.php'); ?>
	<article class="post format-standard hentry">
		<header class="entry-header has-text-align-center header-footer-group">
			<div class="entry-header-inner section-inner medium">
				<h1 class="entry-title p-name"><?PHP echo $post_title; ?></h1>
				<div class="post-meta-wrapper post-meta-single post-meta-single-top">
					<ul class="post-meta">
						<li class="post-date meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text">Post date</span>
								<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19"><path fill="" d="M4.60069444,4.09375 L3.25,4.09375 C2.47334957,4.09375 1.84375,4.72334957 1.84375,5.5 L1.84375,7.26736111 L16.15625,7.26736111 L16.15625,5.5 C16.15625,4.72334957 15.5266504,4.09375 14.75,4.09375 L13.3993056,4.09375 L13.3993056,4.55555556 C13.3993056,5.02154581 13.0215458,5.39930556 12.5555556,5.39930556 C12.0895653,5.39930556 11.7118056,5.02154581 11.7118056,4.55555556 L11.7118056,4.09375 L6.28819444,4.09375 L6.28819444,4.55555556 C6.28819444,5.02154581 5.9104347,5.39930556 5.44444444,5.39930556 C4.97845419,5.39930556 4.60069444,5.02154581 4.60069444,4.55555556 L4.60069444,4.09375 Z M6.28819444,2.40625 L11.7118056,2.40625 L11.7118056,1 C11.7118056,0.534009742 12.0895653,0.15625 12.5555556,0.15625 C13.0215458,0.15625 13.3993056,0.534009742 13.3993056,1 L13.3993056,2.40625 L14.75,2.40625 C16.4586309,2.40625 17.84375,3.79136906 17.84375,5.5 L17.84375,15.875 C17.84375,17.5836309 16.4586309,18.96875 14.75,18.96875 L3.25,18.96875 C1.54136906,18.96875 0.15625,17.5836309 0.15625,15.875 L0.15625,5.5 C0.15625,3.79136906 1.54136906,2.40625 3.25,2.40625 L4.60069444,2.40625 L4.60069444,1 C4.60069444,0.534009742 4.97845419,0.15625 5.44444444,0.15625 C5.9104347,0.15625 6.28819444,0.534009742 6.28819444,1 L6.28819444,2.40625 Z M1.84375,8.95486111 L1.84375,15.875 C1.84375,16.6516504 2.47334957,17.28125 3.25,17.28125 L14.75,17.28125 C15.5266504,17.28125 16.15625,16.6516504 16.15625,15.875 L16.15625,8.95486111 L1.84375,8.95486111 Z" /></svg>
							</span>
							<span class="meta-text">
								<a href="<?PHP echo $post_permalink; ?>"><time class="dt-published" datetime="<?PHP echo dater($post_date, DATE_ATOM); ?>"><?PHP echo dater($post_date, 'F j, Y'); ?></time></a>
							</span>
						</li>
					</ul>
				</div>
				<div id="cbn">
					<script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CE7DV2QL&placement=tylerio" id="_carbonads_js"></script>
				</div>
			</div>
		</header>
<?PHP if(isset($post_og_description)) : ?>
		<p class="p-summary" style="display: none;"><?PHP echo $post_og_description; ?></p>
<?PHP endif; ?>
		<div class="post-inner thin">
			<div class="entry-content e-content">
<?PHP echo render($post_content); ?>
			</div>
		</div>
		<br>
		<div class="section-inner thin">
			<hr class="styled-separator is-style-wide" aria-hidden="true" />
			<p class="byline h-card">Posted by <a href="<?PHP echo $site_base_url;?>about/" class="p-author p-name u-url">Tyler Hall</a> on <?PHP echo dater($post_date, 'F j, Y'); ?> in</p>
		</div>
		<?PHP include('inc/post-categories-list.php'); ?>
		<div class="entry-header-inner section-inner thin">
			<hr class="styled-separator is-style-wide" aria-hidden="true" />
			<p class="has-text-align-center">Possibly Related Posts</p>
			<ul>
				<?PHP for($i = 0; $i < min(3, count($post_related_posts)); $i++) : ?>
				<?PHP
					$related_title = $post_related_posts[$i]['title'];
					$related_permalink = $post_related_posts[$i]['permalink'];
				?>
				<li><a href="<?PHP echo $related_permalink; ?>"><?PHP echo $related_title; ?></a></li>
				<?PHP endfor; ?>
			</ul>
		</div>
		<div class="entry-header-inner section-inner thin">
			<hr class="styled-separator is-style-wide" aria-hidden="true" />
			<script src="https://cdn.fastcomments.com/js/embed.min.js"></script>
			<div id="fastcomments-widget"></div>
			<script>
			    window.FastCommentsUI(document.getElementById('fastcomments-widget'), {
			        tenantId: 'OKEodPPi9l'
			    });
			</script>
		</div>
		<nav class="pagination-single section-inner only-one only-prev" aria-label="Post" role="navigation">
			<hr class="styled-separator is-style-wide" aria-hidden="true" />
			<div class="pagination-single-inner">
				<?PHP if(isset($post_previous_post)) : ?>
				<?PHP $p = $post_previous_post; ?>
				<a class="previous-post" href="<?PHP echo $p['permalink']; ?>">
					<span class="arrow" aria-hidden="true">&larr;</span>
					<span class="title"><span class="title-inner"><?PHP echo $p['title']; ?></span></span>
				</a>
				<?PHP endif; ?>
				<?PHP if(isset($post_next_post)) : ?>
				<?PHP $p = $post_next_post; ?>
				<a class="next-post" href="<?PHP echo $p['permalink']; ?>">
					<span class="arrow" aria-hidden="true">&rarr;</span>
					<span class="title"><span class="title-inner"><?PHP echo $p['title']; ?></span></span>
				</a>
				<?PHP endif; ?>
			</div>
			<hr class="styled-separator is-style-wide" aria-hidden="true" />
		</nav>
	</article>
</main>
<?PHP include('inc/footer.php'); ?>
