<header class="top_panel_wrap top_panel_style_6 scheme_original">
				<div class="top_panel_wrap_inner top_panel_inner_style_6 top_panel_position_above">
					<div class="top_panel_middle">
						<div class="content_wrap">
							<div class="contact_logo">
								<div class="logo">
									<a href="index.html"><img src="{{ asset('assets/website/images/logo-2.png') }}" class="logo_main" alt="" width="118" height="61"><img src="{{ asset('assets/website/images/logo-2.png') }}" class="logo_fixed" alt="" width="118" height="61"></a>
								</div>
							</div>
							<div class="contact_button">
								<a class="first_button" href="our-causes.html">Donate</a> </div>
							<div class="menu_main_wrap">
								<nav class="menu_main_nav_area menu_hover_fade">
									<ul id="menu_main" class="menu_main_nav">
                                    	<li class="menu-item menu-item-home  {{ Request::is('/') ? 'current-menu-item' : null }}"><a href="{{ route('home') }}"><span>Home</span></a></li>
                                        <li class="menu-item {{ Request::is('our-causes') ? 'current-menu-item' : null }}"><a href="{{ route('our_causes') }}"><span>Project/Program</span></a></li>
                                        <li class="menu-item  {{ Request::is('news') ? 'current-menu-item' : null }}"><a href="{{ route('news') }}"><span>News</span></a></li>
                                        <li class="menu-item  {{ Request::is('events') ? 'current-menu-item' : null }}"><a href="{{ route('events') }}"><span>Events</span></a></li>
                                        <li class="menu-item menu-item-45  {{ Request::is('about-us') ? 'current-menu-item' : null }}"><a href="{{ route('about_us') }}"><span>About Us</span></a></li>
										<li class="menu-item  {{ Request::is('contacts') ? 'current-menu-item' : null }}"><a href="{{ route('contacts') }}"><span>Contacts</span></a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>

				</div>
			</header>
            <div class="header_mobile">
				<div class="content_wrap">
					<div class="menu_button icon-menu"></div>
					<div class="logo">
						<a href="index.html"><img src="{{ asset('assets/website/images/logo-2.png') }}" class="logo_main" alt="" width="118" height="61"></a>
					</div>
				</div>
				<div class="side_wrap">
					<div class="close">Close</div>
					<div class="panel_top">
						<nav class="menu_main_nav_area">
							<ul id="menu_mobile" class="menu_main_nav">
                            <li class="menu-item current-menu-item menu-item-home current-menu-ancestor"><a href="{{ route('home') }}"><span>Home</span></a></li>
                            <li class="menu-item"><a href="{{ route('our_causes') }}"><span>Project/Program</span></a></li>
                            <li class="menu-item"><a href="{{ route('news') }}"><span>News</span></a></li>
                            <li class="menu-item"><a href="{{ route('events') }}"><span>Events</span></a></li>
                            <li class="menu-item menu-item-45"><a href="{{ route('about_us') }}"><span>About Us</span></a></li>
							<li class="menu-item"><a href="{{ route('contacts') }}"><span>Contacts</span></a></li>		
							</ul>
						</nav>
						<div class="search_wrap search_style_ search_state_fixed search_ajax">
							<div class="search_form_wrap">
								<form role="search" method="get" class="search_form" action="#">
									<button type="submit" class="search_submit icon-search" title="Start search"></button>
									<input type="text" class="search_field" placeholder="Search" value="" name="s" /></form>
							</div>
							<div class="search_results widget_area scheme_original">
								<a class="search_results_close icon-cancel"></a>
								<div class="search_results_content"></div>
							</div>
						</div>
					</div>



					<div class="contact_socials">
						<div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
							<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_twitter"><span class="icon-twitter"></span></a></div>
							<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_facebook"><span class="icon-facebook"></span></a></div>
							<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_vine"><span class="icon-vine"></span></a></div>
							<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_youtube"><span class="icon-youtube"></span></a></div>
							<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_pinterest-circled"><span class="icon-pinterest-circled"></span></a></div>
						</div>
					</div>

				</div>
				<div class="mask"></div>
			</div>
			
			