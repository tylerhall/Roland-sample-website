<!DOCTYPE html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="preconnect" href="https://cdn.tyler.io/" crossorigin>
	<link rel="dns-prefetch" href="https://cdn.tyler.io">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link rel="preconnect" href="https://cdn.clickontyler.com/" crossorigin>
	<link rel="dns-prefetch" href="https://cdn.clickontyler.com">

<meta http-equiv="Content-Security-Policy" content="
default-src * data: blob:;
style-src * 'unsafe-inline';
script-src * 'unsafe-inline' 'unsafe-eval';">

	<link rel='stylesheet' href='<?PHP echo $site_cdn; ?>/css/style.css?ver=<?PHP echo $meta_microtime; ?>' media='all'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,900&display=swap">

	<?PHP if(($meta_layout == 'post') && (strpos($post_content, '[tylervideo') !== false)) : ?>
	<script src="https://vjs.zencdn.net/7.7.5/video.min.js"></script>
	<link rel="stylesheet" href="https://vjs.zencdn.net/7.7.5/video-js.min.css">
	<link rel="stylesheet" href="<?PHP echo $site_cdn; ?>/css/iplayer.min.css?ver=<?PHP echo $meta_microtime; ?>">
	<?PHP endif; ?>

	<link rel='stylesheet' href='<?PHP echo $site_cdn; ?>/css/print.css?ver=<?PHP echo $meta_microtime; ?>' media='print'>
	
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-KJ9MSKH');</script>
	
	<?PHP if($meta_layout == 'post') : ?>
	<title><?PHP echo $post_title; ?> &#8211; tyler.io</title>
	<?PHP elseif($meta_layout == 'page') : ?>
	<title><?PHP echo $page_title; ?> &#8211; tyler.io</title>
	<?PHP elseif(($meta_layout == 'home') && ($archive_page_number == 1)) : ?>
	<title>tyler.io</title>
	<?PHP elseif(($meta_layout == 'home') && ($archive_page_number > 1)) : ?>
	<title>tyler.io - Page <?PHP echo $archive_page_number; ?></title>
	<?PHP elseif($meta_layout == 'category') : ?>
	<title>Posts about "<?PHP echo $category_name; ?>" &#8211; tyler.io</title>
	<?PHP elseif($meta_layout == 'date') : ?>
	<title>Posts from <?PHP echo dater($date_start, 'F Y'); ?> &#8211; tyler.io</title>
	<?PHP else : ?>
	<title>tyler.io</title>
	<?PHP endif; ?>

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?PHP echo $site_cdn; ?>/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?PHP echo $site_cdn; ?>/favicon-196x196.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="<?PHP echo $site_cdn; ?>/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?PHP echo $site_cdn; ?>/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?PHP echo $site_cdn; ?>/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?PHP echo $site_cdn; ?>/favicon-128.png" sizes="128x128" />
	
	<link rel="authorization_endpoint" href="https://indieauth.com/auth">
	<link rel="token_endpoint" href="https://tokens.indieauth.com/token">
	<link rel="microsub" href="https://aperture.p3k.io/microsub/498">
	<link rel="webmention" href="https://webmention.io/tyler.io/webmention" />
	<link rel="pingback" href="https://webmention.io/tyler.io/xmlrpc">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="me" href="https://twitter.com/tylerhall">
	<link rel="me" href="https://github.com/tylerhall">
	<link rel="me" href="https://www.linkedin.com/in/tylerhall">
	<link rel="me" href="mailto:rth@tyler.io">

	<link rel="alternate" type="application/rss+xml" title="tyler.io &raquo; All Posts" href="https://tyler.io/feed/">
	<!-- <?PHP echo $meta_microtime; ?> -->
</head>
<?PHP if($meta_layout == 'post') : ?>
<body class="post-template-default single single-post single-format-standard singular footer-top-visible">
<?PHP endif; ?>
<?PHP if($meta_layout == 'page') : ?>
<body class="post-template-default single single-post single-format-standard singular footer-top-visible">
<?PHP endif; ?>
<?PHP if($meta_layout == 'home') : ?>
<body class="home blog footer-top-visible">
<?PHP endif; ?>
<?PHP if($meta_layout == 'category') : ?>
<body class="home blog footer-top-visible">
<?PHP endif; ?>
<?PHP if($meta_layout == 'date') : ?>
<body class="home blog footer-top-visible">
<?PHP endif; ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ9MSKH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<header id="site-header" class="header-footer-group" role="banner" style="position:relative;">
		<div class="header-inner section-inner">
			<div>
				<p>
					<a href="<?PHP echo $site_base_url; ?>"><img width="50" height="50" src="<?PHP echo $site_cdn; ?>/images/cot-100.png" /></a>
					<a href="<?PHP echo $site_base_url; ?>" class="fml-logo">tyler.io</a>
				</p>
				<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
					<span class="toggle-inner">
						<a href="#more">Menu &darr;</a>
					</span>
				</button>
			</div>
			<div class="header-navigation-wrapper">
				<nav class="primary-menu-wrapper" aria-label="Horizontal" role="navigation">
					<ul class="primary-menu reset-list-style">
						<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home"><a href="<?PHP echo $site_base_url; ?>">Recent Posts</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?PHP echo $site_base_url; ?>workshop/">Workshop</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?PHP echo $site_base_url; ?>now/">Now</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?PHP echo $site_base_url; ?>portfolio/">Portfolio</a></li>
						<li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?PHP echo $site_base_url; ?>about/">About</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
</div>
<main id="site-content" role="main">
