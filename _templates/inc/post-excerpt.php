		<div class="post-inner thin ">
			<div class="entry-content">
				<?PHP if(strlen($post_excerpt) > 0) : ?>
				<?PHP echo $post_excerpt; ?>
				<?PHP else:
					$stripped = strip_tags($post_content);
					$split_pos = strposx($stripped, ' ', 50);
					echo '<p>' . substr($stripped, 0, $split_pos) . '...</p>';
				?>
				<?PHP endif; ?>
				<p class="has-text-align-center"><a href="<?PHP echo $post_permalink; ?>">Read More &raquo;</a></p>
			</div>
		</div>
