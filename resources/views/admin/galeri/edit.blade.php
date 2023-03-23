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
                                        <select class="form-control" name="media_type" id="media_type">
                                            <option value="1" <?php echo ($data->media_type == 1) ? "selected" : "";?>>Image</option>
                                            <option value="2" <?php echo ($data->media_type == 2) ? "selected" : "";?>>Video</option>
                                            <option value="3" <?php echo ($data->media_type == 3) ? "selected" : "";?>>Embed Youtube</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="file">
                                    <label class="col-sm-12 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="file">
                                        <input type="hidden" class="form-control" name="file_existing" value="{{$data->file}}">
                                    </div>
                                </div>
                                <div class="form-group row" id="link">
                                    <label class="col-sm-12 col-form-label">Link</label>
                                    <div class="col-sm-9">
                                        <textarea type="file" class="form-control" name="link" height="400">{{$data->link}}</textarea>
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
<script src="{{asset('admin/vendors/ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#file').hide();
        $('#link').hide();

        var media_type = $('#media_type').val();
        if (media_type) {
            if ($('#media_type').val() == 1 || $('#media_type').val() == 2) {
                $('#link').hide();
                $('#file').show();
            } else {
                $('#file').hide();
                $('#link').show();
            }
        }
    });
</script>
<script>
    $('#media_type').change(function() {
        if ($('#media_type').val() == 1 || $('#media_type').val() == 2) {
            $('#link').hide();
            $('#file').show();
        } else {
            $('#file').hide();
            $('#link').show();
        }
    });
</script>
@endsection