@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Main</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" value="{{ $product->title ?? old('title') }}" name="title" placeholder="Title"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" cols="20" rows="5" class="form-control"
                                      placeholder="Description">{{ $product->description ?? old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="content" id="" cols="20" rows="5" class="form-control"
                                      placeholder="Content">{{ $product->content ?? old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" value="{{ $product->count ?? old('count') }}" name="count" placeholder="Count"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $product->price ?? old('price') }}" name="price" placeholder="Price"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $product->old_price ?? old('old_price') }}" name="old_price" placeholder="Old price"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="preview_image" type="file" class="custom-file-input"
                                           id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Select category</option>
                                @foreach($categories as $category)
                                    <option {{ $product->category_id == $category->id || old('category_id') == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="group_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected" disabled>Select group</option>
                                @foreach($groups as $group)
                                    <option {{ $product->group_id == $group->id || old('group_id') == $group->id ? ' selected' : '' }} value="{{ $group->id }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="select_tags" name="tags[]" multiple="multiple"
                                    data-placeholder="Select a Tag" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="select_colors" name="colors[]" multiple="multiple"
                                    data-placeholder="Select a Color" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
