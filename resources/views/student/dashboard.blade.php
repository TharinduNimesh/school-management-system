<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')

    {{-- progress bar stylesheet --}}
    <link rel="stylesheet" href="/css/student.css">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')
        @include('student.components.hamburger')

        <div class="content">
            @include('student.components.navbar')

            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4 mb-3">
                <div class="row">
                    <div id="carouselExampleCaptions" class="carousel slide carousel-fade">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide0"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                class="active" aria-current="true" aria-label="Slide1"></button>                                
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/school.png" class="d-block w-100" alt="image" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>"Learn and Grow at Our School"</h5>
                                    <p>
                                        Our school provides a nurturing and
                                        supportive environment for students
                                        to develop their knowledge and
                                        skills. With dedicated teachers and
                                        a variety of extracurricular
                                        activities, we help students grow
                                        into confident and capable
                                        individuals.
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="https://wallpaperaccess.com/full/1078161.jpg" class="d-block w-100"
                                    alt="slider-2" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Sample Header</h5>
                                    <p>Sample Desciption</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="row g-4 mt-3">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">
                                    Average Skills
                                </h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Comparsion</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

            <!-- Upcoming Events Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">
                            Upcoming Events And News
                        </h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Date</th>
                                    <th scope="col">Event</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="">Detail</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="">Detail</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Upcoming Events End -->

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4 d-flex align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-between mb-4 w-100">
                                <h6 class="mb-0 text-dark">
                                    Attendance Summary
                                </h6>
                            </div>
                            <div class="progress blue">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">80%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Calender</h6>
                                <a href="">Today</a>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Assignments</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        
        (function ($) {
            "use strict";

            // Calender
            $("#calender").datetimepicker({
                inline: true,
                format: "L",
            });

            // Testimonials carousel
            $(".testimonial-carousel").owlCarousel({
                autoplay: true,
                smartSpeed: 1000,
                items: 1,
                dots: true,
                loop: true,
                nav: false,
            });

            // Chart Global Color
            Chart.defaults.color = "#6C7293";
            Chart.defaults.borderColor = "#000000";

            // Worldwide Sales Chart
            var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, {
                type: "bar",
                data: {
                    labels: [
                        "2023",
                        "2024",
                        "2025",
                        "2026",
                        "2027",
                        "2028",
                        "2029",
                    ],
                    datasets: [
                        {
                            label: "1st Term",
                            data: [340, 120, 430, 120, 430, 870, 0],
                            backgroundColor: "rgba(255, 158, 94, .9)",
                        },
                        {
                            label: "2st Term",
                            data: [340, 120, 430, 120, 430, 870, 0],
                            backgroundColor: "rgba(255, 180, 94, .9)",
                        },
                        {
                            label: "3st Term",
                            data: [340, 120, 430, 120, 430, 870, 0],
                            backgroundColor: "rgba(255, 200, 94, .9)",
                        },
                    ],
                },
                options: {
                    responsive: true,
                },
            });

            // Salse & Revenue Chart
            var ctx2 = $("#salse-revenue").get(0).getContext("2d");
            var myChart2 = new Chart(ctx2, {
                type: "line",
                data: {
                    labels: [
                        "2023",
                        "2024",
                        "2025",
                        "2026",
                        "2027",
                        "2028",
                        "2029",
                    ],
                    datasets: [
                        {
                            label: "You",
                            data: [340, 120, 430, 120, 430, 870, 0],
                            backgroundColor: "rgba(255, 136, 0, .7)",
                            fill: true,
                        },
                        {
                            label: "1st Place",
                            data: [340, 120, 430, 120, 430, 870, 0],
                            backgroundColor: "rgba(255, 203, 107, .5)",
                            fill: true,
                        },
                    ],
                },
                options: {
                    responsive: true,
                },
            });
        })(jQuery);
    </script>
    <script>
        hamburger('dashboard');
    </script>
</body>

</html>