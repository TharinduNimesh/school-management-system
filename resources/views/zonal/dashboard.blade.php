<!DOCTYPE html>
<html lang="en">

<head>
    @include('zonal.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
         @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('zonal.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('zonal.components.navbar')
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Teachers[TWC]</p>
                                <h6 class="mb-0 text-wite">200</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Monthly Gross profit</p>
                                <h6 class="mb-0 text-wite">Rs.100 000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Monthly Expenditure</p>
                                <h6 class="mb-0 text-wite">Rs.20 000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Slider Start -->
            <div class="container-fluid pt-4 px-4 slider-show">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJsYQy3p6I_Fs-L2z4BGIngKjz4JTty7jbfw&usqp=CAU"
                                class="d-block w-100" alt="slider-1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6lvuggt4vECjFt0XzQR29wLP0fe90EMGQP4DAcCiJRhDolLqipKCAvhjBMoavPSlIv28&usqp=CAU"
                                class="d-block w-100" alt="slider-2">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdTlrUKUWjNDk2Bq4fJ-rh3Z1QHE29JNbIrTaINptRQNCeb2SyuyXoYZ4ZX1bxTHPkY7U&usqp=CAU"
                                class="d-block w-100" alt="slider-3">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Slider End -->


            <!--calender starrt-->
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-md-12">
                    <div class="h-100 bg-secondary rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Calender</h6>
                            <a href="">Today</a>
                        </div>
                        <div id="calender"></div>
                    </div>
                </div>
            </div>
            <!--calender end-->


            <!-- Footer Start -->
            @include('public_components.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    @include('public_components.js')
    <!-- Template Javascript -->
    
    <script>
        hamburger('dashboard')
    </script>
</body>

</html>