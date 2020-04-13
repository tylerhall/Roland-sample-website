<?PHP
	$date_format = 'D, d M Y H:i:s O'; // RFC-822 *except* RSS wants a 4 digit year
	$first_post = $posts_posts[0];
?>
<?PHP echo '<'; ?>?xml version="1.0" encoding="UTF-8"?><rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>

<channel>
	<title><?PHP echo $site_rss_title; ?></title>
	<atom:link href="<?PHP echo $site_base_url; ?>feed/" rel="self" type="application/rss+xml" />
	<link><?PHP echo $site_base_url; ?></link>
	<description><?PHP echo $site_rss_description; ?></description>
	<lastBuildDate><?PHP echo dater($first_post['date'], $date_format); ?></lastBuildDate>
	<language><?PHP echo $site_rss_language_code; ?></language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>https://github.com/tylerhall/roland/</generator>
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
	<item>
		<title><?PHP echo $post_title; ?></title>
		<link><?PHP echo $post_permalink; ?></link>
		<dc:creator><![CDATA[<?PHP echo $site_default_post_author; ?>]]></dc:creator>
		<pubDate><?PHP echo dater($post_date, $date_format); ?></pubDate>
		<?PHP foreach($post_categories as $cat_name) : ?>
		<category><![CDATA[<?PHP echo $cat_name; ?>]]></category>		
		<?PHP endforeach; ?>
		<guid isPermaLink="false"><?PHP echo $post_permalink; ?></guid>
		<description><![CDATA[<?PHP echo $excerpt; ?>]]></description>
		<content:encoded><![CDATA[<?PHP echo render($post_content); ?>]]></content:encoded>
	</item>
	<?PHP endforeach; ?>
</channel>
</rss>
