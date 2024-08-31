@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create user</h1>
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
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" value="{{ old('name') }}" name="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" value="{{ old('password') }}" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" placeholder="Confrim password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('surname') }}" name="surname" placeholder="Surname" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('patronymic') }}" name="patronymic" placeholder="Patronymic" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" value="{{ old('age') }}" name="age" placeholder="Age" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ old('address') }}" name="address" placeholder="Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender">
                                <option disabled selected>Gender</option>
                                <option {{ old('gender') == 1 ? ' selected' : '' }} value="1">Male</option>
                                <option {{ old('gender') == 2 ? ' selected' : '' }} value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add" class="btn btn-primary">
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
