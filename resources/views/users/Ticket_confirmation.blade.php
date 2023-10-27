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
                        <div class="col-12 col-md-12 col-lg-9 m-lg-auto">
                            <div class="row align-items-center w-100">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="data-left">
                                        <div class="text-start">
                                            <img src="Images/add card.jpg" alt="" width="300px">
                                            <p class="text-light mt-3">{{ $party->name }}</p>
                                            <p class="text-light">{{ $party->date }} - {{ $party->time }}</p>
                                        </div>
                                        <button class="btn-back float-start mt-3 mb-3">
                                            <a href="data-number-tiket.php"
                                                class="text-decoration-none text-light p-md-5 pt-3 pb-3">
                                                Back
                                            </a>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-1 p-0 d-none d-lg-block">
                                    <div class="vertical-line"></div>
                                </div>
                                <div class="col-12 col-md-5 text-light text-start">
                                    <div class="row ms-1 borderbottom mb-3 mt-3">

                                        <div class="col-3 p-0">
                                            <p>Party Name</p>
                                        </div>
                                        <div class="col-3">
                                            <p>Student Tiket Price</p>
                                        </div>
                                        <div class="col-3">Other Tiket Price</div>
                                    </div>
                                    <div class="row ms-1 borderbottom">
                                        <div class="col-3 p-0">
                                            <p>{{ $party->name }}</p>
                                        </div>
                                        <div class="col-3 student-price">{{ $party->price }}</div>

                                        <div class="col-3 other-price">{{ $other_people_total_price }}</div>
                                    </div>
                                    <div class="row ms-1 borderbottom mb-3 mt-3">
                                        <div class="col-6 p-0">
                                            <p>Total Price</p>
                                        </div>
                                        <div class="col-6 pe-md-5">
                                            <p class="text-end total-price">{{ $other_people_total_price + $party->price }}
                                            </p>
                                        </div>
                                    </div>
                                    
                                <!-- FawryPay Checkout Button -->
                            <input type="image" onclick="checkout();"
                            src="https://www.atfawry.com/assets/img/FawryPayLogo.jpg" alt="pay-using-fawry"
                            id="fawry-payment-btn" />
                                </div>
                            </div>
                @endforeach
            </div>
            </div>
        </section>
    @endsection
</body>

</html>
