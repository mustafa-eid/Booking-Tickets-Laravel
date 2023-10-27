<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this is teba lab">
    <title>project</title>
    <link rel="shortcut icon" href="" type="image/x-icon">

    <link rel="stylesheet" href="{{ url('project_style/Css/style.css') }}">

    <link rel="stylesheet" href="{{ url('project_style/Css/Tiket.css') }}">


</head>

<body>
    @extends('layouts.app')

    @section('content')
        <section class="Tiket-data text-center">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <img class="mb-4 mt-5" src="Images/WhatsApp_Image_2023-05-02_at_00.27.08-removebg-preview (1).png"
                            alt="">
                        <h2 class="mb-0">Welcome to GetPass Tickets</h2>
                    </div>
                </div>
                
                @foreach ($parties as $party)
                <div class="row text-center mt-4 gy-5 align-items-center">
                    <div class="col-12 col-md-4 offset-md-2  ps-md-0">
                        <div class="imgMask">
                            <div class="img">
                                <img src="{{url('dist/img/products/' . $party->image)}}">
                            </div>
                        </div>
                    </div>

                        <div class="col-12 col-md-5 data-tiket text-start text-light">
                            <label for="">Party Name</label>
                            <p class="fs-4 pb-4 name-party mb-0">{{ $party->name }} </p>
                            <div class="time d-flex justify-content-between align-items-center pt-3 ">
                                <p class="border border-0 mb-0">{{ $party->date }} </p>
                                <p>{{ $party->time }} </p>
                            </div>
                            <p class="fs-4 pb-4 name-party mb-0">{{ $party->location }} </p>
                            <p class="fs-4 pb-4 name-party mb-0">{{ $party->description }} </p>
                            <div class="price d-flex justify-content-between align-items-center">
                                <p class="border border-0 text-light pt-3 pb-0 fs-4">price</p>
                                <p class="border border-1 mt-3 ps-3 pe-3 pt-1 pb-1">{{ $party->price }} LE</p>
                            </div>
                        </div>
                        <div class="offset-md-2 col-md-9 col-11 ps-md-0 mt-4">
                            <h3 class="text-light text-start">Book your tickets</h3>
                        </div>
                        <div class="offset-md-2 col-md-9 col-11 pt-3 pb-3 mb-5 mt-0 box-submit">
                            <div class="d-flex justify-content-between align-items-center flex-wrap ">
                                <p class="mb-md-0 text-light fs-4 partyname"><i class="fa-solid fa-user fs-5 icon"></i>
                                    {{ $party->name }}
                                </p>
                                <p class="text-light mb-md-0 date">{{ $party->date }} - {{ $party->time }}</p>
                                <form action="{{ route('select_people', $party->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('GET')
                                    <button name="book_tiket" class="btn float-end p-0"
                                        class="text-decoration-none text-light p-md-4 pt-2 pb-2">
                                        Book Tiket</button>
                                </form>
                            </div>
                        </div>
                </div>
                @endforeach
        </section>
    @endsection

</body>

</html>
