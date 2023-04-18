<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
    <style>
        .progress {
            width: 150px;
            height: 150px !important;
            float: left;
            line-height: 150px;
            background: none;
            margin: 20px;
            box-shadow: none;
            position: relative;
        }

        .progress:after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 12px solid #fff;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 12px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
            animation: loading-1 1.8s linear forwards;
        }

        .progress .progress-value {
            width: 90%;
            height: 90%;
            border-radius: 50%;
            background: #000;
            font-size: 24px;
            color: #fff;
            line-height: 135px;
            text-align: center;
            position: absolute;
            top: 5%;
            left: 5%;
        }

        .progress.blue .progress-bar {
            border-color: green;
        }

        .progress.blue .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }

        .progress.yellow .progress-bar {
            border-color: #fdba04;
        }

        .progress.yellow .progress-right .progress-bar {
            animation: loading-3 1.8s linear forwards;
        }

        .progress.yellow .progress-left .progress-bar {
            animation: none;
        }

        @keyframes loading-1 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(30deg);
            }
        }

        @keyframes loading-2 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(144deg);
                transform: rotate(40deg);
            }
        }

        @keyframes loading-3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(135deg);
                transform: rotate(50deg);
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('teacher.components.hamburger')


        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Grade
                                    10
                                </p>
                                <h6 class="mb-0 text-dark">Class
                                    D
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Students</p>
                                <h6 class="mb-0 text-dark">
                                    48
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Attendance</p>
                                <h6 class="mb-0 text-dark">
                                    47
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Average Skills</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0 text-dark">Comparison</h6>
                                <a href="">Show All</a>
                            </div>
                            <canvas id="salse-revenue"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart End -->

            <div class="container-fluid pt-4 px-4">


                <div class="bg-secondary text-center rounded p-4" style="overflow-y: scroll;" id="myAssignmentTable">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-dark">Submited Assignment</h6>
                        <a href="addAssignment.php">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">

                                    <th scope="col">Date</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0; $i<9; $i++)
                                <tr>
                                    <td>01 Jan 2045</td>
                                    <td>INV-0123</td>
                                    <td>Jhon Doe</td>
                                    <td>$123</td>
                                    <td><a class="btn btn-sm btn-primary" href="">View</a></td>
                                </tr>
                                @endfor


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Upcoming Events Start -->
            <!-- <div class="container-fluid pt-4 px-4">

            </div> -->
            <!-- Upcoming Events End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4 d-flex align-items-center flex-column">
                            <div class="d-flex align-items-center justify-content-between mb-4 w-100">
                                <h6 class="mb-0 text-dark">Attendance Summary</h6>
                            </div>
                            <div class="progress blue">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                <div class="progress-value">
                                    87%
                                </div>
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
                                <h6 class="mb-0 text-dark">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                        <span>Short task goes here...</span>
                                        <button class="btn btn-sm"><i class="fa fa-times"></i></button>
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

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        hamburger("dashboard");
        (function ($) {
            "use strict";

            // Calender
            $('#calender').datetimepicker({
                inline: true,
                format: 'L'
            });


            // Chart Global Color
            Chart.defaults.color = "#6C7293";
            Chart.defaults.borderColor = "#000000";


            // Worldwide Sales Chart
            var ctx1 = $("#worldwide-sales").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, {
                type: "bar",
                data: {
                    labels: ["2023", "2024", "2025", "2026", "2027", "2028", "2029"],
                    datasets: [{
                        label: "1st Term",
                        data: [30, 123, 423, 331, 432, 634, 432],
                        backgroundColor: "rgba(255, 158, 94, .7)"
                    },
                    {
                        label: "2st Term",
                        data:  [30, 123, 423, 331, 432, 634, 432],
                        backgroundColor: "rgba(255, 158, 94, .5)"
                    },
                    {
                        label: "3st Term",
                        data:  [30, 123, 423, 331, 432, 634, 432],
                        backgroundColor: "rgba(255, 158, 94, .3)"
                    }
                    ]
                },
                options: {
                    responsive: true
                }
            });


            // Salse & Revenue Chart
            var ctx2 = $("#salse-revenue").get(0).getContext("2d");
            var myChart2 = new Chart(ctx2, {
                type: "line",
                data: {
                    labels: ["2023", "2024", "2025", "2026", "2027", "2028", "2029"],
                    datasets: [{
                        label: "Class First",
                        data: [0, 0],
                        backgroundColor: "rgba(255, 136, 0, .7)",
                        fill: true
                    },
                    {
                        label: "Section First",
                        data: [0, 0],
                        backgroundColor: "rgba(255, 203, 107, .5)",
                        fill: true
                    }
                    ]
                },
                options: {
                    responsive: true
                }
            });


        })(jQuery);

    </script>
</body>

</html>