@extends('layouts.admin')
@section('title', 'Admin - Edit Role')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Role</h4>
                    <form class="form-sample" method="post" action="{{route('role.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Role Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" value="{{$role->name}}"/>
                                        <input type="hidden" class="form-control" name="id" value="{{$role->id}}"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description" value="{{$role->description}}"/>
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

@endsection