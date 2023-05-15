<!DOCTYPE html>
<html lang="en">

<head>
    @include('library.components.head')
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    @include('public_components.spinner')

    @include('library.components.hamburger')


    <!-- Content Start -->
    <div class="content">
        @include('library.components.navbar')

            <!-- Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Students</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="studentIndex"
                            placeholder="name@example.com">
                        <label for="floatingInput">Index Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="studentBookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Book ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control bg-secondary text-dark" id="studentDate"
                            placeholder="name@example.com">
                        <label for="floatingInput">Date</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-role="student" type="button" onclick="borrow(this);">Submit</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Teachers</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="teacherNIC"
                            placeholder="name@example.com">
                        <label for="floatingInput">NIC Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="teacherBookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Book ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control bg-secondary text-dark" id="teacherDate"
                            placeholder="name@example.com">
                        <label for="floatingInput">Date</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-role="teacher" onclick="borrow(this);" type="button">Submit</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Non-Academic</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark"
                            placeholder="name@example.com" id="staffNIC">
                        <label for="floatingInput">NIC Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="staffBookId"
                            placeholder="name@example.com">
                        <label for="floatingInput">Book ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control bg-secondary text-dark" id="staffDate"
                            placeholder="name@example.com">
                        <label for="floatingInput">Date</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" data-role="staff" onclick="borrow(this);" type="button">Submit</button>
                    </div>
                </div>
            </div>
            <!-- End -->

            @include('public_components.footer')
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger("manage");
        function borrow(Button) {
            var index;
            var bookId;
            var date;
            if(Button.dataset.role == "student") {
                index = document.getElementById("studentIndex").value;
                bookId = document.getElementById("studentBookId").value;
                date = document.getElementById("studentDate").value;
            }
            else if(Button.dataset.role == "teacher") {
                index = document.getElementById("teacherNIC").value;
                bookId = document.getElementById("teacherBookId").value;
                date = document.getElementById("teacherDate").value;
            } else if(Button.dataset.role == "staff") {
                index = document.getElementById("staffNIC").value;
                bookId = document.getElementById("staffBookId").value;
                date = document.getElementById("staffDate").value;
            }

            if (index.trim() == '' || bookId.trim() == "" || date == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill All Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("index", index);
                form.append("bookId", bookId);
                form.append("date", date);
                form.append("role", Button.dataset.role);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response 
                        var response = xhr.responseText;
                        if (response == "invalidIndex") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Invalid Person ID. Please Recheck."
                            });
                        }
                        else if (response == 'invalidBook') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Invalid Book ID. Please Add This Book First."
                            });
                        }
                        else if (response == 'personHaveABook') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "This Person Already Have A Book"
                            });
                        }
                        else if(response == "notAvailable") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "This Book Is Not Available At The Moment."
                            });
                        }
                        else if (response == "success") {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'New Record Added',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            });
                        }
                    }
                }

                xhr.open("POST", "{{ route('borrow.book') }}");
                xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>