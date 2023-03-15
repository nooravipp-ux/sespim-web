@extends('layouts.admin')
@section('title', 'Admin - Tentang')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tentang</h4>
                    <a href="{{route('tentang.create')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Page</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nc = 1; ?>
                                @foreach($pages as $pg)
                                <tr>
                                    <td><?php echo $nc++; ?></td>
                                    <td>{{ $pg->page_title }}</td>
                                    <td>{{ $pg->description }}</td>
                                    <td>
                                        <a href="{{route('tentang.edit',['id' => $pg->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
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