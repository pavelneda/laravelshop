@extends('layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
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
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <input type="text" value="{{ $user->name ?? old('name') }}" name="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $user->surname ?? old('surname') }}" name="surname" placeholder="Surname" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $user->patronymic ?? old('patronymic') }}" name="patronymic" placeholder="Patronymic" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number" value="{{ $user->age ?? old('age') }}" name="age" placeholder="Age" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" value="{{ $user->address ?? old('address') }}" name="address" placeholder="Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="gender">
                                <option disabled selected>Gender</option>
                                <option {{ $user->gender == 1 || old('gender') == 1 ? ' selected' : '' }} value="1">Male</option>
                                <option {{ $user->gender == 2 || old('gender') == 2 ? ' selected' : '' }} value="2">Female</option>
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
