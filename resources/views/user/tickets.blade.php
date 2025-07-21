<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tickets</title>
    <style>
        .comments {
            width: 600px;
        }

        #comment-list {
            margin-top: 30px;
            border: 2px solid black;
        }

        #comment {
            padding: 10px;
            margin-bottom: 10px;
            height: 100px;
        }

        #comment-form {
            display: flex;
            flex-direction: column;
        }

        #comment-form input,
        #comment-form textarea {
            margin-bottom: 10px;
        }

        #comment-form button {
            width: 120px;
            align-self: flex-start;
            background-color: green;
            color: white;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('user/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('user/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Car<span>Book</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('user_homepage')}}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{route('user_about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{route('user_cars')}}" class="nav-link">Cars</a></li>
                <li class="nav-item active"><a href="{{route('user_contact')}}" class="nav-link">Contact</a></li>
                <li class="nav-item active"><a href="{{route('user_ticket')}}" class="nav-link">Ticket</a></li>
                <li class="nav-item active"><a href="{{route('user_logout')}}" class="nav-link">Logout</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('img/user/bg_3.jpg')}});"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Anasayfa<i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Dilek ve Şikayet<i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Dilek ve Şikayetler</h1>
            </div>
        </div>
    </div>
</section>


</section>

<section class="ftco-section ftco-car-details">
    <div class="container">

        <div class="comments">
            <h2>Dilek veya Şikayet</h2>
            <form id="comment-form" action="{{route('user_ticket_post')}}" method="post">
                @csrf
                <select style="width: 50%;margin: 20px 0" class="form-select" name='category' aria-label="Default select example">
                    <option value="0">Araç</option>
                    <option value="1">Site</option>
                </select>
                <textarea id="comment" name="ticket" placeholder="Yorumunuz" required></textarea>
                <button type="submit">Gönder</button>
            </form>
        </div>
    </div>

</section>


<footer class="ftco-footer ftco-bg-dark">
    <div class="container" style="text-align: center">
        <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>

    </div>
</footer>


<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<script src="{{asset('user/js/jquery.min.js')}}"></script>
<script src="{{asset('user/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('user/js/popper.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('user/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('user/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('user/js/aos.js')}}"></script>
<script src="{{asset('user/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('user/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('user/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('user/js/google-map.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
