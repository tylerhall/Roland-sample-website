    <link rel="canonical" href="<?PHP echo $page_permalink; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?PHP echo $page_permalink; ?>"/>
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@tyerhall" />
	<meta name="twitter:creator" content="@tyerhall" />
<?PHP if(isset($page_og_title)) : ?>
    <meta property="og:title" content="<?PHP echo $page_og_title; ?>"/>
	<meta name="twitter:title" content="<?PHP echo $page_og_title; ?>" />
<?PHP else : ?>
    <meta property="og:title" content="<?PHP echo $page_title; ?>"/>
	<meta name="twitter:title" content="<?PHP echo $page_title; ?>" />
<?PHP endif; ?>
<?PHP if(isset($page_og_description)) : ?>
    <meta property="og:description" content="<?PHP echo $page_og_description; ?>"/>
	<meta name="twitter:description" content="<?PHP echo $page_og_description; ?>" />
<?PHP endif; ?>
<?PHP if(isset($page_og_image)) : ?>
    <meta property="og:image" content="<?PHP echo $site_cdn; ?><?PHP echo $page_og_image; ?>"/>
    <meta property="og:image:secure_url" content="<?PHP echo $site_cdn; ?><?PHP echo $page_og_image; ?>"/>
	<meta name="twitter:image" content="<?PHP echo $site_cdn; ?><?PHP echo $page_og_image; ?>" />
<?PHP endif; ?>
<?PHP if(isset($page_og_image_alt)) : ?>
	<meta property="og:image:alt" content="<?PHP echo $page_og_image_alt; ?>" />
	<meta name="twitter:image:alt" content="<?PHP echo $page_og_image_alt; ?>" />
<?PHP endif; ?>