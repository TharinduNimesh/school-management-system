<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('student.components.hamburger')

        <div class="content">
            @include('student.components.navbar')


            <!-- Widget Start -->
            <div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
                <div class="row g-4 bg-secondary p-3 mt-3">
                    <div class="col-12 ">
                        <h3 class="font-weight-bold text-dark">Submit Assingments</h3>
                        <div class="col-12 table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Subject_Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col">Assingment_code</th>
                                        <th scope="col">Assingment_Document</th>
                                        <th scope="col">Assingment_Submit</th>
                                        <th scope="col">Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Tharindu</td>
                                        <td>12/31 11.59</td>
                                        <td>@12345</td>
                                        <td><button type="button" class="btn btn-primary">Download</button></td>
                                        <td><input class="form-control text-dark" type="file" id="formFile"></td>
                                        <td>10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger('assignments')
        function submitAssignment(event) {
            const button = event.target;
            var id = button.getAttribute("data-assignmentid");
            var code = button.getAttribute("data-code");

            var file = document.getElementById("file" + id);

            if (file.value == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'WARNING',
                    text: "You Must Select A File First"
                })
            }
            else {
                var assignment = file.files[0];

                var form = new FormData();

                form.append("file", assignment);
                form.append("code", code);

                var req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (req.readyState == 4) {
                        if (req.status == 200) {
                            r = req.responseText;
                            if (r == 'error') {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'WARNING',
                                    text: "You can only submit PDF files"
                                })
                            }
                            else {
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Assignment Submitted Successfully',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: 'ERROR',
                                text: "Internel Server Error",
                                footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                            })
                        }
                    }
                }

                req.open("POST", "process/submitAssignment.php", true);
                req.send(form);
            }

        }
    </script>
</body>

</html>