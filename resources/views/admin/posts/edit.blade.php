@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>New post</h1>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit post</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('posts.update', ['post'=>$post->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $post->title }}"
                                           placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                              id="description" name="description" rows="3"
                                              placeholder="Description...">{{ $post->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror"
                                              id="content" name="content" rows="3"
                                              placeholder="Content...">{{ $post->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Select category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        {{--                                        <option>Select category</option>--}}
                                        @foreach($categories as $k => $v)
                                            <option value="{{ $k }}" @if($k == $post->category_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <select class="select2"
                                            multiple="multiple"
                                            name="tags[]"
                                            id="tags"
                                            data-placeholder="Select a State"
                                            style="width: 100%;">
                                        {{--                                        <option>Select tag</option>--}}

                                            @php

                                            $tagsById = $post->tags->pluck('id')->all();


                                            @endphp

                                        @foreach($tags as $k => $v)
                                            <option value="{{ $k }}" @if(in_array($k, $tagsById)) selected @endif>{{ $v }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>

                                    <div>
                                        <img src="{{ $post->getImage() }}" alt="thumbnail"
                                             class="img-thumbnail mt-2"
                                             width="160px">
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
