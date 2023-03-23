@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload E-Book</h4>
                    <form class="form-sample" method="post" action="{{route('perpustakaan.save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="title" />
                                        @if($errors->has('title'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Image Cover</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="image_cover">
                                        @if($errors->has('image_cover'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('image_cover') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="file">
                                        @if($errors->has('file'))
                                        <div class="error mt-3 text-danger">{{ $errors->first('file') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Summary</label>
                                    <div class="col-sm-9">
                                        <textarea type="file" class="form-control" name="description" id="content-editor" height="600"></textarea>
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