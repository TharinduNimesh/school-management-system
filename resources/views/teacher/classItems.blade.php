<!DOCTYPE html>
<html lang="en">

<head>
    @include('teacher.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('teacher.components.hamburger')

        <!-- Content Start -->
        <div class="content">
            @include('teacher.components.navbar')

            <!-- apparatus Start -->

            <!--apparatus details-->

            <h3 class="text-dark mt-4 ms-4">Apparatus Details</h3>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-inboxes-fill text-dark fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2">
                                    Number of chairs
                                </p>
                                <h6 class="mb-0 text-dark">
                                   45
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="bi bi-inboxes-fill text-dark fa-3x"></i>
                            <div class="ms-3">
                                <p class="mb-2"> Number of Desks</p>
                                <h6 class="mb-0 text-dark">
                                    40
                                </h6>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--apparatus details-->

            <!--add apparatus details-->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Add Apparatus Details</h3>

                            <div class="form-floating mb-3 mt-3 col-md-12 ">
                                <input type="text" class="form-control bg-secondary text-dark" id="addDesk"
                                     placeholder="name@example.com">
                                <label for="floatingInput">Add Total Desks</label>
                            </div>
                            <div class="form-floating mb-3 mt-3 col-md-12 ">
                                <input type="text" class="form-control bg-secondary text-dark" id="addDesk"
                                     placeholder="name@example.com">
                                <label for="floatingInput">Add Total Chairs</label>
                            </div>
                        
                            <button type="button" class="btn btn-primary btn-lg " id="updateBtn">Update</button>

                            
                            
                        </div>
                    </div>
                </div>
            </div>

            <!--add apparatus details end-->
            <!--Request apparatus-->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Request Apparatus</h3>

                            <div class="form-floating mb-3 mt-3">
                                <input type="text" class="form-control bg-secondary text-dark" id="subject"
                                     placeholder="name@example.com">
                                <label for="floatingInput">Subject</label>
                            </div>
                            <div class="form-floating mb-3 mt-3">
                                <textarea class="form-control bg-secondary text-dark" placeholder="Leave a comment here" id="comment" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                        
                            <button type="button" class="btn btn-primary btn-lg">Request</button>
                            
                            
                        </div>
                    </div>
                </div>
            </div>

            <!--Request apparatus end-->
            
            <!-- apparatus End -->


            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        hamburger("summary")
    </script>
</body>

</html>