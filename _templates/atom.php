<?PHP echo '<'; ?>?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">

  <title><?PHP echo $site_rss_title; ?></title>
  <link href="<?PHP echo $site_base_url; ?>"/>
  <link rel="self" type="application/atom+xml" href="<?PHP echo $site_base_url; ?>feed/atom/"/>
  <updated><?PHP echo dater($first_post['date'], DATE_ATOM); ?></updated>
  <author>
    <name><?PHP echo $site_default_post_author; ?></name>
  </author>
  <id><?PHP echo $site_base_url; ?>atom.xml</id>

	<?PHP foreach($posts_posts as $p) : 
			extract($p, EXTR_PREFIX_ALL, 'post'); 
			
			if(strlen($post_excerpt) > 0) {
				 $excerpt = $post_excerpt;
			 } else {
				$stripped = strip_tags($post_content);
				$split_pos = strposx($stripped, ' ', 50);
				$excerpt = '<p>' . substr($stripped, 0, $split_pos) . '...</p>';
			}
	?>
  <entry>
    <title><?PHP echo $post_title; ?></title>
    <link href="<?PHP echo $post_permalink; ?>"/>
    <id><?PHP echo $post_permalink; ?></id>
    <updated><?PHP echo dater($post_date, DATE_ATOM); ?></updated>
    <summary type="html"><?PHP echo htmlspecialchars($excerpt); ?></summary>
	<content type="html">
		<?PHP echo htmlspecialchars(render($post_content)); ?>
	</content>
	<?PHP foreach($post_categories as $cat_name) : ?>
	<category term="<?PHP echo $cat_name; ?>"/>
	<?PHP endforeach; ?>
  </entry>
  <?PHP endforeach; ?>

</feed>
