    <link rel="canonical" href="<?PHP echo $post_permalink; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?PHP echo $post_permalink; ?>"/>
    <meta property="article:published_time" content="<?PHP echo dater($post_date, DATE_ATOM); ?>"/>
<?PHP if(isset($post_updated)) : ?>
    <meta property="article:modified_time" content="<?PHP echo dater($post_updated, DATE_ATOM); ?>"/>
    <meta property="og:updated_time" content="<?PHP echo dater($post_updated, DATE_ATOM); ?>"/>
<?PHP else: ?>
    <meta property="article:modified_time" content="<?PHP echo dater($post_date, DATE_ATOM); ?>"/>
    <meta property="og:updated_time" content="<?PHP echo dater($post_date, DATE_ATOM); ?>"/>
<?PHP endif; ?>
<?PHP foreach($post_categories as $cat_name) : ?>
	<meta property="article:tag" content="<?PHP echo $cat_name; ?>"/>
<?PHP endforeach; ?>	
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@tyerhall" />
	<meta name="twitter:creator" content="@tyerhall" />
<?PHP if(isset($post_og_title)) : ?>
    <meta property="og:title" content="<?PHP echo $post_og_title; ?>"/>
	<meta name="twitter:title" content="<?PHP echo $post_og_title; ?>" />
<?PHP else : ?>
    <meta property="og:title" content="<?PHP echo $post_title; ?>"/>
	<meta name="twitter:title" content="<?PHP echo $post_title; ?>" />
<?PHP endif; ?>
<?PHP if(isset($post_og_description)) : ?>
    <meta property="og:description" content="<?PHP echo $post_og_description; ?>"/>
	<meta name="twitter:description" content="<?PHP echo $post_og_description; ?>" />
<?PHP endif; ?>
<?PHP if(isset($post_og_image)) : ?>
    <meta property="og:image" content="<?PHP echo $site_cdn; ?><?PHP echo $post_og_image; ?>"/>
    <meta property="og:image:secure_url" content="<?PHP echo $site_cdn; ?><?PHP echo $post_og_image; ?>"/>
	<meta name="twitter:image" content="<?PHP echo $site_cdn; ?><?PHP echo $post_og_image; ?>" />
<?PHP endif; ?>
<?PHP if(isset($post_og_image_alt)) : ?>
	<meta property="og:image:alt" content="<?PHP echo $post_og_image_alt; ?>" />
	<meta name="twitter:image:alt" content="<?PHP echo $post_og_image_alt; ?>" />
<?PHP endif; ?>