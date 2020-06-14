		<div class="section-inner thin">
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
