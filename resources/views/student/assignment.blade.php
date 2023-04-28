<!DOCTYPE html>
<html lang="en">

<head>
    @include('student.components.head')

    <style>
        .space {
            white-space:nowrap;
        }
    </style>
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
                        <h3 class="font-weight-bold text-dark">Submit Assignments</h3>
                        <div class="col-12 table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col" class="space">Subject Name</th>
                                        <th scope="col">Duration</th>
                                        <th scope="col" class="space">Assignment Document</th>
                                        <th scope="col" class="space">Assignment Submit</th>
                                        <th scope="col" class="space">Marks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assignments as $key => $assignment)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $assignment->subject }}</td>
                                            <td class="space">{{ $assignment->start_date }} - {{ $assignment->end_date }}</td>
                                            <td>
                                                @php
                                                    $file = "assignments/" . $assignment->file;
                                                    $url = Storage::url($file);
                                                @endphp
                                                <a class="btn btn-success" href="{{ asset($url) }}">Download</a>
                                            </td>
                                            <td>
                                                <form>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control bg-secondary text-dark" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                                        <button class="btn btn-warning" type="button" accept=".pdf,.doc,.docx" id="inputGroupFileAddon04">Submit</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>10</td>
                                        </tr>
                                    @endforeach
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