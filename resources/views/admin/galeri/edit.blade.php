@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload image</h4>
                    <form class="form-sample" method="post" action="{{route('galeri.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="{{$data->title}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Media Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="media_type">
                                            <option value="image" <?php echo ($data->media_type == 'image') ? "selected" : "";?>>Image</option>
                                            <option value="video"  <?php echo ($data->media_type == 'video') ? "selected" : "";?>>Video</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="file">
                                        <input type="hidden" class="form-control" name="file_existing" value="{{$data->file}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="description" id="content-editor" height="400">{{$data->description}}</textarea>
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
<!-- <script src="{{asset('admin/vendors/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('content-editor');
</script> -->
@endsection