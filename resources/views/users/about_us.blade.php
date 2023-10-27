<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="this is teba lab">
    <!-- meta description hire -->
    <title>project</title>
    <link rel="shortcut icon" href="" type="image/x-icon">

    <link rel="stylesheet" href="{{ url('project_style/Css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @extends('layouts.app')

    @section('links')
        <a class="nav-link" href="{{ route('index') }}">Home</a>
        <a class="nav-link" href="{{ route('contact_us') }}">Contact Us</a>
    @endsection

    @section('content')
        <div class="col-12">
            <div class="landing">
                <img src="../dist/Images/WhatsApp Image 2023-05-01 at 23.28.49.jpg" alt="">
            </div>
        </div>
        <!-- start circle -->
        <section class="position-relative">
            <div class="container">
                <div class="row ps-md-4 ps-lg-0">
                    <div class="col-12 col-md-6">
                        <div class="data">
                            <p class="second-font mb-0 fs-4">Welcome to our</p>
                            <h1 class="main-font fs-1">Get Pass Tickets</h1>
                            <p class="">Greetings from GetPass!One of the top service providers, GetPass, offers
                                seamless
                                networking
                                options
                                to a
                                cutting-edge ticketing application. </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn-tiket mb-5">
                            <a href="collection.html" class="text-decoration-none text-light">
                                Find Tickets
                            </a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="circle">
                <span class="rounded-circle"></span>
                <span class="rounded-circle span-color"></span>
                <span class="rounded-circle"></span>
                <span class="rounded-circle"></span>
            </div>
        </section>
        <!-- end circle -->
        <!-- start button up -->
        <button class="up" id="up"><i class="fa-solid fa-arrow-up"></i></button>
        <!-- end button up -->
        <!-- start cards tikets -->
        <section class="contact mt-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 col-md-6 offset-md-3 text-center ticketsCardTitle mb-5 mt-5 fs-1">
                        <p class="mb-0 second-font mt-3">Join The Club</p>
                        <h1 class="text-light main-font">Get Pass Tickets</h1>
                        <svg width="88" height="62" viewBox="0 0 88 62" fill="none"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="88" height="61" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_110_1306" transform="scale(0.02 0.0285714)" />
                                </pattern>
                                <image id="image0_110_1306" width="50" height="35"
                                    xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAjCAMAAADha6m9AAABEVBMVEX/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pkb/pka+6kvkAAAAWnRSTlMAAQMEBgcICgwXGSAhIiQlJikqLS8wMTM0Njc4Oj4/QUJDREhSVVZcYmVmb3Fyc3h5ent8fX6Ag4SHiImPkpOUlZacnZ6sr7S1t7q8vb7A1NbY3ODh8Pf4+v4ZMifGAAABF0lEQVR42tXUazcCURQG4B0llRBRVCqXkEuaCBWiQia5lOL9/z/EMrsZnbksnQ/Wqv1tv2eeNWvW2bOJ9KoekLViUMixltGxSffQciar6NqS50kli/GhJFINMKl9+LUghAvjcOdtgckLor/kDmdM3pG2vPIROSb6oVZ1FJ2JiuI/k0zBRNylrT9IHwGRbOgzIpBwxcfNUZa+MC+SNNpEnimBpOgKx1rjBuzJOvImcjNoZpzICZ5kiQJ1XIn0t2ziXJZY7+UaOYN8IiiSpD58wu0n7oPclE/psG6asdnG7lgM/081ociS/d4Kk1fERvz3jQ2ztj2UJNUlfuoBc7xycDvqHvN4B513ejIWbFieuJolmzSFS0v2Db6Qtr1HCpQJAAAAAElFTkSuQmCC" />
                            </defs>
                        </svg>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-light mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus eveniet
                            illo
                            quibusdam ab voluptates modi eius illum minus, pariatur neque deserunt eligendi assumenda nulla
                            aperiam nihil sint totam eos quia.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-11 line ms-3 me-3 d-block d-md-none"></div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h2 class="contact-title">About Us</h2>
                        <p class="text-light mb-5 mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus
                            corporis ab perferendis,
                            necessitatibus nam odio impedit, beatae optio recusandae eum eos voluptatem, quam animi sequi
                            deleniti ex repudiandae eaque voluptatibus!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 line ms-3 me-3 d-block d-md-none"></div>
                    </div>
                </div>
            </section>
        <!-- end cards tikets -->
        <footer class="bg-dark text-center text-lg-start text-white">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row mt-4">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">See other books</h5>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-book fa-fw fa-sm me-2"></i>Bestsellers</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-book fa-fw fa-sm me-2"></i>All
                                    books</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-user-edit fa-fw fa-sm me-2"></i>Our
                                    authors</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Execution of the contract</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Supply</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-backspace fa-fw fa-sm me-2"></i>Returns</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="far fa-file-alt fa-fw fa-sm me-2"></i>Regulations</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="far fa-file-alt fa-fw fa-sm me-2"></i>Privacy policy</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Publishing house</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white">The BookStore</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">123 Street</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white">05765 NY</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-briefcase fa-fw fa-sm me-2"></i>Send us a book</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Write to us</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-at fa-fw fa-sm me-2"></i>Help in
                                    purchasing</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i
                                        class="fas fa-shipping-fast fa-fw fa-sm me-2"></i>Check the order status</a>
                            </li>
                            <li>
                                <a href="#!" class="text-white"><i class="fas fa-envelope fa-fw fa-sm me-2"></i>Join
                                    the newsletter</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2021 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>

        <script src="../../project_style/Js/main.js"></script>
        <script src="../../project_style/Js/popper.min.js"></script>
        <script src="../../project_style/Js/jquery-3.6.3.min.js"></script>
        <script src="../../project_style/Js/bootstrap.min.js"></script>
        <script src="../../project_style/Js/all.min.js"></script>
    @endsection

</body>

</html>
