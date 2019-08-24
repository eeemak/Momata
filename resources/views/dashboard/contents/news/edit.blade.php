@extends('dashboard.layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('content')

<div id="edit" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('news.index') }}">
            <button type="submit" class="close">&times;</button>
        </form>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit News</h4>
            </div>
            <div class="modal-body">
                    <form action="{{ route('news.update', $news) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>News Title <span class="text-danger">*</span></label>
                            <input name="title" class="form-control" type="text" value="{{ $news->title }}">
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="5" cols="5" class="form-control summernote" placeholder="Enter your description here">{{ $news->description }}</textarea>
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                            <label>Date</label>
                            <div class="cal-icon">
                                <input name="date" class="form-control datetimepicker" type="text" value="{{ Carbon\Carbon::parse($news->date)->format('d/m/Y') }}">
                                <small class="text-danger">{{ $errors->first('date') }}</small>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            @if($news->image_path)
                            <div>
                                <img src="{{ asset($news->image_path) }}" alt="image" style="height: 100px; width: 100px; border: 2px solid #ddd; margin: 2px 0;">
                            </div>
                            @endif
                            <label>Image</label>
                            <input name="image" class="form-control" type="file">
                            <small>Max: 500 KB</small>
                            <small class="text-danger">{{ $errors->first('image') }}</small>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Featured</label>
                                    <div class="col-md-9">
                                        <label class="radio-inline">
                                            @php
                                                $featured_remain_count = \App\Models\News::featured_remain_count() + $news->featured;
                                            @endphp
                                            <input type="radio" name="featured" {{ $news->featured ? 'checked' : null }} value="1" @if ($featured_remain_count <= 0) disabled @endif> Featured
                                            @if ($featured_remain_count <= 0) 
                                            <small class="text-danger" title="Max feature item: {{ config('dashboard.modules.news.featured_max_item') }}">(Exceed limit)</small>
                                            @else 
                                            <small class="text-primary" title="Max feature item: {{ config('dashboard.modules.news.featured_max_item') }}">(Remain {{ $featured_remain_count }})</small>
                                            @endif
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="featured"  {{ !$news->featured ? 'checked' : null }} value="0"> Normal
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Active</label>
                                    <div class="col-md-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="active"  {{ $news->active ? 'checked' : null }} value="1"> Active
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="active" {{ !$news->active ? 'checked' : null }} value="0"> Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary btn-lg">Save Changes</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $('#edit').modal('show')
    </script>
@endsection