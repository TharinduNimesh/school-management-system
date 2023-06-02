<!DOCTYPE html>
<html lang="en">

<head>
    @include('developer.components.head')
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('public_components.spinner')

        @include('developer.components.hamburger')

        <!-- Content Start -->
        <div class="content body">
            @include('developer.components.navbar')

            <!-- Admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-primary">Add an administrator to the school</h3>
                    <form class="row g-3 needs-validation" id="admin-form" novalidate>
                        <input type="hidden" name="role" value="admin">
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control text-primary"
                                id="validationCustom02" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please enter a name.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom04" class="form-label">School Name</label>
                            <select class="form-select text-primary" name="school_id" id="validationCustom04" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($schools as $key => $school)
                                    <option value="{{ $key }}">{{ $school }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please select a school name.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Birthday</label>
                            <input type="date" name="birth" class="form-control text-primary" id="birth"
                                required>
                            <div class="invalid-feedback">
                                Please enter your birthday.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <input type="text" name="email" class="form-control text-primary"
                                    id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">LK (+94)</span>
                                <input type="text" name="mobile" class="form-control text-primary" id="mobilenumber"
                                    aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your Mobile Number.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">NIC Number</label>
                            <input type="text" name="nic" class="form-control text-primary"
                                id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide your nic number.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" name="password" id="admin-password"
                                class="form-control text-primary" required>
                            <div class="invalid-feedback">
                                Please provide a strong password.
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="submit-button" data-password="admin-password" data-form="admin-form" type="button">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Admin End -->


            <!-- Zonal Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-primary">Add a Zonal Officer</h3>
                    <form class="row g-3 needs-validation" novalidate id="zonal-form">
                        <input type="hidden" name="role" value="officer">
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control text-primary"
                                id="validationCustom02" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please enter a name.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Birthday</label>
                            <input type="date" name="birth" class="form-control text-primary" id="birth"
                                required>
                            <div class="invalid-feedback">
                                Please enter your birthday.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <input type="text" name="email" class="form-control text-primary"
                                    id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">LK (+94)</span>
                                <input type="text" name="mobile" class="form-control text-primary"
                                    id="mobilenumber" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your Mobile Number.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">NIC Number</label>
                            <input type="text" name="nic" class="form-control text-primary"
                                id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide your nic number.
                            </div>
                        </div>
                        <div class="col-md-4">
                          <label for="validationCustom04" class="form-label">Education Zone</label>
                          <select class="form-select text-primary" name="school_id" id="validationCustom04" required>
                              <option selected disabled value="">Choose...</option>
                              @foreach ($zones as $zone)
                                  <option>{{ $zone }}</option>
                              @endforeach
                          </select>
                          <div class="invalid-feedback">
                              Please select a education zone.
                          </div>
                      </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" onkeyup="validatePassword();" name="password" id="zonal-password"
                                class="form-control text-primary" required>
                            <div class="invalid-feedback">
                                Please provide a strong password.
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="submit-button" data-password="zonal-password" data-form="zonal-form" type="button">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Zonal End -->


            <!-- Admin Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded h-100 p-3">
                    <h3 class="mb-4 text-primary">Add a developer</h3>
                    <form class="row g-3 needs-validation" novalidate id="developer-form">
                        <input type="hidden" name="role" value="developer">
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">User Name</label>
                            <input type="text" name="name" class="form-control text-primary"
                                id="validationCustom02" value="" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                Please enter a name.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Birthday</label>
                            <input type="date" name="birth" class="form-control text-primary" id="birth"
                                required>
                            <div class="invalid-feedback">
                                Please enter your birthday.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Mobile Number</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">LK (+94)</span>
                                <input type="text" name="mobile" class="form-control text-primary"
                                    id="mobilenumber" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your Mobile Number.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Email</label>
                            <div class="input-group has-validation">
                                <input type="text" name="email" class="form-control text-primary"
                                    id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please enter your email.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">NIC Number</label>
                            <input type="text" name="nic" class="form-control text-primary"
                                id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide your nic number.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom03" class="form-label">Password</label>
                            <input type="password" onkeyup="validatePassword();" name="password" id="developer-password"
                                class="form-control text-primary" required>
                            <div class="invalid-feedback">
                                Please provide a strong password.
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="submit-button" data-password="developer-password" data-form="developer-form" type="button">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Admin End -->

            @include('public_components.footer')
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('public_components.js')

    <script>
        hamburger("users");

        const userPassword = document.getElementById("userPassword");
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        // Example starter JavaScript for disabling form submissions if there are invalid fields

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const buttons = document.getElementsByName("submit-button");

        buttons.forEach(submitButton => {
          submitButton.addEventListener('click', function(event) {
          var form = document.getElementById(event.target.dataset.form);
          var password = document.getElementById(event.target.dataset.password);
          var isValid = true
            form.querySelectorAll('input, select').forEach(element => {
                if (element.value == "") {
                    element.classList.add("is-invalid");
                    isValid = false;
                } else {
                    element.classList.remove("is-invalid");
                }
            });
            if (isValid) {
                isValid = validatePassword(password.value);
                if (isValid) {
                    try {
                        sendData(form, "{{ route('add.users') }}")
                        .then((response) => {
                            if (response == 'server_error') {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Something went wrong!',
                              })
                          } else if (response == 'success') {
                              Swal.fire({
                                  icon: 'success',
                                  title: 'User Added Successfully',
                                  showConfirmButton: false,
                                  timer: 1500
                              })
                              form.reset();
                          } else if (response == 'already') {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'User Already Exists!',
                              })
                          } else {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'Something went wrong!',
                              })
                          }
                        }).catch((error) => {
                          console.log(error);
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!',
                          })
                        });
                    } catch (error) {
                        console.log('An error occurred:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                } else {
                    password.classList.add("is-invalid");
                }
            }
        }, false);
        });


        function validatePassword(password) {
            if (!passwordRegex.test(password)) {
                return false;
            } else {
                return true;
            }
        }

        async function sendData(form, path) {
          try {
            return new Promise((reslove, reject) => {
              var xhr = new XMLHttpRequest();
              var formData = new FormData(form);
              xhr.onload = function() {
                  if (xhr.status == 200) {
                      reslove(xhr.responseText);
                  } else {
                      reject('server_error');
                  }
              };
              xhr.open('POST', path);
              xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
              xhr.send(formData); 
            });
          } catch (error) {
            return 'server_error';
          }
        }
    </script>
</body>

</html>
