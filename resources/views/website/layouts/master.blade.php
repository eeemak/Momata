<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
	<title>Momata</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="format-detection" content="telephone=no"><link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
    {{-- Common Styles --}}
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
	<link rel='dns-prefetch' href='http://s.w.org/' />
	<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CRaleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-font-WCManoNegraBta-style-css' href="{{asset('assets/website/css/font-face/WCManoNegraBta/stylesheet.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-fontello-style-css' href="{{asset('assets/website/css/fontello/css/fontello.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='essential-grid-plugin-settings-css' href="{{asset('assets/website/js/vendor/plugins/essential-grid/public/assets/css/settings.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='rs-plugin-settings-css' href="{{asset('assets/website/js/vendor/plugins/revslider/public/assets/css/settings.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-animation-style-css' href="{{asset('assets/website/js/vendor/fw/css/core.animation.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-plugin.donations-style-css' href="{{asset('assets/website/css/plugin.donations.css')}}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-swiperslider-style-css' href="{{asset('assets/website/js/vendor/fw/js/swiper/swiper.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-main-style-css' href="{{asset('assets/website/css/style.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-main-style-inline-css' href="{{asset('assets/website/css/global.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-shortcodes-style-css' href="{{asset('assets/website/js/vendor/shortcodes/theme.shortcodes.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-responsive-style-css' href="{{asset('assets/website/css/responsive.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='trx-donations-style-css'  href="{{asset('assets/website/js/vendor/plugins/trx_donations/trx_donations.css') }}" type='text/css' media='all' />
	<link property="stylesheet" rel='stylesheet' id='charity_is_hope-grid-css' href="{{asset('assets/website/css/grid.css') }}" type='text/css' media='all' />
    {{-- Page Styles --}}
    @yield('style')
</head>

<body class="page page-template-default body_style_wide top_style_header_6 body_filled article_style_stretch layout_single-standard template_single-standard scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide">
<a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="http://charity-is-hope.themerex.net/" data-separator="yes"></a>
	<a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>
	<div class="body_wrap">
		<div class="page_wrap">
		<div class="top_panel_fixed_wrap"></div>
            {{-- Header --}}
            @include('website.layouts.header')
                    {{-- Content --}}
					@yield('content')
			{{-- Footer --}}
            @include('website.layouts.footer')
			<!-- /.footer_wrap -->
			<div class="copyright_wrap copyright_style_text  scheme_original">
				<div class="copyright_wrap_inner">
					<div class="content_wrap">
						<div class="copyright_text">
							<p><a href="#">Momota</a> © 2019 All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.page_wrap -->
	</div>
	<!-- /.body_wrap -->
	<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <div class="custom_html_section"></div>
    {{-- Common Scripts --}}
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/jquery.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/jquery-migrate.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/plugins/essential-grid/public/assets/js/jquery.themepunch.tools.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/plugins/essential-grid/public/assets/js/jquery.themepunch.essential.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/fw/js/superfish.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/fw/js/core.utils.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/fw/js/core.init.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/custom/theme.init.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/shortcodes/theme.shortcodes.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/vendor/fw/js/swiper/swiper.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/custom/global.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/website/js/custom/rev_slider_2_1.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/website/js/vendor/plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/website/js/vendor/plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/website/js/vendor/plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/website/js/vendor/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/website/js/custom/grid.js') }}"></script>
	{{-- Page Scripts --}}
    @yield('script')
</body>
</html>
