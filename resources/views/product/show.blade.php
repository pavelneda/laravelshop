@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product</h1>
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
                <div class="row mb-3">
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary mr-2">Edit</a>
                    <form action="{{ route('product.delete', $product->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
                <div class="row">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td>Title</td>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td>Content</td>
                                <td>{{ $product->content }}</td>
                            </tr>
                            <tr>
                                <td>Count</td>
                                <td>{{ $product->count }}</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td>Old price</td>
                                <td>{{ $product->old_price }}</td>
                            </tr>
                            <tr>
                                <td>Published</td>
                                <td>{{ $product->is_published ? 'Yes' : 'No' }}</td>
                            </tr>
                            @if($product->group)
                                <tr>
                                    <td>Group</td>
                                    <td>{{ $product->group->title }}</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
