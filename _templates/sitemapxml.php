<?PHP echo '<'; ?>?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<?PHP foreach($posts_posts as $p) : 
			extract($p, EXTR_PREFIX_ALL, 'post'); 
	?>
	<url>
		<loc><?PHP echo $post_permalink; ?></loc>
		<lastmod><?PHP echo dater($post_date, 'Y-m-d'); ?></lastmod>
	</url>
	<?PHP endforeach; ?>
</urlset>
