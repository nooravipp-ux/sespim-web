@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Page</h4>
                    <form class="form-sample" method="post" action="{{route('tentang.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Page Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="page_title" value="{{$data->page_title}}" />
                                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="description" height="600">{{$data->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Image Banner</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="image_banner">
                                        <input type="hidden" class="form-control" name="image_banner_existing" value="{{$data->image_banner}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Content</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="content" id="content-editor" height="400">{{$data->content}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('admin/vendors/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('content-editor');
</script>
@endsection