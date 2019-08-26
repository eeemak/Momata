@extends('website.layouts.master')
@section('style')
@endsection
@section('content')
<div class="page_content_wrap page_paddings_yes">
    <div class="content_wrap wrapper">
        <div class="content">
            <div id="post-407" class="post_item_single post_type_donation post-407 donation type-donation status-publish has-post-thumbnail hentry donation_category-second-group">
                <div class="post_sidebar">
                    <div class="post_featured">
                        <img width="570" height="320" src="{{ asset($project->image_path ?? 'images/no-image.png') }}" class="attachment-thumb_med size-thumb_med" alt="Sponsor Ecology Today" /> </div>
                    <!-- .post_featured -->
                    <div class="post_help">Help us attain our goal</div>
                    <div class="post_supporters">
                        <h5 class="post_supporters_title">Group&#039;s supporters to date</h5>
                        <div class="post_supporters_count">No supporters yet</div>
                    </div>
                </div>

                <div class="post_body">
                    <div class="post_header entry-header">
                        <h1 class="post_title entry-title">{{ $project->title }}</h1>
                        <div class="post_info">
                            <span class="post_info_item post_date">{{ optional($project->date)->format('F d, Y') ?? 'Unknown date' }}</span>
                        </div>
                    </div>
                    <!-- .entry-header -->


                    <div class="post_content entry-content">
                        <p>{{ $project->description }}</p>
                    </div>
                    <!-- .entry-content -->

                    <!-- .entry-footer -->
                </div>
                <!-- .post_body -->
            </div>
        </div>
        <!-- </div> class="content"> -->
    </div>
    <!-- </div> class="content_wrap"> -->
</div>
<!-- </.page_content_wrap> -->
@endsection
@section('script')
@endsection
