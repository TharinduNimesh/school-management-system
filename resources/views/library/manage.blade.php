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
                        <button class="btn btn-primary" type="button" onclick="studentBooks();">Submit</button>
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
                        <button class="btn btn-primary" type="button" onclick="teacherBooks();">Submit</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-dark">Non-Academic</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Index Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-secondary text-dark" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Book ID</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control bg-secondary text-dark" id="floatingInput"
                            placeholder="name@example.com">
                        <label for="floatingInput">Date</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button">Submit</button>
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
        function studentBooks() {
            let studentIndex = document.getElementById("studentIndex").value;
            let studentBookId = document.getElementById("studentBookId").value;
            let studentDate = document.getElementById("studentDate").value;

            if (studentIndex.trim() == '' || studentBookId.trim() == "" || studentDate == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill All Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("index", studentIndex);
                form.append("bookId", studentBookId);
                form.append("date", studentDate);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response 
                        var response = xhr.responseText;
                        if (response == "invalidIndex") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Invalid Index Number. Please Recheck."
                            });
                        }
                        else if (response == 'invalidBook') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Invalid Book ID. Please Add This Book First."
                            });
                        }
                        else if (response == 'studentHaveABook') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "This Student Already Have A Book"
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
                        }
                    }
                }

                xhr.open("POST", "process/studentBooks.php", true);
                xhr.send(form);
            }
        }

        function teacherBooks() {
            let teacherNIC = document.getElementById("teacherNIC").value;
            let teacherBookId = document.getElementById("teacherBookId").value;
            let teacherDate = document.getElementById("teacherDate").value;

            if (teacherNIC.trim() == '' || teacherBookId.trim() == "" || teacherDate == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: "It's Look Like You Aren't Fill All Text Field"
                });
            }
            else {
                var xhr = new XMLHttpRequest();
                var form = new FormData();
                form.append("nic", teacherNIC);
                form.append("bookId", teacherBookId);
                form.append("date", teacherDate);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response 
                        var response = xhr.responseText;
                        if (response == 'invalidTeacher') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Invalid Teacher NIC. Please Recheck."
                            });
                        }
                        else if (response == 'teacherHaveABook') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "This Teacher Already Have A Book"
                            });
                        }
                        else if (response == 'invalidBook') {
                            Swal.fire({
                                icon: 'warning',
                                title: 'WARNING',
                                text: "Invalid Book ID. Please Add This Book First."
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
                        }
                    }
                };

                xhr.open("POST", "process/teacherBooks.php", true);
                xhr.send(form);
            }
        }
    </script>
</body>

</html>