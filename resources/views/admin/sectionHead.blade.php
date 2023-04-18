<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('admin.components.sidebar')

        <!-- Content Start -->
        <div class="content">
            @include('admin.components.navbar')

            <!-- Other Elements Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Section heads</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Grade</th>
                                            <th scope="col">Section Chief</th>
                                            <th scope="col">Contact No</th>
                                            <th scope="col">Date of appointment</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i=1; $i<=13; $i++)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>Tharindu</td>
                                        <td>070 xxx xxxx</td>
                                        <td>2023.05.22</td>
                                        <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Remove
                                        </button>
                                        </td>
                                    </tr>
                                    @endfor
                                        <!--  -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Other Elements End -->

            <!-- Add Head start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h3 class="mb-4 text-dark">Add Section heads</h3>
                            <form>
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-3 mb-md-0">
                                        <div class="form-floating">
                                            <select onchange="modifyButton();"
                                                class="form-select text-dark bg-secondary" id="grade"
                                                aria-label="Floating label select example">
                                                <option selected value="0">Select A Section</option>
                                                @for ($i=1; $i<=13; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <label for="floatingSelect">Works with selects</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control bg-secondary text-dark"
                                                placeholder="Teacher NIC" aria-label="Recipient's username"
                                                aria-describedby="button-addon2" id="nic" />
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2"
                                                onclick="searchTeacher();">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mt-3 col-12">
                                        <h5 class="text-dark">Teacher Details</h5>
                                        <div class="row">
                                            <div class="col-md-6 mb-3 mb-md-0 col-12">
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">Teacher
                                                        Name</span>
                                                    <input type="text" class="form-control text-dark bg-secondary"
                                                        disabled value="Ex: Tharindu Nimesh" aria-label="Username"
                                                        aria-describedby="addon-wrapping" id="teacherName" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3 mb-md-0 col-12">
                                                <div class="input-group flex-nowrap">
                                                    <span class="input-group-text" id="addon-wrapping">Contact Number
                                                        (+94)</span>
                                                    <input type="text" class="form-control text-dark bg-secondary"
                                                        disabled value="Ex: 70 111 2223" aria-label="Username"
                                                        aria-describedby="addon-wrapping" id="contactNumber" />
                                                </div>
                                            </div>
                                            <div class="mt-0 mt-md-3 col-12">
                                                <div class="input-group">
                                                    <span class="input-group-text">Qualifications</span>
                                                    <textarea class="form-control text-dark bg-secondary"
                                                        aria-label="With textarea" disabled id="qualification">
Ex: Bsc Hons In Software Enginnering</textarea>
                                                </div>
                                            </div>

                                            <div class="d-grid gap-2 col-6 mx-auto mt-3">
                                                <button class="btn btn-danger disabled" type="button" id="addButton"
                                                    data-nic="0" onclick="addSectionHead();">
                                                    Select A Section First
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Head end -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
    <script>
        hamburger("section");
        function searchTeacher() {
            const nic = document.getElementById("nic");
            if (nic.value.trim() == "") {
                Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "Please Enter Teacher NIC First",
                });
                document.getElementById("addButton").dataset.nic = "0";
            } else {
                var form = new FormData();
                form.append("nic", nic.value.trim());

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // handle response
                        var response = xhr.responseText;
                        if (response == "Invalid") {
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "There is no teacher with the given NIC",
                            });
                            document.getElementById("addButton").dataset.nic = "0";
                        } else {
                            var response = JSON.parse(response);
                            document.getElementById("teacherName").value =
                                response.teacher.full_name;
                            document.getElementById("contactNumber").value =
                                response.teacher.contact_number;
                            document.getElementById("qualification").value =
                                response.teacher.qualification;
                            document.getElementById("addButton").dataset.nic =
                                nic.value.trim();
                        }
                    }
                };

                xhr.open("POST", "process/searchTeacher.php", true);
                xhr.send(form);
            }
        }

        function modifyButton() {
            const grade = document.getElementById("grade");
            const btn = document.getElementById("addButton");

            if (grade.value == "0") {
                btn.innerHTML = "Select A Section First";
                btn.classList.add("disabled");
            } else {
                btn.classList.remove("disabled");
                btn.innerHTML = "Set As Grade " + grade.value + " Section Head";
            }
        }

        function addSectionHead() {
            btn = document.getElementById("addButton");
            if (btn.dataset.nic == "0") {
                Swal.fire({
                    icon: "warning",
                    title: "WARNING",
                    text: "Search A Teacher First",
                });
            }
            else {
                var form = new FormData();
                form.append("nic", btn.dataset.nic);
                form.append("section", document.getElementById("grade").value);

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status) {
                        // handle response
                        var response = JSON.parse(xhr.responseText);
                        if (response.status == 'error') {
                            Swal.fire({
                                icon: "warning",
                                title: "WARNING",
                                text: "This Teacher Already A Section Head In Grade " + response.section + "",
                            });
                        }
                        else {
                            Swal.fire(
                                'Good job!',
                                'Section Head Added Successfully. ReFresh To View On Table!',
                                'success'
                            )
                        }
                    }
                }

                xhr.open("POST", "process/addSectionHead.php", true);
                xhr.send(form);
            }
        }

        function removeHead(Button) {
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if(xhr.readyState == 4 && xhr.status == 200) {
                            document.getElementById("row" + Button.dataset.headid).classList.add("d-none");
                            Swal.fire('Saved!', '', 'success');
                        }
                    }

                    xhr.open("GET", "process/removeSectionHead.php?hid=" + Button.dataset.headid + "", true);
                    xhr.send();
                    // Swal.fire('Saved!', '', 'success')
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        }
    </script>
</body>

</html>