<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    @php
        $category = \App\Models\Category::where('id', $products->category_id)->get()
    @endphp
    <!-- end header section -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <img src="{{$products->getFirstMediaUrl()}}" alt="">
                <h3 class="mt-3" style="text-transform: uppercase">{{$products->title}}</h3>

                @if($products->discount_price != null)
                    <h5 style="text-decoration: line-through; color: red">Price: ${{$products->price}}</h5>
                    <h5 style="color: blue">Discount Price: ${{$products->discount_price}}</h5>
                @else
                    <h5 style="color: blue">Price: ${{$products->price}}</h5>
                @endif

                <h5>Category: <span style="color: brown">{{$category[0]->category_name}}</span></h5>
                <h5>Quantity: <span style="color: brown">{{$products->quantity}}</span></h5>
                <a href="" class="btn btn-warning">Add To Card</a>
            </div>
            <div class="col-md-9">

                    <h3>About Product</h3>

                 {{$products->description}}

            </div>
        </div>
    </div>
</div>




<!-- footer start -->
@include('home.footer')

<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
