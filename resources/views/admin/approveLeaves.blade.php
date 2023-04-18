<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('public_components.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.components.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.components.navbar')
            <!-- Navbar End -->


            <div class="container-fluid pt-4 px-4">
                <div class="row add-events bg-secondary p-3 rounded">
                    <h3 class="text-dark mb-3">Approve casual vocation and Show sick leaves list</h3>

                    <h6 class="text-dark">Casual Leaves</h6>
                    <div class="col-12">
                        <p class="text-end text-danger">Today Acceped Leave Count
                            3/5
                        </p>
                    </div>
                    <div class="input-group mb-3 mt-3 ">
                        <span class="input-group-text text-dark" id="basic-addon1">Filter By Date</span>
                        <input type="date" id="dateFilter" class="form-control bg-secondary text-dark"
                            placeholder="Set a Date" aria-label="Username" aria-describedby="basic-addon1">

                    </div>

                    <hr>
                    <table class="table table-striped table-horver" id="my-table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--  -->
              @for ($i=0; $i<6; $i++)
                <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>Mark</td>
                    <td>12-03-2023</td>
                    <td>wedding</td>
                    <td><button type="button" class="btn btn-success">Accept</button><span class="mx-2">OR</span><button type="button" class="btn btn-danger">Reject</button></td>
                </tr>
              @endfor
                        </tbody>
                    </table>

                </div>
            </div>


            <div class="container-fluid pt-4 px-4">
                <div class="row add-events bg-secondary p-3 rounded">
                    <h6 class="text-dark">Sick Leaves list</h6>

                    <div class="mb-3 col-md-8 col-12">
                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text text-dark bg-secondary" for="inputGroupSelect01">Search By
                                Teacher
                                Name</label>
                            <input type="text" id="nameFilter" class="form-control text-dark bg-secondary"
                                placeholder="Type Here" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <span>Today Leaves list</span>
                    <hr>

                    <table class="table table-striped" id="sickTable">
                        <thead class="table-dark ">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Contact Number</th>

                            </tr>
                        </thead>
                    </table>
                </div>
            </div>


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
        hamburger("leaves");
        function acceptLeave(Button) {
            var lid = Button.dataset.lid;
            var date = Button.dataset.date;
            var name = Button.dataset.name;
            var email = Button.dataset.email;
            var nic = Button.dataset.nic;

            var form = new FormData();
            form.append("action", "accept");
            form.append("id", lid);
            form.append("date", date);
            form.append("email", email);
            form.append("name", name);
            form.append("nic", nic);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // handle response
                    document.getElementById("casual" + lid).classList.add("d-none");
                }
            }

            xhr.open("POST", "process/vocationAction.php", true);
            xhr.send(form);
        }

        function rejectLeave(Button) {
            var lid = Button.dataset.lid;
            var date = Button.dataset.date;
            var name = Button.dataset.name;
            var email = Button.dataset.email;
            var nic = Button.dataset.nic;
            var cancelled = Button.dataset.cancelled;

            var form = new FormData();
            form.append("action", "reject");
            form.append("id", lid);
            form.append("date", date);
            form.append("email", email);
            form.append("name", name);
            form.append("nic", nic);
            form.append("cancelled", cancelled);

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // handle response
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == 'accepted') {
                        Swal.fire(
                            'Oops..',
                            'Maximum Number Of Leaves Exceeded Today!',
                            'error'
                        );
                    } else {
                        document.getElementById("casual" + lid).classList.add("d-none");
                    }
                }
            }

            xhr.open("POST", "process/vocationAction.php", true);
            xhr.send(form);
        }

        const dateFilterInput = document.getElementById("dateFilter");
        const tableRows = document.querySelectorAll('#my-table tbody tr');

        dateFilterInput.addEventListener('change', function () {
            const selectedDate = new Date(this.value).toISOString().substring(0, 10);

            for (let i = 0; i < tableRows.length; i++) {
                const rowDate = tableRows[i].cells[2].textContent;
                if (rowDate === selectedDate) {
                    tableRows[i].style.display = 'table-row';
                } else {
                    tableRows[i].style.display = 'none';
                }
            }
        });


        const nameFilterInput = document.getElementById("nameFilter");
        const sickTable = document.querySelectorAll('#sickTable tbody tr');

        nameFilterInput.addEventListener('input', function () {
            const selectedName = this.value.toLowerCase();

            for (let i = 0; i < sickTable.length; i++) {
                const rowName = sickTable[i].cells[1].textContent.toLowerCase();
                if (rowName.includes(selectedName)) {
                    sickTable[i].style.display = 'table-row';
                } else {
                    sickTable[i].style.display = 'none';
                }
            }
        });
    </script>
</body>

</html>