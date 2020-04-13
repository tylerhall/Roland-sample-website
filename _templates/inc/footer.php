</main>
<a name="more" ></a>
<div class="footer-nav-widgets-wrapper header-footer-group">
	<div class="footer-inner section-inner">
		<aside class="footer-widgets-outer-wrapper" role="complementary">
			<div class="footer-widgets-wrapper">
				<div class="footer-widgets column-one grid-item">
					<div class="widget widget_pages">
						<div class="widget-content">
							<h2 class="widget-title subheading heading-size-3">Hi, there.</h2>
							<ul>
								<li class="page_item"><a href="<?PHP echo $site_base_url; ?>about/">About</a></li>
								<li class="page_item"><a href="<?PHP echo $site_base_url; ?>portfolio/">Portfolio</a></li>
								<li class="page_item"><a href="<?PHP echo $site_base_url; ?>now/">What I&#8217;m Doing Right Now</a></li>
								<li class="page_item"><a href="<?PHP echo $site_base_url; ?>workshop/">The Workshop</a></li>
							</ul>
						</div>
					</div>
					<div class="widget widget_pages">
						<div class="widget-content">
							<ul>
								<li class="page_item"><a href="<?PHP echo $site_base_url; ?>feed/"><img src="<?PHP echo $site_cdn; ?>/images/rss-2.gif" width="60px" height="20px"></a></li>
								<li class="page_item">
									<a href="https://twitter.com/tylerhall/"><img src="<?PHP echo $site_cdn; ?>/images/garbage-company-2.png" width="24px" height="20px" alt="@tylerhall"></a><a href="https://twitter.com/tylerhall/" class="mini">@tylerhall</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="widget widget_nav_menu">
						<div class="widget-content">
							<h2 class="widget-title subheading heading-size-3">Popular Topics</h2>
							<div class="menu-popular-topics-container">
								<ul id="menu-popular-topics" class="menu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page">
										<a href="<?PHP echo $site_base_url; ?>productivity-and-omnifocus/">Productivity &#038; OmniFocus</a>
									</li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page">
										<a href="<?PHP echo $site_base_url; ?>indie-mac-software-business/">Indie Mac Software Business</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="widget widget_categories">
						<div class="widget-content">
							<h2 class="widget-title subheading heading-size-3">Categories</h2>
							<ul>
								<?PHP foreach($site_categories as $c) : ?>
								<?PHP if(count($c['children']) == 0) : ?>
								<li class="cat-item"><a href="<?PHP echo $c['permalink']; ?>"><?PHP echo $c['name']; ?></a> (<?PHP echo $c['all_posts_count']; ?>)</li>
								<?PHP else: ?>
								<li class="cat-item"><a href="<?PHP echo $c['permalink']; ?>"><?PHP echo $c['name']; ?></a> (<?PHP echo $c['all_posts_count']; ?>)
									<ul class='children'>
										<?PHP foreach($c['children'] as $child) : ?>
										<li class="cat-item"><a href="<?PHP echo $child['permalink']; ?>"><?PHP echo $child['name']; ?></a> (<?PHP echo $child['all_posts_count']; ?>)</li>
										<?PHP endforeach; ?>
									</ul>
								</li>
								<?PHP endif; ?>
								<?PHP endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="widget_text widget widget_custom_html">
						<div class="widget_text widget-content">
							<h2 class="widget-title subheading heading-size-3">My Apps</h2>
							<div class="textwidget custom-html-widget">
								<div class="dumb-wp">
									<p>
										<a href="https://clickontyler.com/virtualhostx/"><img src="<?PHP echo $site_cdn; ?>/images/vhx-index-3.jpg" alt="VirtualHostX Pro logo" /></a>
										<br>
										<a href="https://clickontyler.com/virtualhostx/">VirtualHostX Pro</a><br>
										<small>Build and test multiple websites on your Mac.</small>
									</p>
									<p>
										<a href="https://clickontyler.com/hostbuddy/"><img src="<?PHP echo $site_cdn; ?>/images/hostbuddy-index-3.jpg" alt="VirtualHostX Pro logo" /></a>
										<br>
										<a href="https://clickontyler.com/hostbuddy/">Hostbuddy</a><br>
										<small>Tame your /etc/hosts file.</small>
									</p>
									<p>
										<a href="https://clickontyler.com/hobo/"><img src="<?PHP echo $site_cdn; ?>/images/hobo-index-3.jpg" alt="VirtualHostX Pro logo" /></a>
										<br>
										<a href="https://clickontyler.com/hobo/">Hobo</a><br>
										<small>The premiere Vagrant app for Mac.</small>
									</p>
									<p>
										<a href="https://clickontyler.com/rebudget/"><img src="<?PHP echo $site_cdn; ?>/images/rebudget-index3.jpg" alt="Rebudget logo" /></a>
										<br>
										<a href="https://clickontyler.com/rebudget/">Rebudget</a><br>
										<small>Forecast Your Personal Finances.</small>
									</p>
									<p>
										<a href="https://commandqapp.com"><img src="<?PHP echo $site_cdn; ?>/images/cq2-index-3.jpg" alt="VirtualHostX Pro logo" /></a>
										<br>
										<a href="https://commandqapp.com">CommandQ</a><br>
										<small>Never accidentally quit an app or mistakenly close a window again.</small>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-widgets column-two grid-item">
					<div class="widget widget_archive">
						<div class="widget-content">
							<h2 class="widget-title subheading heading-size-3">Archives</h2>
							<ul>
								<?PHP foreach($site_date_groups as $arr) : ?>
								<?PHP
									$ts = $arr['ts'];
									$count = $arr['count'];
									$date = dater($ts, 'F Y');
									$slug = dater($ts, 'Y/m/');
								?>
								<li><a href='<?PHP echo $site_base_url; ?><?PHP echo $slug; ?>'><?PHP echo $date; ?></a></li>
								<?PHP endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</aside>
	</div>
</div>
<footer id="site-footer" role="contentinfo" class="header-footer-group">
	<div class="section-inner">
		<p class="">tyler.io is written by <a href="<?PHP echo $site_base_url; ?>about/">Tyler Hall</a> and powered by <a href="https://github.com/tylerhall/Roland/"><strong>Roland</strong></a>.</p>
	</div>
</footer>
</body>
</html>
