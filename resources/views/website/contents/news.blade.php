@extends('website.layouts.master')
@section('style')
@endsection
@section('content')
<div class="top_panel_title top_panel_style_1  title_present scheme_original">
	<div class="top_panel_title_inner top_panel_inner_style_1  title_present_inner">
		<div class="content_wrap">
            <h1 class="page_title">All News</h1>
        </div>
	</div>
</div>
<div class="page_content_wrap page_paddings_yes">
	<div class="content_wrap wrapper">
		<div class="content">
            @foreach($news_list as $item)
			<div class="post_item post_item_excerpt post_featured_left post_format_standard odd post-470 post type-post status-publish format-standard has-post-thumbnail hentry category-gallery tag-adoption tag-donation">
				<div class="post_featured">
					<div class="post_thumb" data-image="{{ asset($item->image_path ?? 'images/no-image.png') }}" data-title="American Humane Association">
						<a class="hover_icon hover_icon_link" href="{{ route('news_detail', $item) }}"><img width="770" height="434" alt="American Humane Association" src="{{ asset($item->image_path ?? 'images/no-image.png') }}"></a>
					</div>
				</div>
				<div class="post_content clearfix">
					<h3 class="post_title"><a href="{{ route('news_detail', $item) }}">{{ $item->title }}</a></h3>
					<div class="post_info">
						<span class="post_info_item post_info_posted"> <a href="{{ route('news_detail', $item) }}" class="post_info_date">{{ optional($item->date)->format('F d, Y') ?? 'Unknown date' }}</a></span>
						<span class="post_info_item post_info_counters">	<a class="post_counters_item post_counters_views icon-eye-inv" title="Views - 62" href="single-post.html"><span class="post_counters_number">62</span></a>
						<a class="post_counters_item post_counters_comments icon-comment-inv" title="Comments - 0" href="single-post.html#respond"><span class="post_counters_number">0</span></a>
						<a class="post_counters_item post_counters_likes icon-heart enabled" title="Like" href="#" data-postid="470" data-likes="2" data-title-like="Like" data-title-dislike="Dislike"><span class="post_counters_number">2</span></a>
						</span>
					</div>
					<div class="post_descr">
						<p>{{ str_limit($item->description, 200) }}</p>
						<a href="{{ route('news_detail', $item) }}" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">Learn more</a>
					</div>
				</div>
				<!-- /.post_content -->
            </div>
            @endforeach
		</div>
	</div>
    {{ $news_list->links('website.layouts.pagination') }}
</div>
<!-- </.page_content_wrap> -->
@endsection
@section('script')
@endsection
