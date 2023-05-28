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
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">User Name</label>
              <input type="text" name="name" class="form-control text-primary" id="validationCustom02" value=""
                required>
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
              <input type="date" name="birth" class="form-control text-primary" id="birth" required>
              <div class="invalid-feedback">
                Please enter your birthday.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="text" name="email" class="form-control text-primary" id="validationCustomUsername"
                  aria-describedby="inputGroupPrepend" required>
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
              <input type="text" name="nic" class="form-control text-primary" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide your nic number.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Password</label>
              <input type="password" onkeyup="validatePassword();" name="password" id="userPassword"
                class="form-control text-primary" required>
              <div class="invalid-feedback">
                Please provide a strong password.
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Double check the details
                </label>
                <div class="invalid-feedback">
                  You must double check details before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" id="submitButton" type="button">Add User</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Admin End -->


      <!-- Zonal Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-3">
          <h3 class="mb-4 text-primary">Add a Zonal Officer</h3>
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">User Name</label>
              <input type="text" name="name" class="form-control text-primary" id="validationCustom02" value=""
                required>
              <div class="valid-feedback">
                Looks good!
              </div>
              <div class="invalid-feedback">
                Please enter a name.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Birthday</label>
              <input type="date" name="birth" class="form-control text-primary" id="birth" required>
              <div class="invalid-feedback">
                Please enter your birthday.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="text" name="email" class="form-control text-primary" id="validationCustomUsername"
                  aria-describedby="inputGroupPrepend" required>
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
              <input type="text" name="nic" class="form-control text-primary" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide your nic number.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Education Zone</label>
              <div class="input-group has-validation">
                <input type="text" name="zone" class="form-control text-primary" id="educationzone"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please enter your Education Zone.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Password</label>
              <input type="password" onkeyup="validatePassword();" name="password" id="userPassword"
                class="form-control text-primary" required>
              <div class="invalid-feedback">
                Please provide a strong password.
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Double check the details
                </label>
                <div class="invalid-feedback">
                  You must double check details before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" id="submitButton" type="button">Add User</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Zonal End -->


      <!-- Admin Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-3">
          <h3 class="mb-4 text-primary">Add a developer</h3>
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">User Name</label>
              <input type="text" name="name" class="form-control text-primary" id="validationCustom02" value=""
                required>
              <div class="valid-feedback">
                Looks good!
              </div>
              <div class="invalid-feedback">
                Please enter a name.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Birthday</label>
              <input type="date" name="birth" class="form-control text-primary" id="birth" required>
              <div class="invalid-feedback">
                Please enter your birthday.
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
              <label for="validationCustomUsername" class="form-label">Email</label>
              <div class="input-group has-validation">
                <input type="text" name="email" class="form-control text-primary" id="validationCustomUsername"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please enter your email.
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">NIC Number</label>
              <input type="text" name="nic" class="form-control text-primary" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide your nic number.
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom03" class="form-label">Password</label>
              <input type="password" onkeyup="validatePassword();" name="password" id="userPassword"
                class="form-control text-primary" required>
              <div class="invalid-feedback">
                Please provide a strong password.
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Double check the details
                </label>
                <div class="invalid-feedback">
                  You must double check details before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" id="submitButton" type="button">Add User</button>
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
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')
      const button = document.getElementById("submitButton");

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        button.addEventListener('click', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          } else {
            if (!passwordRegex.test(userPassword.value)) {
              document.getElementById("userPassword").classList.add("is-invalid");
              return;
            }
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("add.users") }}');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr.onload = function () {
              if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response == "success") {
                  Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'User added successfully!',
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.reload();
                    }
                  })
                }
                else if (response == "already") {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User already exists!',
                  })
                }
                else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                  })
                }
              }
              else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!',
                })
              }
            };
            xhr.send(formData);
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()

    function validatePassword() {
      if (!passwordRegex.test(userPassword.value)) {
        document.getElementById("userPassword").classList.add("is-invalid");
      } else {
        document.getElementById("userPassword").classList.remove("is-invalid");
      }
    }
  </script>
</body>

</html>