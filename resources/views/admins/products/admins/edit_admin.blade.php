@extends('layouts.parent')


@section('nav')
<li class="nav-item">
    <a href="{{route('adminType', $type)}}" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>Home</p>
    </a>
</li>
@endsection

@section('title', 'Create Products')

@section('title', 'Edit Admin')

@section('content')
<div class="row">
    <div class="col-12">
        @include('admins.incloudes.messages')
    </div>
    <div class="col-12">
        <form action="{{ route('update_admin', ['id' => $admin->id, 'type' => $type]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option {{ $admin->status == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{ $admin->status == 0 ? 'selected' : '' }} value="0">Not Active</option>
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
                        <option {{ $admin->type == 'superAdmin' ? 'selected' : '' }} value="superAdmin">Super Admin</option>
                        <option {{ $admin->type == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                    </select>
                    @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-2 mt-3">
                    <button class="btn btn-primary" name="page" value="index">Update</button>
                </div>
                <div class="col-2 mt-3">
                    <button class="btn btn-dark" name="page" value="back">Update & Return</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection