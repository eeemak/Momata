@extends('website.layouts.master')
@section('style')
@endsection
@section('content')
<div class="top_panel_title top_panel_style_1  title_present scheme_original">
	<div class="top_panel_title_inner top_panel_inner_style_1  title_present_inner">
		<div class="content_wrap">
            <h1 class="page_title">PHOTO GALLERY</h1>
        </div>
	</div>
</div>
<div class="page_content_wrap page_paddings_yes">
	<div class="content_wrap">
		<div class="content">
			<div class="itemscope post_item post_item_single post_featured_default post_format_standard page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
				<div class="post_content" itemprop="articleBody">
					<div class="wrap">
						<div class="column_container">
							<div class="column-inner">
								<div class="wrapper">
									<!-- THE ESSENTIAL GRID 2.0.9.1 -->
									<!-- GRID WRAPPER FOR CONTAINER SIZING - HERE YOU CAN SET THE CONTAINER SIZE AND CONTAINER SKIN -->
									<div class="myportfolio-container minimal-light" id="esg-grid-1-1-wrap">
										<!-- THE GRID ITSELF WITH FILTERS, PAGINATION, SORTING ETC... -->
										<div id="esg-grid-1-1" class="esg-grid">
											<!-- ############################ -->
											<!-- THE GRID ITSELF WITH ENTRIES -->
											<!-- ############################ -->
											<ul>
											@foreach($gallery_list as $item)
												<li class="filterall filter-gallery filter-adoption filter-donation eg-washington-wrapper eg-post-id-462" data-date="1473690049">
													<!-- THE CONTAINER FOR THE MEDIA AND THE COVER EFFECTS -->
													<div class="esg-media-cover-wrapper">
														<!-- THE MEDIA OF THE ENTRY -->
														<div class="esg-entry-media"><img src="{{ asset($item->image_path ?? 'images/no-image.png') }}" alt=""></div>
														<!-- THE CONTENT OF THE ENTRY -->
														<div class="esg-entry-cover esg-fade" data-delay="0">
															<!-- THE COLORED OVERLAY -->
															<div class="esg-overlay esg-fade eg-washington-container" data-delay="0"></div>
															<div class="esg-center eg-post-462 eg-washington-element-0-a esg-falldown" data-delay="0.1"><a class="eg-washington-element-0 eg-post-462 esgbox" href="{{ asset($item->image_path ?? 'images/no-image.png') }}" title="Save Them All"><i class="eg-icon-search"></i></a></div>
															<div class="esg-center eg-post-462 eg-washington-element-1-a esg-falldown" data-delay="0.2"><a class="eg-washington-element-1 eg-post-462" href="#" target="_self"><i class="eg-icon-link"></i></a></div>
															<div class="esg-center eg-washington-element-8 esg-none esg-clear h5px"></div>
															<div class="esg-center eg-post-462 eg-washington-element-3 esg-flipup" data-delay="0.1">Save Them All</div>
															<div class="esg-center eg-washington-element-9 esg-none esg-clear h5px"></div>
														</div>
														<!-- END OF THE CONTENT IN THE ENTRY -->
													</div>
													<!-- END OF THE CONTAINER FOR THE MEDIA AND COVER/HOVER EFFECTS -->
												</li>
											@endforeach
											</ul>
											<!-- ############################ -->
											<!--      END OF THE GRID         -->
											<!-- ############################ -->
										</div>
										<!-- END OF THE GRID -->
									</div>
									<!-- END OF THE GRID WRAPPER -->
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- </div> class="post_content" itemprop="articleBody"> -->
			</div>
			<!-- </div> class="itemscope post_item post_item_single post_featured_default post_format_standard post-452 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->
			<br><br>
			{{ $gallery_list->links('website.layouts.pagination') }}
		</div>
		<!-- </div> class="content"> -->
	</div>
	<!-- </div> class="content_wrap"> -->
</div>
<!-- </.page_content_wrap> -->
@endsection
@section('script')
@endsection
