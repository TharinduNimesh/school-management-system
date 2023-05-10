<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')

    {{-- Star icon stylesheet --}}
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css'>

    <style>
        .rating {
            text-align: padding top;
            position: relative;
            width: 100%;
            float: left;

        }

        .hidden {
            opacity: 0;
        }

        .star {
            display: inline-block;
            margin: 5px;
            font-size: 30px;
            color: rgb(204, 160, 160);
            position: relative;


            &.animate {
                -webkit-animation: stretch-bounce .5s ease-in-out;
            }

            &.hidden {
                opacity: 0;
            }
        }

        .full {
            &:before {
                font-family: fontAwesome;
                display: inline-block;
                content: "\f005";
                position: relative;
                float: right;
                z-index: 2;
            }
        }

        .half {
            &:before {
                font-family: fontAwesome;
                content: "\f089";
                position: absolute;
                float: left;
                z-index: 3;
            }
        }

        .star-colour {
            color: #ffd700;
        }



        @-webkit-keyframes stretch-bounce {
            0% {
                -webkit-transform: scale(1);
            }

            25% {
                -webkit-transform: scale(1.5);
            }

            50% {
                -webkit-transform: scale(0.9);
            }

            75% {
                -webkit-transform: scale(1.2);
            }

            100% {
                -webkit-transform: scale(1);
            }
        }

        .selected {
            &:before {
                font-family: fontAwesome;
                display: inline-block;
                content: "\f005";
                position: absolute;
                top: 0;
                left: 0;
                -webkit-transform: scale(1);
                opacity: 1;
                z-index: 1;
            }

            &.pulse {
                &:before {
                    -webkit-transform: scale(3);
                    opacity: 0;
                }
            }

            &.is-animated {
                &:before {
                    transition: 1s ease-out;
                }
            }
        }

        .score {
            font-family: arial;
            font-size: 20px;
            color: green;
            margin-top: 20px;
            margin-left: 50px;
        }

        .score-rating {
            vertical-align: sup;
            top: -5px;
            position: relative;
            font-size: 150%;
        }

        .total {
            vertical-align: sub;
            top: 0px;
            position: relative;
            font-size: 100%;
        }
    </style>

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('student.components.hamburger')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('student.components.navbar')
            <!-- Navbar End -->


            <!-- Rating Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded p-4">
                    <h3 class="mb-4 text-dark">Rate for today subjects</h3>
                    <div class="row">
                        <h5 class="text-dark">English</h5>
                        <div class="rating" data-vote="0">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint laborum, aut eligendi
                                consequuntur veniam minus cupiditate, laudantium facere explicabo atque molestiae! Enim,
                                quasi! Excepturi beatae placeat, perferendis dolore quibusdam quod.</p>
                            <div class="star hidden">
                                <span class="full" data-value="0"></span>
                                <span class="half" data-value="0"></span>
                            </div>

                            <div class="star">

                                <span class="full" data-value="1"></span>
                                <span class="half" data-value="0.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="2"></span>
                                <span class="half" data-value="1.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="3"></span>
                                <span class="half" data-value="2.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="4"></span>
                                <span class="half" data-value="3.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="5"></span>
                                <span class="half" data-value="4.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="score">
                                <span class="score-rating js-score">0</span>
                                <span>/</span>
                                <span class="total">5</span>
                            </div>
                            <div class="form-floating mt-3">
                                <textarea class="form-control bg-secondary text-dark" placeholder="Feedback"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Feedback</label>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </div>

                        <hr class="mt-4">

                        <h5 class="text-dark">Sinhala</h5>
                        <div class="rating" data-vote="0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita eum error ut itaque ex
                                architecto beatae rem possimus consectetur? Cum obcaecati veniam reprehenderit
                                dignissimos ipsam exercitationem fuga impedit suscipit? Ducimus.</p>
                            <div class="star hidden">
                                <span class="full" data-value="0"></span>
                                <span class="half" data-value="0"></span>
                            </div>

                            <div class="star">

                                <span class="full" data-value="1"></span>
                                <span class="half" data-value="0.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="2"></span>
                                <span class="half" data-value="1.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="3"></span>
                                <span class="half" data-value="2.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="4"></span>
                                <span class="half" data-value="3.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="5"></span>
                                <span class="half" data-value="4.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="score">
                                <span class="score-rating js-score">0</span>
                                <span>/</span>
                                <span class="total">5</span>
                            </div>
                            <div class="form-floating mt-3">
                                <textarea class="form-control bg-secondary text-dark" placeholder="Feedback"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Feedback</label>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </div>

                        <hr class="mt-4">

                        <h5 class="text-dark">Maths</h5>
                        <div class="rating" data-vote="0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, explicabo magni sunt at
                                nobis quaerat accusantium laborum voluptatibus maxime esse nihil optio facilis dolore
                                dolor necessitatibus! Aut, iste odio! Exercitationem.</p>
                            <div class="star hidden">
                                <span class="full" data-value="0"></span>
                                <span class="half" data-value="0"></span>
                            </div>

                            <div class="star">

                                <span class="full" data-value="1"></span>
                                <span class="half" data-value="0.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="2"></span>
                                <span class="half" data-value="1.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="3"></span>
                                <span class="half" data-value="2.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="4"></span>
                                <span class="half" data-value="3.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="star">

                                <span class="full" data-value="5"></span>
                                <span class="half" data-value="4.5"></span>
                                <span class="selected"></span>

                            </div>

                            <div class="score">
                                <span class="score-rating js-score">0</span>
                                <span>/</span>
                                <span class="total">5</span>
                            </div>
                            <div class="form-floating mt-3">
                                <textarea class="form-control bg-secondary text-dark" placeholder="Feedback"
                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Feedback</label>
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="button" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rating End -->


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
        var starClicked = false;

        $(function () {

            $('.star').click(function () {

                $(this).children('.selected').addClass('is-animated');
                $(this).children('.selected').addClass('pulse');

                var target = this;

                setTimeout(function () {
                    $(target).children('.selected').removeClass('is-animated');
                    $(target).children('.selected').removeClass('pulse');
                }, 1000);

                starClicked = true;
            })

            $('.half').click(function () {
                if (starClicked == true) {
                    setHalfStarState(this)
                }
                $(this).closest('.rating').find('.js-score').text($(this).data('value'));

                $(this).closest('.rating').data('vote', $(this).data('value'));
                calculateAverage()
                console.log(parseInt($(this).data('value')));

            })

            $('.full').click(function () {
                if (starClicked == true) {
                    setFullStarState(this)
                }
                $(this).closest('.rating').find('.js-score').text($(this).data('value'));

                $(this).find('js-average').text(parseInt($(this).data('value')));

                $(this).closest('.rating').data('vote', $(this).data('value'));
                calculateAverage()

                console.log(parseInt($(this).data('value')));
            })

            $('.half').hover(function () {
                if (starClicked == false) {
                    setHalfStarState(this)
                }

            })

            $('.full').hover(function () {
                if (starClicked == false) {
                    setFullStarState(this)
                }
            })

        })

        function updateStarState(target) {
            $(target).parent().prevAll().addClass('animate');
            $(target).parent().prevAll().children().addClass('star-colour');

            $(target).parent().nextAll().removeClass('animate');
            $(target).parent().nextAll().children().removeClass('star-colour');
        }

        function setHalfStarState(target) {
            $(target).addClass('star-colour');
            $(target).siblings('.full').removeClass('star-colour');
            updateStarState(target)
        }

        function setFullStarState(target) {
            $(target).addClass('star-colour');
            $(target).parent().addClass('animate');
            $(target).siblings('.half').addClass('star-colour');

            updateStarState(target)
        }

    </script>

</body>

</html>