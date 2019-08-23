@extends('dashboard.layouts.master')
@section('style')
@endsection
@section('content')

<div id="detail" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="{{ route('news.index') }}">
                <button type="submit" class="close">&times;</button>
            </form>
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4 class="modal-title">News Detail
                        <a href="#" class="btn btn-danger rounded pull-right" data-toggle="modal" data-target="#delete" ng-click="delete_url = '{{ route('news.destroy', $news) }}'"><i class="fa fa-trash"></i> Delete</a>
                        <a href="{{ route('news.edit', $news) }}" class="btn btn-primary rounded pull-right"><i class="fa fa-edit"></i> Edit</a>
                    </h4>
                    
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>News Title</label>
                    <input name="title" class="form-control" type="text" value="{{ $news->title }}" readonly>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="5" cols="5" class="form-control summernote" placeholder="Enter your description here" readonly>{{ $news->description }}</textarea>
                </div>
                <div class="form-group">
                    @if($news->image_path)
                    <label>Image</label>
                    <div>
                        <img src="{{ asset($news->image_path) }}" alt="image" style="height: 100px; width: 100px; border: 2px solid #ddd; margin: 2px 0;">
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Featured</label>
                            <div class="col-md-9">
                                <label class="radio-inline">
                                    <input type="radio" name="featured" {{ $news->featured ? 'checked' : null }} value="1" disabled> Featured
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="featured"  {{ !$news->featured ? 'checked' : null }} value="0" disabled> Normal
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Active</label>
                            <div class="col-md-9">
                                <label class="radio-inline">
                                    <input type="radio" name="active"  {{ $news->active ? 'checked' : null }} value="1" disabled> Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active" {{ !$news->active ? 'checked' : null }} value="0" disabled> Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <h4 class="modal-title">Delete News</h4>
                </div>
                <div class="modal-body card-box">
                    <p>Are you sure want to delete this?</p>
                    <form action="@{{ delete_url }}" method="post">
                        @csrf @method('DELETE')
                        <div class="m-t-20"> <a href="#" class="btn btn-default" data-toggle="modal" data-target="#detail">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#detail').modal('show')
    </script>
@endsection