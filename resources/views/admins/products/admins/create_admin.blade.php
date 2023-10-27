@extends('layouts.parent')

@section('nav')
<li class="nav-item">
    <a href="{{route('adminType', $type)}}" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Home</p>
    </a>
</li>
@endsection

@section('title', 'Create Admin')

@section('content')

    <div class="row">
        <div class="col-12">
            @include('admins.incloudes.messages')
        </div>
        <div class="col-12">
            <form action="{{ route('store_admin', $type) }}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-row">
                    <div class="col-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter password" value="{{ old('password') }}">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option selected value="1">Active</option>
                            <option value="0">Not Active</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-4">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option {{ old('type') == 'admin' ? 'selected' : ' ' }} value="admin">Admin</option>
                            <option {{ old('type') == 'super_admin' ? 'selected' : ' ' }} value="super_admin">superadmin
                            </option>
                        </select>
                        @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-2 mt-3">
                        <button class="btn btn-primary" name="page" value="index">Create</button>
                    </div>
                    <div class="col-2 mt-3">
                        <button class="btn btn-dark" name="page" value="back">Create & Return</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
