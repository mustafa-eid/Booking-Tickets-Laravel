@extends('layouts.parent')


@section('nav')
    <li class="nav-item">
        <a href="{{ route('adminType', $type) }}" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Home</p>
        </a>
    </li>
@endsection

@section('title', 'Create Party')

@section('content')
    <div class="row">
        <div class="col-12">
            @include('admins.incloudes.messages')
        </div>
        <div class="col-12">
            <form action="{{ route('store_party', $type) }}" method="post" enctype="multipart/form-data">

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
                    <div class="col-4">
                        <label for="price">Price</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="Enter price"
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" placeholder="Enter date"
                            value="{{ old('date') }}">
                        @error('date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="time">Time</label>
                        <input type="time" name="time" class="form-control" id="time" placeholder="Enter time"
                            value="{{ old('time') }}">
                        @error('time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-4">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option {{ old('status') == 1 ? 'selected' : ' ' }} value="1">Active</option>
                            <option {{ old('status') == 0 ? 'selected' : ' ' }} value="0">Not Active</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" id="location"
                            placeholder="Enter location" value="{{ old('location') }}">
                        @error('location')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="other_people_price">other people price</label>
                        <input type="number" name="other_people_price" class="form-control" id="other_people_price"
                            placeholder="Enter other people price" value="{{ old('other_people_price') }}">
                        @error('other_people_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-6">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12">
                        <label for="image">Img</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
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
