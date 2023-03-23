@extends('layouts.admin')
@section('title', 'Admin - Posts')
@section('content')
<div class="content-wrapper">
    <div class="row">
        @if(auth()->user()->role_id == 1)
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category</h4>
                    <a href="" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th>Desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $nc = 1; ?>
                                @foreach($categories as $ct)
                                <tr>
                                    <td><?php echo $nc++; ?></td>
                                    <td>{{ $ct->name }}</td>
                                    <td>{{ $ct->desc }}</td>
                                    <td>
                                        <a href=""><i class="icon-grid menu-icon ti-pencil"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Posts</h4>
                    <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Summary
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th class="text-center">
                                        Published
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($posts as $post)
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category_name }}</td>
                                    <td>{{ $post->summary }}</td>
                                    <td>{{ $post->name}}</td>
                                    <td class="text-center">
                                        @if($post->published == 1)
                                        Yes
                                        @else
                                        No
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('post.edit',['id' => $post->id])}}"><i class="icon-grid menu-icon ti-pencil"></i></a>
                                        <a href="{{route('post.delete',['id' => $post->id])}}" onclick="return confirm('apakah anda yakin ?')"><i class="icon-grid menu-icon ti-trash"></i></a>
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

@section('script')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection