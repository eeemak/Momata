@extends('website.layouts.master')
@section('style')
@endsection
@section('content')
<div class="top_panel_title top_panel_style_1  title_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_1  title_present_inner">
        <div class="content_wrap">
            <h1 class="page_title">Our Project</h1> </div>
    </div>
</div>

<div class="page_content_wrap page_paddings_no">
    <div class="content_wrap">
        <div class="content">
            <div class="itemscope post_item post_item_single post_featured_default post_format_standard post-29 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
                <div class="post_content" itemprop="articleBody">
                    <div class="wrap">
                        <div class="column_container">
                            <div class="column-inner">
                                <div class="wrapper">
                                    <div class="h25"></div>
                                    <div id="sc_donations_52156518" class="sc_donations sc_donations_style_excerpt">
                                        <div class="sc_donations_columns_wrap">
                                            @foreach($project_list as $item)
                                            <div class="post_item_excerpt post_type_donation sc_donations_column-1_3">
                                                <div class="post_featured"><img width="570" height="320" style="height:180px;" src="{{ asset($item->image_path ?? 'images/no-image.png') }}" class="attachment-thumb_med size-thumb_med" alt="Education to Every Child" /> </div>
                                                <!-- .post_featured -->
                                                <div class="post_body">
                                                    <div class="post_header entry-header"><h4 class="entry-title"><a href="single-cause.html" rel="bookmark">{{ $item->title }}</a></h4> </div>
                                                    <!-- .entry-header -->
                                                    <div class="post_content entry-content">
                                                        <p>{{ str_limit($item->description) }}</p>
                                                        <div class="post_info_donations">
                                                            <div class="top">
                                                                <span class="post_info_item post_raised"><span class="post_counters_label">Raised</span></span>
                                                                <span class="post_info_item post_goal"><span class="post_counters_label">Goal</span></span>
                                                            </div>
                                                            <div class="middle"><span></span></div>
                                                            <div class="bottom">
                                                                <span class="post_counters_number_raised">3535.00 USD</span>
                                                                <span class="post_counters_number_goal">9000.00 USD</span>
                                                            </div>
                                                        </div>
                                                        <a class="more-link" href="single-cause.html">Donate</a> </div>
                                                    <!-- .entry-content -->
                                                </div>
                                                <!-- .post_body -->
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- /.sc_donations -->
                                    {{ $project_list->links('website.layouts.pagination') }}
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrap block_1474283141363">
                        <div class="column_container">
                            <div class="column-inner">
                                <div class="wrapper">
                                    <div class="h10"></div>
                                    <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 donate_demo margin_top_huge margin_bottom_huge">
                                        <div class="column-1_2 sc_column_item sc_column_item_1 odd first"></div>
                                        <div class="column-1_2 sc_column_item sc_column_item_2 even">
                                            <div class="sc_section margin_left_tiny">
                                                <div class="sc_section_inner">
                                                    <div class="sc_section_content_wrap">
                                                        <h2 class="sc_title sc_title_regular margin_top_huge margin_bottom_tiny">Help cindy<br />back to school</h2>
                                                        <div id="sc_call_to_action_1405665886" class="sc_call_to_action sc_call_to_action_accented sc_call_to_action_style_1 sc_call_to_action_align_left margin_bottom_tiny">
                                                            <div class="sc_call_to_action_info">
                                                                <div class="sc_call_to_action_descr sc_item_descr">Pellentesque lacinia urna eget luctus faucibus. Sus<br /> pendisse potenti. Morbi accumsan, arcu et feugiat hen<br /> drerit, odio quam egestas risus, tincidunt gravida est<br /> risus ut enim.</div>
                                                                <div class="sc_call_to_action_buttons sc_item_buttons">
                                                                    <div class="sc_call_to_action_button sc_item_button"><a href="#" class="sc_button sc_button_square sc_button_style_filled3 sc_button_size_large  sc_button_iconed icon-arrow">Donate Now</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wpb_text_column ">
                                                            <div class="wrapper"><p><a href="#"><span>www.backtoschool.com</span></a></p></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h50"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- </div> class="post_content" itemprop="articleBody"> -->
            </div>
            <!-- </div> class="itemscope post_item post_item_single post_featured_default post_format_standard post-29 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->


        </div>
        <!-- </div> class="content"> -->
    </div>
    <!-- </div> class="content_wrap"> -->
</div>
<!-- </.page_content_wrap> -->
@endsection
@section('script')
@endsection
