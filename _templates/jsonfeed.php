<?PHP
	$feed = array();
	$feed['version'] = 'https://jsonfeed.org/version/1';
	$feed['title'] = $site_rss_title;
	$feed['home_page_url'] = $site_base_url;
	$feed['feed_url'] = $site_base_url . 'feed.json';

	$items = array();
	
	foreach($posts_posts as $p) {
		extract($p, EXTR_PREFIX_ALL, 'post'); 

		if(strlen($post_excerpt) > 0) {
			 $excerpt = $post_excerpt;
		 } else {
			$stripped = strip_tags($post_content);
			$split_pos = strposx($stripped, ' ', 50);
			$excerpt = '<p>' . substr($stripped, 0, $split_pos) . '...</p>';
		}
		
		$item = array();
		$item['id'] = $post_permalink;
		$item['url'] = $post_permalink;
		$item['title'] = $post_title;
		$item['content_html'] = render($post_content);
		$item['summary'] = $excerpt;
		$item['date_published'] = dater($post_date, DATE_RFC3339);
		$item['date_modified'] = dater($post_date, DATE_RFC3339);
		$item['author'] = array('name' => $site_default_post_author);
		$item['tags'] = $post_categories;
	
		$items[] = $item;
	}

	$feed['items'] = $items;

	echo json_encode($feed);
