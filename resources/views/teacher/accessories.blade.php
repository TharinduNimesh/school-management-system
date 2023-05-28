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

            <!-- Accessories Start -->

            <!--Accessories details-->
            <div style="min-height: 80vh;">
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
                                        {{ $chairs }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-6">
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                                <i class="bi bi-inboxes-fill text-dark fa-3x"></i>
                                <div class="ms-3">
                                    <p class="mb-2">Number of Desks</p>
                                    <h6 class="mb-0 text-dark">
                                        {{ $desks }}
                                    </h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--Accessories details-->

                <!--add Accessories details-->
                <div class="container-fluid pt-4 px-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h3 class="mb-4 text-dark">Add Accessories Details</h3>
                                @if (!isset($status))
                                    <div class="row">
                                        <div class="form-floating mb-3 mt-3 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                id="deskCount" placeholder="name@example.com">
                                            <label class="mx-2" for="floatingInput">Add Total Desks</label>
                                        </div>
                                        <div class="form-floating mb-3 mt-3 col-md-6">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                id="ChairsCount" placeholder="name@example.com">
                                            <label class="mx-2" for="floatingInput">Add Total Chairs</label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary" onclick="updateAccessories();"
                                            id="updateBtn">Update</button>
                                    </div>
                                @else
                                    <div class="alert alert-danger">
                                        <strong>WARNING : </strong> You Can't Update Accessories Details, Because You
                                        Are Not A Class Teacher
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--add Accessories details end-->

                <!--Request Accessories-->
                @if (!isset($status))
                    <div class="container-fluid pt-4 px-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="bg-secondary rounded h-100 p-4">
                                    <h3 class="mb-4 text-dark">Request Accessories</h3>
                                    <div class="alert alert-success">
                                        Please use the form below to request any needed accessories
                                    </div>
                                    <div class="form-floating mb-3 mt-3">
                                        <input type="text" class="form-control bg-secondary text-dark" id="subject"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">Subject</label>
                                    </div>
                                    <div class="form-floating mb-3 mt-3">
                                        <textarea class="form-control bg-secondary text-dark" placeholder="Leave a comment here" id="description"
                                            style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Description</label>
                                    </div>

                                    <button type="button" class="btn btn-primary btn-lg"
                                        onclick="sendRequest();">Request</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!--Request Accessories end-->

            <!-- Accessories End -->


            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        hamburger("accessories");

        function updateAccessories() {
            let deskCount = document.getElementById("deskCount").value
            let chairCount = document.getElementById("ChairsCount").value

            if (deskCount == "" || isNaN(deskCount) || chairCount == "" || isNaN(chairCount)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please enter valid numbers',
                })
                return;
            }

            let data = {
                deskCount: deskCount,
                chairCount: chairCount
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('update.accessories') }}", true);
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify(data));
            xhr.onload = function() {
                if (xhr.status == 200) {
                    if (xhr.response == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Accessories updated successfully',
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Request failed!',
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        }

        // create sendRequest function to send subject and description to the server
        function sendRequest() {
            let subject = document.getElementById("subject").value
            let description = document.getElementById("description").value

            if (subject == "" || description == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill all the fields',
                })
                return;
            }

            let data = {
                "subject": subject,
                "description": description
            }

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "{{ route('send.accessories.request') }}", true);
            xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(JSON.stringify(data));
            xhr.onload = function() {
                if (xhr.status == 200) {
                    if (xhr.response == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Request sent successfully',
                        })
                        document.getElementById("subject").value = ""
                        document.getElementById("description").value = ""
                    } else if (xhr.response == "not allowed") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You Don\'t have permission to send request!',
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Request failed!',
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            }
        }
    </script>
</body>

</html>
