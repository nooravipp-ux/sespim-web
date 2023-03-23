@extends('layouts.admin')
@section('title', 'Admin - Posts')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Roles</h4>
                    <a href="{{route('role.create')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nc = 1; ?>
                                @foreach($roles as $ct)
                                <tr>
                                    <td><?php echo $nc++; ?></td>
                                    <td>{{ $ct->name }}</td>
                                    <td>{{ $ct->description }}</td>
                                    <td>
                                        <a href="{{route('role.edit',['id' => $ct->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection