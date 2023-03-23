@extends('layouts.admin')
@section('title', 'Admin - Post')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Post</h4>
                    <form class="form-sample" method="post" action="{{route('post.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" value="{{$data->title}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$data->id}}"/>
                                        @if($errors->has('title'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="summary">{{$data->summary}}</textarea>
                                    </div>
                                </div>
                                @if(auth()->user()->role_id == 1)
                                <div class="form-group row categori-group">
                                    <label class="col-sm-12 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select type="text" class="form-control" name="category_id">
                                            <option value=""> - </option>
                                            @foreach($categories as $dc)
                                            <option value="{{$dc->id}}" <?php echo ($dc->id == $data->category_id) ? "selected" : "";?>> {{$dc->name}} </option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_id'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Image Banner</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="image_banner">
                                        <input type="hidden" class="form-control" name="image_banner_existing" value="{{$data->image_banner}}">
                                        <small id="emailHelp" class="form-text text-muted">Pilih Gambar Untuk Update Banner</small>
                                        @if($errors->has('image_banner'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('image_banner') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Publish</label>
                                    <div class="col-sm-9">
                                        <select type="text" class="form-control" name="published">
                                            <option value="1" <?php echo ($data->category_id == 1) ? "selected" : "";?>>Yes</option>
                                            <option value="0" <?php echo ($data->category_id == 0) ? "selected" : "";?>>No</option>
                                        </select>
                                        @if($errors->has('publish'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('publish') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Content</label>
                                    <div class="col-sm-9">
                                        <textarea type="file" class="form-control" name="content" id="content-editor" height="600">{{$data->content}}</textarea>
                                        @if($errors->has('content'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('content') }}</div>
                                        @endif
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