@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
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
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mr-2">Edit</a>
                    <form action="{{ route('user.delete', $user->id) }}" method="post">
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
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Surname</td>
                            <td>{{ $user->surname }}</td>
                        </tr>
                        <tr>
                            <td>Patronymic</td>
                            <td>{{ $user->patronymic }}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{{ $user->age }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $user->address }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ $user->genderTitle }}</td>
                        </tr>
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
