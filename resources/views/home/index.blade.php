
@include('home.header')


<body>
    <!-- start header -->
    

    @include('home.nav')
    {{-- {!! Toastr::message() !!} --}}

    <!-- end header -->
    <!-- start section -->
    <div class="section">
        <div class="container-section">
            <img src="img/screencapture-behance-net-gallery-162959425-Food-Website-Design-2023-03-30-15_29_41.png" alt="" class="img-left">
            <div class="contant">
                <h3 href="#">Hungry?</h3>
                <p class="head">JUST COME TO FOODIED & ORDER</p>
                <p class="prag">Here You Will Find All The Best Quality And Pure Food. Order Now To Satisfy Your Hunger Pangs</p>
                <div class="links">
                    <a href="#">Order Now</a>
                    <a href="#">Explore More <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="imges">
                <img src="home/img/pexels-freestocksorg-396132.jpg" alt="" >
                <img src="home/img/pexels-jill-wellington-257816.jpg" alt="">
                <img src="home/img/pexels-jane-doan-1099680.jpg" alt="">
                <img src="home/img/pexels-jéshoots-4972.jpg" alt="">
                <img src="home/img/pexels-lisa-fotios-1152237.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- Start Chicken -->

    {{-- @include('home.section') --}}

    <!-- End Chicken -->

    <!-- Start Choose -->
    <div class="choose">
        <img src="img/screencapture-behance-net-gallery-162959425-Food-Website-Design-2023-03-30-15_29_41 - Copy.png" alt="">
        <div class="container">
            <div class="main-heading">
                <h1>WHY CHOOSE US ?</h1>
                <p>You Will choose us because you get the best quality food from us and we deliver fast.</p>
            </div>
            <div class="choose-card">
                <div class="card-ch">
                    <i class="fa-solid fa-plate-wheat"></i>
                    <div class="contant">
                        <h3>Serve Healthy Food</h3>
                        <p>We serve all healthy food here. You can choose any food you like.</p>
                    </div>
                </div>
                <div class="card-ch">
                    <i class="fa-solid fa-mortar-pestle"></i>
                    <div class="contant">
                        <h3>Serve Healthy Food</h3>
                        <p>We serve all healthy food here. You can choose any food you like.</p>
                    </div>
                </div>
                <div class="card-ch">
                    <i class="fa-solid fa-truck-fast"></i>
                    <div class="contant">
                        <h3>Serve Healthy Food</h3>
                        <p>We serve all healthy food here. You can choose any food you like.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Choose -->

    <!-- Start menu -->

    @include('home.special')

    <!-- End menu -->   



    <!-- Start regular -->

    @include('home.regular_food')

    <!-- End regular -->


    <!-- Start cheef -->

<div class="cheefs">
    <div class="container-cheefs">
        <img src="img/rightSc.png" alt="" class="right">
        <div class="main-heading">
            <h1>OUR SPECIAL CHEF's</h1>
            <p>Featured below are some of our special chefs who work to prepare your meals</p>
        </div>
        <div class="card-imges">
            <div class="imge">
                <img src="home/img/cheff.png" alt="">
            </div>
            <div class="imge">
                <img src="home/img/cheff2.png" alt="">
            </div>
            <div class="imge">
                <img src="home/img/cheef3.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- End cheef -->
    @include('home.footer')

<!-- End footer -->
