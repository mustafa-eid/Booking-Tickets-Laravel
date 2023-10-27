<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this is teba lab">
    <title>project</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('project_style/Css/Tiket.css') }}">
</head>

<body>

    @extends('layouts.app')

    @section('content')
        <section class="Tiket-data text-center pb-md-5">
            <div class="container">
                <div class="row mt-5">
                    <div class="col-12">
                        <img class="mb-4 mt-5" src="Images/WhatsApp_Image_2023-05-02_at_00.27.08-removebg-preview (1).png"
                            alt="">
                        <h2 class="mb-0">Welcome to GetPass Tickets</h2>
                    </div>
                </div>
                @foreach ($parties as $party)
                    <div class="row mt-4">
                        <div class="col-md-8 col-12 pt-3 m-md-auto content-card">
                            <div class="text-start borderbottom ">
                                <img src="{{ url('dist/Images/' . $party->image) }}" alt="" width="300px">
                                <p class="text-light mt-3">{{ $party->name }}</p>
                                <p class="text-light">{{ $party->date }} - {{ $party->time }}</p>
                            </div>
                            <div
                                class="select d-flex justify-content-between align-items-center borderbottom p-3 ps-0 pe-0">
                                <span class="rounded-circle ms-md-4"></span>
                                <h3 class="text-light">Price per student</h3>
                                <div class="form-select w-50 " aria-label="Default select example">
                                    <option selected>{{ $other_people_price }} LE</option>
                                </div>
                            </div>
                            <form method="post" action="{{ route('update_other_people', $party->id) }}">
                                @csrf

                                <div
                                    class="select d-flex justify-content-between align-items-center  borderbottom p-3 ps-0 pe-0">
                                    <span class="rounded-circle ms-md-4"></span>
                                    <h3 class="text-light">other people</h3>
                                    <select name="other_people" class="form-select w-50" aria-label="Default select example"
                                        id="num-people">
                                        <option selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <button class="btn-back float-start mt-3 mb-3">
                                    <a href="Tiket.php" class="text-decoration-none text-light">
                                        Back
                                    </a>
                                </button>
                                <button class="btn float-end mt-3">Proceed</button>
                        </div>
                        </form>
                    </div>
                @endforeach
        </section>
    @endsection



</body>

</html>
