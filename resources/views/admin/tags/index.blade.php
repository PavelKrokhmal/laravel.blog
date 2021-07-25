@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Main page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tags</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">

                <a href="{{ route('tags.create') }}" class="btn btn-primary mb-2">Add tag</a>
                @if(count($tags))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>
                                        <a href="{{route('tags.edit', ['tag' => $tag->id])}}" class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="post" class="float-left">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete confirm')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $tags->links() }}
                    </div>
                @else
                    <p>No tags...</p>
                @endif

            </div>
            <!-- /.card-body -->
        {{--            <div class="card-footer">--}}

        {{--            </div>--}}
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
