
@extends('layouts.admin')
@section('title', 'Admin - Perpustakaan')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Perpustakaan</h4>
                    <a href="{{route('perpustakaan.create')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($liblaries as $post)
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->description !!}</td>
                                    <td>
                                        <a href="{{route('perpustakaan.edit',['id' => $post->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('perpustakaan.delete',['id' => $post->id])}}" onclick="return confirm('apakah anda yakin ?')"><i class="icon-grid menu-icon ti-trash"></i></a>
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
