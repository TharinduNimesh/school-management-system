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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <h3 class="text-dark">Search Non-Academic Staff</h3>
                    <div class="row">
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control bg-secondary text-dark" id="nic"
                                placeholder="name@example.com">
                            <label for="floatingInput" style="margin-left: 10px;">Search By NIC</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" class="form-control bg-secondary text-dark" id="name"
                                placeholder="name@example.com" data-nic="" onkeyup="staffLiveSearch();">
                            <label for="floatingInput" style="margin-left: 10px;">Search By Name</label>
                            <div class="list-group" style="position: absolute; width: 95%; z-index: 100000;"
                                id="item-container">
                                <!-- suggestions append to here -->

                            </div>
                        </div>

                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="button" onclick="searchStaff();">Search</button>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-md-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Registration
                                </p>
                                <h6 class="mb-0 text-dark" id="registration">
                                    none
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6" style="cursor: pointer;" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="bi bi-briefcase-fill fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Date Of Resignation
                                </p>
                                <h6 class="mb-0 text-dark" id="resignation">
                                    none
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- resignation modeal start  --}}
            <div class="modal fade" tabindex="-1" id="exampleModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark">WARNING</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you Sure to Remove him/her from school staff ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="removeButton" class="btn btn-primary" data-bs-dismiss="modal"
                                onclick="remove(this);">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- resignation modeal end  --}}

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary"
                                    id="displayName" placeholder="name@example.com" value="Ex : John Doe">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NIC Number</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary"
                                    id="displayNIC" placeholder="name@example.com" value="Ex : 90123445v">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary"
                                    id="mobile" placeholder="name@example.com" value="Ex: 0771112223">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Job Role</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary"
                                    id="role" placeholder="name@example.com" value="Ex : Administrative staff">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <form action="" id="add-staff">
                        <div class="row">
                            <h3 class="text-dark">Add Non-Academic Staff</h3>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-secondary text-dark" name="fullName"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Full Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-secondary text-dark" name="nic"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">NIC</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control bg-secondary text-dark" name="mobile"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control text-dark bg-secondary" name="date"
                                        placeholder="name@example.com">
                                    <label for="floatingInput">Date Of Registration</label>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-floating">
                                    <select class="form-select text-dark bg-secondary" onchange="showPassword();" id="selectedRole" name="role"
                                        aria-label="Floating label select example">
                                        <option selected value="0">Open this select menu</option>
                                        <option value="Administrative staff">Administrative staff</option>
                                        <option value="Maintenance staff">Maintenance staff</option>
                                        <option value="IT staff">IT staff</option>
                                        <option value="Support staff">Support staff</option>
                                        <option value="School nurse">School nurse</option>
                                        <option value="Food service staff">Food service staff</option>
                                        <option value="Transportation staff">Transportation staff</option>
                                        <option value="Security staff">Security staff</option>
                                        <option value="Librarian">Librarian</option>
                                        <option value="Counselor">Counselor</option>
                                    </select>
                                    <label for="floatingSelect">Job Role</label>
                                </div>
                            </div>
                            <div class="d-none" id="password-container">
                                <div class="form-floating mb-3">
                                    <input type="password" id="password" class="form-control text-dark bg-secondary" name="password"
                                        placeholder="name@example.com" value="password">
                                    <label for="floatingInput">Enter A Passowrd</label>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto mt-3">
                            <button class="btn btn-primary" type="button" onclick="addStaff();">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('public_components.footer')
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')
</body>
<script>
    hamburger("nonAcademic");

    function remove(Button) {
        if (Button.dataset.index == '') {
            Swal.fire({
                title: 'WARNING',
                text: 'You Must Search A Staff Member',
                icon: 'warning'
            });
        } else {
            document.getElementById("spinner").classList.add("show");
            var form = new FormData();
            form.append("id", Button.dataset.id);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("resignation").innerHTML = xhr.responseText;
                    document.getElementById("spinner").classList.remove("show");
                }
            }

            xhr.open("POST", "{{ route('remove.staff') }}");
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }
    }

    function showPassword() {
        const role = document.getElementById("selectedRole").value;
        const container = document.getElementById("password-container");
        container.classList.add("d-none");
        if(role == "Administrative staff" || role == "Librarian") {
            document.getElementById("password").value = "";
            container.classList.remove("d-none");
        }
    }

    function addStaff() {
        const staffForm = document.getElementById("add-staff");
        const inputs = staffForm.querySelectorAll("input");
        const spinner = document.getElementById("spinner");
        spinner.classList.add("show");
        var isValid = true;

        inputs.forEach(input => {
            if (input.value == '') {
                input.classList.add("is-invalid");
                isValid = false;
            } else {
                input.classList.remove("is-invalid");
            }
        });

        const role = document.getElementById("role");
        if (role.value == '0') {
            role.classList.add("d-none");
            isValid = false;
        } else {
            role.classList.remove("d-none");
        }

        if (isValid) {
            var form = new FormData(staffForm);
            var xhr = new XMLHttpRequest();
            xhr.open("post", "{{ route('add.staff') }}");
            xhr.onload = function() {
                if (xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response == 'error') {
                        Swal.fire({
                            title: 'ERROR',
                            text: 'Error While Processing Your Request',
                            icon: 'error',
                            footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                        });
                    } else if (response == 'exist') {
                        Swal.fire({
                            title: 'WARNING',
                            text: 'A Person Already Exist With Given NIC',
                            icon: 'warning',
                        });
                    } else if (response == 'limit') {
                        Swal.fire({
                            title: 'WARNING',
                            text: 'You Have Reached The Maximum Limit Of Administative Staff',
                            icon: 'warning',
                        });
                    } else if (response == 'success') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Staff Added Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                } else {
                    spinner.classList.remove('show');
                    Swal.fire({
                        icon: 'error',
                        title: 'ERROR',
                        text: 'Internal Server Error',
                        footer: "<a href='http://wa.me/94701189971'>Contact Developers Here</a>"
                    });
                }
                spinner.classList.remove("show");
            }
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        } else {
            Swal.fire(
                'WARNING',
                'You must fill all text field',
                'warning'
            );
        }
    }

    function staffLiveSearch() {
        document.getElementById("item-container").style.display = '';
        const removeButton = document.getElementById("removeButton");
        var name = document.getElementById("name").value;

        if (name.trim() == '') {
            document.getElementById("item-container").innerHTML = '';
        } else {
            var xhr = new XMLHttpRequest();
            var form = new FormData();
            form.append("name", name);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("item-container").innerHTML = '';
                    var response = JSON.parse(xhr.responseText);
                    for (let i = 0; i < response.length; i++) {
                        var item = document.createElement("button");
                        item.innerHTML = response[i]['full_name'] + " - " + response[i]['nic'];
                        item.classList.add("list-group-item");
                        item.classList.add("list-group-item-action");
                        item.classList.add("text-dark");
                        item.dataset.nic = response[i]['nic'];
                        item.onclick = function() {
                            document.getElementById("name").value = this.innerHTML;
                            document.getElementById("name").dataset.nic = this.dataset.nic;
                            document.getElementById("item-container").style.display = 'none';
                        }
                        document.getElementById("item-container").appendChild(item);
                    }
                }
            }

            xhr.open("POST", "{{ route('live.search.staff') }}");
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }
    }


    function searchStaff() {
        const nic = document.getElementById('nic');
        const name = document.getElementById('name');

        var displayName = document.getElementById("displayName");
        var displayNIC = document.getElementById("displayNIC")
        var mobile = document.getElementById("mobile");
        var role = document.getElementById("role");
        var registration = document.getElementById("registration");
        var resignation = document.getElementById("resignation");


        if (nic.value.trim() == '' && name.value.trim() == '' || nic.value.trim() != '' && name.value.trim() != '') {
            Swal.fire(
                'WARNING',
                'You must fill in one text field',
                'warning'
            );

            displayName.value = 'Ex : John Doe';
            displayNIC.value = 'Ex : 90123445v';
            mobile.value = "Ex: 0771112223";
            role.value = "Ex : Administrative staff";
            registration.innerHTML = 'none';
            resignation.innerHTML = 'none';
            removeButton.dataset.id = '';
        } else {
            var nicNumber = '';
            if (name.value.trim() != '') {
                nicNumber = name.dataset.nic;
            } else {
                nicNumber = nic.value;
            }
            var xhr = new XMLHttpRequest();
            var form = new FormData();
            form.append("nic", nicNumber);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    removeButton.dataset.id = '';
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == 'error') {
                        Swal.fire(
                            'WARNING',
                            'There is no staff member with this Information',
                            'warning'
                        );

                        displayName.value = 'Ex : John Doe';
                        displayNIC.value = 'Ex : 90123445v';
                        mobile.value = "Ex: 0771112223";
                        role.value = "Ex : Administrative staff";
                        registration.innerHTML = 'none';
                        resignation.innerHTML = 'none';
                    } else {
                        removeButton.dataset.id = response.staff["_id"];
                        displayName.value = response.staff["full_name"];
                        displayNIC.value = response.staff["nic"];
                        mobile.value = response.staff["mobile"];
                        role.value = response.staff["role"];
                        registration.innerHTML = response.staff["start_date"];
                        resignation.innerHTML = response.staff["end_date"] == null ? 'none' : response.staff[
                            "end_date"];
                    }
                }
            }

            xhr.open("POST", "{{ route('search.staff') }}");
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
            xhr.send(form);
        }
    }
</script>

</html>
