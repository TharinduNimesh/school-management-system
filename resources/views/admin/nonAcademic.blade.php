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

                    <div class="col-sm-6 col-md-6">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="displayName"
                                    placeholder="name@example.com" value="Ex : John Doe">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">NIC Number</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="displayNIC"
                                    placeholder="name@example.com" value="Ex : 90123445v">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="mobile"
                                    placeholder="name@example.com" value="Ex: 0771112223">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Job Role</label>
                                <input disabled type="text" class="form-control text-dark bg-secondary" id="role"
                                    placeholder="name@example.com" value="Ex : Administrative staff">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <hr/>  
        <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
          <div class="row">
            <h3 class="text-dark">Add Non-Academic Staff</h3>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control bg-secondary text-dark" id="fullName"
                  placeholder="name@example.com">
                <label for="floatingInput">Full Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control bg-secondary text-dark" id="nic" placeholder="name@example.com">
                <label for="floatingInput">NIC</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control bg-secondary text-dark" id="mobile"
                  placeholder="name@example.com">
                <label for="floatingInput">Contact Number</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3">
                <input type="date" class="form-control text-dark bg-secondary" id="date" placeholder="name@example.com">
                <label for="floatingInput">Date Of Registration</label>
              </div>
            </div>
            <div class="col-12 mb-3">
              <div class="form-floating">
                <select class="form-select text-dark bg-secondary" id="role" aria-label="Floating label select example">
                  <option selected value="0">Open this select menu</option>

                </select>
                <label for="floatingSelect">Job Role</label>
              </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mt-3">
              <button class="btn btn-primary" type="button" onclick="addPerson();">Submit</button>
            </div>
          </div>
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
    function staffLiveSearch() {
        document.getElementById("item-container").style.display = '';
        var name = document.getElementById("name").value;

        if (name.trim() == '') {
            document.getElementById("item-container").innerHTML = '';
        }
        else {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // handle response
                    document.getElementById("item-container").innerHTML = '';
                    var response = JSON.parse(xhr.responseText);
                    for (let i = 0; i < response.length; i++) {
                        var item = document.createElement("button");
                        item.innerHTML = response[i].staff['name'] + " - " + response[i].staff['nic'];
                        item.classList.add("list-group-item");
                        item.classList.add("list-group-item-action");
                        item.classList.add("text-dark");
                        item.dataset.nic = response[i].staff['nic'];
                        item.onclick = function () {
                            document.getElementById("name").value = this.innerHTML;
                            document.getElementById("name").dataset.nic = this.dataset.nic;
                            document.getElementById("item-container").style.display = 'none';
                        }
                        document.getElementById("item-container").appendChild(item);
                    }
                }
            }

            xhr.open("GET", "process/staffLiveSearch.php?name=" + name + "", true);
            xhr.send();
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
        }
        else {
            var nicNumber = '';
            if (name.value.trim() != '') {
                nicNumber = name.dataset.nic;
            }
            else {
                nicNumber = nic.value;
            }
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // handle response
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
                    }
                    else {
                        displayName.value = response.staff["name"];
                        displayNIC.value = response.staff["nic"];
                        mobile.value = response.staff["mobile"];
                        role.value = response.staff["role"];
                        registration.innerHTML = response.staff["start_date"];
                        resignation.innerHTML = response.staff["end_date"] == null ? 'none' : response.staff["end_date"];
                    }
                }
            }

            xhr.open("GET", "process/searchStaff.php?nic=" + nicNumber + '', true);
            xhr.send();
        }
    }
</script>

</html>